<?php

require_once 'JSONFeed.inc.php';
class JSONFeeder extends stdClass {
	const FEED_TYPE = "json";
	
	const POST_NUM_VAR = "count";
	function __construct($argument=null) {
		add_action("init",array($this,"register"));
		add_action("switch_theme", array($this,"deactivate"));
		add_filter("pre_option_posts_per_rss", array($this,"handle_post_count"));
	}
	public function deactivate(){
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
	}
	public function register()
	{
		add_feed(self::FEED_TYPE, array($this,"do_feed_json"));
	
	}
	
	public function do_feed_json(){
		global $wp_query;
		// header("charset=" . get_option('blog_charset'), true);
		$more = 1;
		$posts = $wp_query->posts;
		$meta = mysql_escape_string($_GET['meta']);
		$retData = new JSONFeed($wp_query, $meta === "1");
		$retData->do_header();
		echo $retData->toString();
		// exit;
	}
	
	public function handle_post_count($orig){
		if (isset($_GET[self::POST_NUM_VAR])) {
			return (int)mysql_escape_string($_GET[self::POST_NUM_VAR]);
		};
		return $orig;
	}
}
?>