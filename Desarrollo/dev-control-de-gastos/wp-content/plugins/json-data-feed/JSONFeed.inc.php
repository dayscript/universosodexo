<? 
 /**
 * 
 */
class JSONFeed extends stdClass {
	private $_posts = NULL;
	private $_internalData;
	private $_meta = false;
	private $_query;
	private $_charset = "utf-8"; 
	const ADD_META_ACTION = "get_json_meta";
	const GET_BLOG_INFO = "get_json_bloginfo";
	function __construct($query=null, $meta = false) {
		$this->_meta = $meta;
		
		if($query){
			
			$this->_query = $query;
			$this->_posts = $query->posts;
			$this->_charset = get_bloginfo("charset");
			$this->update();
		}
	}
	private function update(){
		$posts = $this->_posts;
		// if($this->_meta){
		$newPosts = array();
		foreach ($posts as $key => $post) {
			$postTypeMetaFilter = self::ADD_META_ACTION."_".$post->post_type;
			$this->_query->the_post();
			$metaData = get_post_meta($post->ID);
			$metaData = $this->_cleanMetaData($metaData, $post->ID);
			
			if(has_filter(self::ADD_META_ACTION))
				$metaData = apply_filters(self::ADD_META_ACTION, $metaData);
			
			if(has_filter($postTypeMetaFilter))
				$metaData = apply_filters($postTypeMetaFilter, $metaData);
			
			$post = $this->_cleanPost($post);
			$post->meta = $metaData;
			$post->featured_image = get_post_thumbnail_id($post->ID);
			array_unshift($newPosts, $post); 
		}
		$posts = $newPosts;
		// }
		
		$this->_internalData = new stdClass();	
		
		$blogInfo = $this->get_blog_info();
		foreach ($blogInfo as $key => $info) {
			$this->_internalData->$key = $info;
		}
		$this->_internalData->post_count = count($this->_posts); 
		$this->_internalData->posts = $posts;
		
	
		
	} 
	public function toString(){
		// print_r($this->_internalData);
		// exit;
		return json_encode($this->_internalData);
	}
	private function _cleanPost($post){
		$postID = $post->ID;
		
		
		$newPost = new stdClass();
		$newPost->ID = $postID;
		$newPost->title = $this->_cleanHTML(get_the_title());
		$newPost->permalink = $this->_cleanHTML(get_permalink($postID));
		// $post->comments_link = get_comments_link_feed(); 
		$newPost->publishDate = mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); 
		$newPost->author = $this->_cleanHTML(get_the_author());
	
		if(get_option("jsonCatsAsObjs")){
			$newPost->category = get_the_category();
		} else{
			$newPost->category = $this->_cleanTerms(get_the_category());
		}
		
		$newPost->guid = get_the_guid(); 
		$newPost->excerpt = get_the_excerpt();
		$newPost->content = $this->_cleanHTML(get_the_content()); 
		$newPost->modifiedDate = get_the_modified_date();
		$newPost->status = get_post_status($postID);
		if(get_option("jsonTagsAsObjs")){
			$newPost->tags = get_the_tags();
		} else {
			$newPost->tags = $this->_cleanTerms(get_the_tags());
		}
		$newPost->menu_order = $post->menu_order;
		return $newPost;
	}

	private function _cleanTerms($terms=null){
		if(!$terms) return 0;
		
		$newTerms = array();
		
		foreach ($terms as $index => $term) {
			$newTerms[] = $term->term_id;
		}
		return $newTerms;
	}
	private function _cleanMetaData($metaData, $postID){
		$cleanMeta = array();
		$cft = function_exists("get_field");
		IF($metaData)
		foreach ($metaData as $key => $meta) {
			if(substr($key,0,1)=="_") {
				continue;
			}
			$cleanMeta[$key] = $meta;			
		}
		return $cleanMeta;		
	}
	public function get_blog_info(){
		$retArray = array();
		$retArray['title'] = get_bloginfo('name')." ".get_wp_title_rss(); 
		// $this->_internalData->application_url = get_link();
		$retArray['url'] = get_bloginfo('url');
		$retArray['description'] =  get_bloginfo("description");
		$retArray['lastBuildDate'] = mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false);
		$retArray['language'] = get_bloginfo( 'language' ); 
		$retArray['updatePerson'] = apply_filters( 'rss_update_period', 'hourly' ); 
		$retArray['updateFrequency'] = apply_filters( 'rss_update_frequency', '1' );
		
		if(has_filter(self::GET_BLOG_INFO)){
			$retArray = apply_filters(self::GET_BLOG_INFO,$retArray);
		}
		
		return $retArray;
	}
	public function do_header(){
		header("Content-type:application/json;");
		header("Cache-Control: no-cache, must-revalidate;");
		header("charset: ".get_bloginfo("charset").";");
	}
	public function processSimpleField($postID,$fldName){
		return  get_post_meta(get_the_id(), $fldName, true);
	}
	public function _cleanHTML($html){
		$html = html_entity_decode($html,ENT_COMPAT, $this->_charset);
		return $html;
	}
}
?>