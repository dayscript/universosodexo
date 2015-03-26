<?php
/**
 * quadro functions and definitions
 *
 * @package quadro
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 740; /* pixels */
}

// Define Template Directory URI & Template Directory
$template_directory_uri = get_template_directory_uri();
$template_directory = get_template_directory();

if ( ! function_exists( 'quadro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function quadro_setup() {

	global $template_directory;

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on quadro, use a find and replace
	 * to change 'quadro' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'quadro', $template_directory . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );


	/**
	 * Enable support for Post Thumbnails on posts and pages
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-thumb', 470, 295, true );
	add_image_size( 'med-thumb', 760, 475, true );
	add_image_size( 'full-thumb', 1400, 480, true );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'quadro' ),
		'user' => __( 'User/Login Menu', 'quadro' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'status', 'gallery', 'image', 'audio', 'video', 'quote', 'link' ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

	/**
	 * Enable WooCommerce Support
	 */
	add_theme_support( 'woocommerce' );

}
endif; // quadro_setup
add_action( 'after_setup_theme', 'quadro_setup' );


/**
 * Including Custom Fields definition (ADMIN ONLY)
 */
if ( is_admin() ) require( $template_directory . '/inc/custom-fields-definition.php' );

/**
 * Including Theme Options definition
 */
require( $template_directory . '/inc/options-definition.php' );


/**
 * Including QuadroIdeas Framework
 */
require( $template_directory . '/inc/qi-framework/qi-framework.php' );

/**
 * Declare variables for QI Framework
 */

// Theme Options Group
$quadro_options_group = 'quadro_binder_options';

if ( is_admin() ) { 
	// Available Patterns Quantity (change this variable if new patterns are incorporated)
	$patterns_qty = 34;
	// Theme's Slug (internal use only)
	$theme_slug = 'binderpro';
	// Theme's Docs URL
	$docs_url = '//quadroideas.com/docs/BinderPro_Documentation.html';
	// Theme Support URL
	$support_url = 'http://quadroideas.com/support/theme/binderpro-wp-theme';
	// Demo Content File Name
	$dcontent_file = 'binderpro_dcontent.xml.gz';
	// Demo Content Settings File
	$dcontent_settings = 'binderpro-demo-settings.txt';
	// Demo Content Widgets
	$dcontent_widgets = 'binderpro_widget_data.json';
	// Demo Content Plugins
	$dcontent_plugins = array();
	// Settings >> Reading : Front Page Displays ( 'page' || 'posts' )
	$dcontent_reading = 'page';
	// Settings >> Reading : Front Page
	$dcontent_front = 'Home';
	// Settings >> Reading : Posts Page
	$dcontent_posts = 'Blog';
}


/**
 * Register widgetized areas.
 */
function quadro_widgets_init() {
	
	// Retrieve Theme Options
	$quadro_options = quadro_get_options();

	register_sidebar( array(
		'name' 			=> __( 'Sidebar', 'quadro' ),
		'id' 			=> 'main-sidebar',
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  		=> '</aside>',
		'before_title'  		=> '<h1 class="widget-title">',
		'after_title'   		=> '</h1>',
	) );

	// Create Header Widgetized Area
	if ( $quadro_options['widgt_header_display'] == 'show' && $quadro_options['header_style'] == 'type1' ) {
		register_sidebar( array(
			'name' 			=> __( 'Header Widgets', 'quadro' ),
			'id' 			=> 'widgetized-header',
			'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  		=> '</aside>',
			'before_title'  		=> '<h1 class="widget-title">',
			'after_title'   		=> '</h1>',
		) );
	}

	// Create Footer Widgets Area
	if ( $quadro_options['widgetized_footer_layout'] == 'widg-layout1' ) { $i = 4; }
	else if ( $quadro_options['widgetized_footer_layout'] == 'widg-layout2' || $quadro_options['widgetized_footer_layout'] == 'widg-layout3' || $quadro_options['widgetized_footer_layout'] == 'widg-layout4' ) { $i = 3; }
	else if ( $quadro_options['widgetized_footer_layout'] === 'widg-layout5' ) { $i = 2; }
	else if ( $quadro_options['widgetized_footer_layout'] == 'widg-layout6' ) { $i = 1; }

	for ($j = 1; $j <= $i ; $j++) {
		
		register_sidebar(array(
			'name' => 'Footer Column ' . $j,
			'id' => 'footer-sidebar' . $j,
			'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget' 		=> '</aside>',
			'before_title'  	=> '<h1 class="widget-title">',
			'after_title'   	=> '</h1>',
		));
		
	} // end for

	// Create User Added Sidebars
	if ( is_array($quadro_options['quadro_sidebars']) ) {
		foreach( $quadro_options['quadro_sidebars'] as $user_sidebar ) {
			
			// Skip iteration if there's no name for this sidebar
			if ( $user_sidebar['name'] == '' ) continue;

			register_sidebar(array(
				'name' => esc_attr($user_sidebar['name']),
				'id' => esc_attr($user_sidebar['slug']),
				'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  	=> '</aside>',
				'before_title'  	=> '<h1 class="widget-title">',
				'after_title'   	=> '</h1>',
			));
			
		} // end for
	}

}
add_action( 'widgets_init', 'quadro_widgets_init' );


