<?php 

/*-----------------------------------------------------------------------------------*/
/*  Module Post Type & Helpers
/*-----------------------------------------------------------------------------------*/

function quadro_mods_register() {

   /**
	* Register 'quadro_mods' custom post type
	*/
	register_post_type( 'quadro_mods', array(
		'public' => true,
		'publicly_queryable' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'mods' ),
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'exclude_from_search' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies' => array(),
		'capability_type' => 'post',
		'capabilities' => array(),
        'menu_icon'=> 'dashicons-screenoptions',
		'labels' => array(
			'name' => __( 'Modules', 'quadro' ),
			'singular_name' => __( 'Module', 'quadro' ),
			'add_new' => __( 'Add New', 'quadro' ),
			'add_new_item' => __( 'Add New Module', 'quadro' ),
			'edit_item' => __( 'Edit Module', 'quadro' ),
			'new_item' => __( 'New Module', 'quadro' ),
			'all_items' => __( 'All Modules', 'quadro' ),
			'view_item' => __( 'View Module', 'quadro' ),
			'search_items' => __( 'Search Modules', 'quadro' ),
			'not_found' =>  __( 'No Module found', 'quadro' ),
			'not_found_in_trash' => __( 'No Module found in Trash', 'quadro' ),
			'parent_item_colon' => '',
			'menu_name' => 'Modules'
		)
	) );
}
add_action( 'init', 'quadro_mods_register' );


/**
 * Adds Type Column to modules
 */
add_filter('manage_quadro_mods_posts_columns', 'quadro_mod_addcolumn', 10);  
add_action('manage_quadro_mods_posts_custom_column', 'quadro_mod_column_content', 10, 2); 

// Add new column 
function quadro_mod_addcolumn($columns) {  
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __( 'Module', 'quadro' ),
        'module_type' => __( 'Module Type', 'quadro' ),
        'date' => __( 'Date', 'quadro' )
    );
    return $columns;
}  
  
// Show the module type 
function quadro_mod_column_content($column_name, $post_ID) {  
	if ($column_name == 'module_type') {
		global $available_modules;

		$mod_type = get_post_meta( $post_ID, 'quadro_mod_type', true );
		$this_type = array_search( $mod_type, $available_modules );

		echo $this_type;

	}
}

// Add Modules filtering controls
add_action( 'restrict_manage_posts', 'quadro_module_filtering' );
function quadro_module_filtering() {
	
	global $current_screen, $available_modules;
	if ( $current_screen->post_type == 'quadro_mods' ) {
		echo '<select name="module_filter">';
		echo '<option value="" ' . selected( isset($_GET['module_filter']) && ($_GET['module_filter'] == '') ) . '>' . __('All Module Types', 'quadro') . '</option>';
		foreach ( $available_modules as $module_name => $module_slug) {
			echo '<option value="' . $module_slug . '" ' . selected( isset($_GET['module_filter']) && ($_GET['module_filter'] == $module_slug) ) . '>' . $module_name . '</option>';
		}
	echo '</select>';
	}
}

// Add Modules filtering functioning
add_filter( 'parse_query','quadro_module_filter' );
function quadro_module_filter( $query ) {
	if( is_admin() AND $query->query['post_type'] == 'quadro_mods' ) {
	$mod_query = &$query->query_vars;
	$mod_query['meta_query'] = array();

	if( !empty( $_GET['module_filter'] ) ) {
		$mod_query['meta_query'][] = array(
			'field' => 'quadro_mod_type',
			'value' => $_GET['module_filter'],
			'compare' => '=',
			'type' => 'CHAR'
		);
	}

	}
}

?>