<?php
/**
 * 
 */
class JSONRewrite extends stdClass {
	static function init(){
		add_action("init",array(__CLASS__,"register"));
		// add_filter( 'generate_rewrite_rules', array(__CLASS__,'add_rewrites'));
	}	
	
	static public function register(){
		global $wp_rewrite;
		$wp_rewrite->flush_rules();

		
	}
	static function add_rewrites( $wp_rewrite ) {
		// global $wp_rewrite;
		// $feed_rules = array(
       		// 'index.json' => 'index.php?feed=json',
        	// '([^/?]+)(?=/?(?:\.json))' => 'index.php?feed=json&pagename=$matches[1]'
	    // );
// 	
	    // $wp_rewrite->rules = $feed_rules + $wp_rewrite->rules;
		// // echo "<pre>";
		// // print_r($wp_rewrite->rules);
		// // echo "</pre>";
		// // exit;
	    return $wp_rewrite->rules;
	}

// Hook in.
}



?>