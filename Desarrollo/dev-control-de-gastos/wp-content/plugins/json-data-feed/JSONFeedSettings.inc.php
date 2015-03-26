<?php
/**
 * 
 */
class JSONFeedSettings extends stdClass {
	
	function __construct($argument=null) {
		add_action("admin_init", array(&$this,"admin_register"));	
		add_action("admin_menu", array(&$this,"admin_menu_register"));	
	}
	
	function admin_register(){
		add_settings_section(
		    'JSONFeedSettings',
		    'Data Feed Settings',
		    array(&$this, 'sectionInfo'),
		    'options-json-data-feed'
		);	
			
		//TODO add tag and category identifier fields	
				
		register_setting('JSONFeedSettings', "jsonCatsAsObjs");
		add_settings_field(
		   "jsonCatsAsObjs", 
		    'Check here to output full category objects, instead of just category ID\'s', 
		    array(JSONOptionsFormHelper, 'create_checkbox'), 
		    'options-json-data-feed',
		    'JSONFeedSettings',
		    array("type"=>"checkbox","name"=>"jsonCatsAsObjs", "checked"=>get_option("jsonCatsAsObjs"))
		);		
		
		register_setting('JSONFeedSettings', "jsonTagsAsObjs");
		add_settings_field(
		   "jsonTagsAsObjs", 
		    'Check here to output full tag objects, instead of just tag ID\'s', 
		    array(JSONOptionsFormHelper, 'create_checkbox'), 
		    'options-json-data-feed',
		    'JSONFeedSettings',
		    array("type"=>"checkbox","name"=>"jsonTagsAsObjs", "checked"=>get_option("jsonTagsAsObjs"))
		);		
///*
	}
	function admin_menu_register(){
		add_options_page('JSON Data Feed Options', 'JSON Data Feed', 'manage_options', 'options-json-data-feed', array(&$this,"form"));
	}
	function sectionInfo(){
		?>
		<p>Set options for the JSON data feed below.</p>
		<?
	}
	function form(){
		
		?>
		<div class="wrap">
		    <?php screen_icon(); ?>
		    <h2>JSON Data Feed </h2>			
		    <form method="post" action="options.php">
		    	
    	<?php
		settings_fields('JSONFeedSettings');
	    do_settings_sections('options-json-data-feed');
		submit_button();
		?>
		 </form>
		</div>
		<?php
		
		 
	}
}

/**
 * 
 */
class JSONOptionsFormHelper extends stdClass {
	static $defaults = array(
		"name"=>"UNSET",
		"type"=>"none",
		
	);
	static function create_checkbox($args=null){
		if($args) $args = array_merge(self::$defaults,$args);
		echo self::create_input($args);
	}
	
	static function create_input($args){
		$checked = $args["checked"];
		unset($args["checked"]);
		$retVal = "<input ";
		
		foreach ($args as $key => $value) {
			$retVal .= $key."='".$value."' ";
		}
		if($checked){
			$retVal .= "checked='checked' ";
		}
		$retVal .= "/>";
		return $retVal;
	}
}


?>