/**
 * Enqueue scripts and styles
 */
function quadro_scripts() {

	global $quadro_options, $template_directory_uri;
	
	wp_enqueue_style( 'quadro-style', get_stylesheet_uri() );

	wp_enqueue_script( 'quadro-navigation', $template_directory_uri . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'quadro-parallax', $template_directory_uri . '/js/parallax.js', array(), '20141003', true );
	wp_enqueue_script( 'quadro-skip-link-focus-fix', $template_directory_uri . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Call Google Maps script if enabled
	if ( $quadro_options['gmaps_enable'] == true ) {
		wp_register_script('gmapsrc', 'http://maps.google.com/maps/api/js?sensor=false', 'jquery', '', true);
		wp_enqueue_script('gmapsrc');
	}
	
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'jquery-masonry', array( 'jquery' ) );

	wp_register_script('quadroscripts', $template_directory_uri . '/js/scripts.js', 'jquery', '', true);
	wp_enqueue_script('quadroscripts');

	wp_register_script('animOnScroll', $template_directory_uri . '/js/animOnScroll.js', 'jquery', '', true);
	wp_enqueue_script('animOnScroll');

	/**
	 * Define Ajax Url for non logged requests
	 */
	wp_localize_script( 'quadroscripts', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

	// Include Woocommerce Styles if plugin activated
	if ( class_exists( 'Woocommerce' ) ) {
		// Check for 2.3 version (major update) in order to provide backwards compatibility
		global $woocommerce;
		if ( ! is_object( $woocommerce ) || version_compare( $woocommerce->version, '2.3', '>=' ) ) {
			wp_register_style( 'woocommerce-styles', $template_directory_uri . '/inc/woocommerce-styles.css', array(), '' );	
		} else {
			wp_register_style( 'woocommerce-styles', $template_directory_uri . '/inc/woocommerce-styles-pre23.css', array(), '' );	
		}
		wp_enqueue_style( 'woocommerce-styles' );
	}

	// Call Retina.js if Retina option enabled
	if ( $quadro_options['retina_enable'] == true ) {
		wp_register_script('retina', $template_directory_uri . '/js/retina.js', 'jquery', '', true);
		wp_enqueue_script('retina');
	}

}
add_action( 'wp_enqueue_scripts', 'quadro_scripts' );


/**
 * Enqueue admin scripts and styles
 */
function quadro_admin_scripts() {
	global $template_directory_uri;
	wp_register_style('adminstyles', $template_directory_uri . '/inc/back-styles.css', '');
	wp_enqueue_style('adminstyles');
}
add_action( 'admin_enqueue_scripts', 'quadro_admin_scripts' );


/**
 * Including Quadro Custom Post Types
 */
require( $template_directory . '/inc/custom-post-types.php' );


/**
 * Including Theme Specific Functions
 */
require( $template_directory . '/inc/theme-functions.php' );


/**
 * Including Quadro Widgets
 */
require( $template_directory . '/inc/quadro-widgets.php' );


/** 
 * Including WooCommerce Support Helper Functions
 */
// Check for WooCommerce first
if ( class_exists( 'Woocommerce' ) ) {
	require( $template_directory . '/inc/quadro-woocommerce.php' );
}


/**
 * Adds the WordPress Ajax Library to frontend.
 */
function quadro_add_ajax_library() { 
	$html = '<script type="text/javascript">';
		$html .= 'var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '"';
	$html .= '</script>';
 
	echo $html;
}
add_action( 'wp_head', 'quadro_add_ajax_library' );


// Adds gallery shortcode defaults for size
function quadro_gallery_atts( $out, $pairs, $atts ) {

	$atts = shortcode_atts( array(
			'size' => 'small-thumb',
		), $atts );

	$out['size'] = $atts['size'];
	return $out;

}
add_filter( 'shortcode_atts_gallery', 'quadro_gallery_atts', 10, 3 );


/**
 * Adds browser class to body
 */
add_filter('body_class','quadro_browser_body_class');
function quadro_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_IE) $classes[] = 'ie';
	elseif($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	// elseif($is_opera) $classes[] = 'opera';
	// elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}
add_filter('widget_text', 'do_shortcode');