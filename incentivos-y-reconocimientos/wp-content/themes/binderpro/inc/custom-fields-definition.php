<?php

$prefix = 'quadro_';

/*-----------------------------------------------------------------------------------*/
/*	Meta Boxes & Options for Posts
/*-----------------------------------------------------------------------------------*/

// Define available modules
$available_modules = array( 
	'Authors'						=> 'authors',
	'Blog' 							=> 'blog',
	'Canvas' 						=> 'canvas',
	'Carousel' 						=> 'carousel',
	'Crelly slider' 				=> 'crelly',
	'Featured Post' 				=> 'featured',
	'Flash News' 					=> 'flashnews',
	'Magazine' 						=> 'magazine',
	'Quote Posts Slider'			=> 'quoteposts',
	'Slider' 						=> 'slider',
	'Slogan' 						=> 'slogan',
	'Tiled Display' 				=> 'display',
	'Video Posts Slider'			=> 'videoposts',
	'Modules Wrapper (W/Sidebar)'	=> 'wrapper',
);

// Create Modules definition array
foreach ($available_modules as $type => $slug) {
	$modules_array[] = array( 'type' => $type, 'slug' => $slug );
}

$quadro_cfields_def = array(

	// Adding Posts basic meta box
	'post_metabox' => array(
		'id' => 'post-metabox',
		'title' => __('Post Options', 'quadro'),
		'page' => 'post',
		'context' => 'side',
		'priority' => 'default',
		'fields' => array(
			array(
				'name' => __('Post Background Color', 'quadro'),
				'id' => $prefix . 'post_blog_back',
				'type' => 'color',
				'std' => '#'
			),
		)
	),

	// Adding Pages basic meta box
	'page_metabox' => array(
		'id' => 'page-metabox',
		'title' => __('Page Options', 'quadro'),
		'page' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Select Sidebar', 'quadro'),
				'id' => $prefix . 'page_sidebar',
				'type' => 'sidebar_picker',
			),
			array(
				'name' => __('Breadcrumbs on this page', 'quadro'),
				'id' => $prefix . 'page_breadcrumbs',
				'type' => 'select',
				'options' => array(
					array('name' => __('Show', 'quadro' ), 'value' => 'show'),
					array('name' => __('Hide', 'quadro' ), 'value' => 'hide')
					),
				'std' => 'show'
			),
			array(
				'name' => __('Title color', 'quadro'),
				'id' => $prefix . 'page_title_color',
				'type' => 'color',
				'std' => '#'
			),
			array(
				'name' => __('Header Back color', 'quadro'),
				'id' => $prefix . 'page_header_back_color',
				'type' => 'color',
				'std' => '#'
			),
			array(
				'name' => __('Use Picture as Header Back (uses Feat. Image)', 'quadro'),
				'id' => $prefix . 'page_header_back_usepic',
				'type' => 'checkbox'
			),
			array(
				'name' => __('Display Tagline', 'quadro'),
				'id' => $prefix . 'page_show_tagline',
				'type' => 'checkbox'
			),
			array(
				'name' => __('Tagline text', 'quadro'),
				'id' => $prefix . 'page_tagline',
				'type' => 'textarea',
				'sanitize' => 'html',
				'desc' => ''
			),
			array(
				'name' => __('Use Picture as Page Back', 'quadro'),
				'id' => $prefix . 'page_back_usepic',
				'type' => 'checkbox'
			),
			array(
				'name' => __('Background for this Page', 'quadro'),
				'id' => $prefix . 'page_back_pic',
				'type' => 'upload'
			)
		)
	),

	// Adding Blog Template meta box
	'blog_template_metabox' => array(
		'id' => 'blog-qi-template-metabox',
		'title' => __('Blog Template Options', 'quadro'),
		'page' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Hide Page Header (homepage use, for example)', 'quadro'),
				'id' => $prefix . 'blog_header_hide',
				'type' => 'checkbox'
			),
			array(
				'name' => __('Choose Blog Modules to Show', 'quadro'),
				'id' => $prefix . 'mod_blog_modules',
				'type' => 'posts_picker',
				'post_type' => 'quadro_mods',
				'available_mods' => $available_modules,
				'mod_type' => 'blog',
				'show_type' => false
			)
		)
	),

	// Adding Landing Page Template meta box
	'landing_template_metabox' => array(
		'id' => 'landing-qi-template-metabox',
		'title' => __('Landing Page Options', 'quadro'),
		'page' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Hide Page Header', 'quadro'),
				'id' => $prefix . 'landing_header_hide',
				'type' => 'checkbox'
			),
		)
	),

	// Adding Contact Template meta box
	'contact_template_metabox' => array(
		'id' => 'contact-qi-template-metabox',
		'title' => __('Contact Template Options', 'quadro'),
		'page' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Google Map Address', 'quadro'),
				'id' => $prefix . 'contact_map',
				'type' => 'text',
				'desc' => __('To display a map in the header, paste here the address you want the map to locate.', 'quadro')
			),
			array(
				'name' => __('Sidebar Position', 'quadro'),
				'id' => $prefix . 'contact_sidebar',
				'type' => 'select',
				'options' => array(
					array('name' => __('Right', 'quadro' ), 'value' => 'right'),
					array('name' => __('Left', 'quadro' ), 'value' => 'left'),
					array('name' => __('No Sidebar', 'quadro' ), 'value' => 'nosidebar')
					),
				'std' => 'right'
			),
		)
	),

	// Adding Modular Template meta box
	'modular_template_metabox' => array(
		'id' => 'modular-qi-template-metabox',
		'title' => __('Modular Template Options', 'quadro'),
		'page' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Hide Page Header (homepage use, for example)', 'quadro'),
				'id' => $prefix . 'page_header_hide',
				'type' => 'checkbox'
			),
			array(
				'name' => __('Choose Modules to Show', 'quadro'),
				'id' => $prefix . 'mod_temp_modules',
				'type' => 'posts_picker',
				'post_type' => 'quadro_mods',
				'available_mods' => $available_modules,
				'show_type' => false
			)
		)
	),

	// Adding modules basic meta box
	'mod_metabox' => array(
		'id' => 'mod-metabox',
		'title' => __('Module Style', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'side',
		'priority' => 'default',
		'fields' => array(
			array(
				'name' => __('Show title for this module?', 'quadro'),
				'id' => $prefix . 'mod_show_title',
				'type' => 'checkbox'
			),
			array(
				'name' => __('Title background color', 'quadro'),
				'id' => $prefix . 'mod_title_back',
				'type' => 'color',
				'std' => '#'

			),
			array(
				'name' => __('Background color', 'quadro'),
				'id' => $prefix . 'mod_back_color',
				'type' => 'color',
				'std' => '#'
			),
			array(
				'name' => __('Background pattern', 'quadro'),
				'id' => $prefix . 'mod_back_pattern',
				'type' => 'pattern_picker'
			),
			array(
				'name' => __('Use Picture as Background', 'quadro'),
				'id' => $prefix . 'mod_back_usepic',
				'type' => 'checkbox'
			),
			array(
				'name' => __('Background for this module', 'quadro'),
				'id' => $prefix . 'mod_back_pic',
				'type' => 'upload'
			),
			array(
				'name' => __('Parallax Background', 'quadro'),
				'id' => $prefix . 'mod_parallax',
				'type' => 'checkbox'
			),
		)
	),

	// Adding modules Types meta box
	'mod_type_metabox' => array(
		'id' => 'mod-type-metabox',
		'title' => __('Module Type', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Select Module Type', 'quadro'),
				'id' => $prefix . 'mod_type',
				'type' => 'double_select',
				'options' => $modules_array
			)
		)
	),

	// Adding modules WRAPPER Type meta box
	'mod_wrapper_type_metabox' => array(
		'id' => 'mod-wrapper-qi-type-metabox',
		'title' => __('Wrapper Module Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Sidebar Position', 'quadro'),
				'id' => $prefix . 'mod_wrapper_sidebar',
				'type' => 'select',
				'options' => array(
					array('name' => __('Right', 'quadro' ), 'value' => 'right'),
					array('name' => __('Left', 'quadro' ), 'value' => 'left'),
				),
				'std' => 'right'
			),
			array(
				'name' => __('Select Sidebar', 'quadro'),
				'id' => $prefix . 'mod_wrapper_sidebar_pick',
				'type' => 'sidebar_picker',
			),
			array(
				'name' => __('Choose Modules to Show', 'quadro'),
				'id' => $prefix . 'mod_wrapper_modules',
				'type' => 'posts_picker',
				'post_type' => 'quadro_mods',
				'available_mods' => $available_modules,
				'show_type' => false,
				'wrapper' => true
			),
		)
	),

	// Adding modules CAROUSEL Type meta box
	'mod_carousel_type_metabox' => array(
		'id' => 'mod-carousel-qi-type-metabox',
		'title' => __('Carousel Module Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Margins (make full width)', 'quadro'),
				'id' => $prefix . 'mod_carousel_margins',
				'type' => 'select',
				'options' => array(
					array('name' => __('With Margins', 'quadro' ), 'value' => 'with-margins'),
					array('name' => __('Without Margins', 'quadro' ), 'value' => 'no-margins'),
				),
				'std' => 'with-margins'
			),
			array(
				'name' => __('How many posts to show?', 'quadro'),
				'id' => $prefix . 'mod_carousel_pper',
				'type' => 'text',
				'std' => '',
				'desc' => __('Enter -1 to show all posts.', 'quadro')
			),
			array(
				'name' => __('What to show?', 'quadro'),
				'id' => $prefix . 'mod_carousel_method',
				'type' => 'select',
				'options' => array(
					array('name' => __('All Posts', 'quadro' ), 'value' => 'all'),
					array('name' => __('By Categories', 'quadro' ), 'value' => 'tax'),
					array('name' => __('By Post Format', 'quadro' ), 'value' => 'format'),
					array('name' => __('Custom Selection', 'quadro' ), 'value' => 'custom'),
				),
				'std' => 'all'
			),
			array(
				'name' => __('Choose Categories to Show', 'quadro'),
				'id' => $prefix . 'mod_carousel_terms',
				'type' => 'tax_picker',
				'tax_slug' => 'category'
			),
			array(
				'name' => __('Choose Post Formats to Show', 'quadro'),
				'id' => $prefix . 'mod_carousel_formats',
				'type' => 'format_picker',
			),
			array(
				'name' => __('Choose Posts to Show', 'quadro'),
				'id' => $prefix . 'mod_pick_carousel',
				'type' => 'posts_picker',
				'post_type' => array( 'post', 'product' ),
				'show_type' => true
			),
		)
	),

	// Adding modules CRELLY SLIDER Type meta box
	'mod_crelly_type_metabox' => array(
		'id' => 'mod-crelly-qi-type-metabox',
		'title' => __('Crelly Slider Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Slider Shortcode', 'quadro'),
				'id' => $prefix . 'mod_crelly_shortcode',
				'type' => 'text',
				'desc' => __('Paste in this field the shortcode for the slider as you would normally paste on any page.', 'quadro')
			),
		)
	),

	// Adding modules DISPLAY Type meta box
	'mod_display_type_metabox' => array(
		'id' => 'mod-display-qi-type-metabox',
		'title' => __('Display Module Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Display Style', 'quadro'),
				'id' => $prefix . 'mod_display_layout',
				'type' => 'layout-picker',
				'path' => '/images/admin/display-styles/',
				'options' => array(
					'layout1' => array(
						'name' => 'layout1',
						'title' => __( 'Layout 1', 'quadro' ),
						'img' => 'display-style1.png',
						'description' => '',
					),
					'layout2' => array(
						'name' => 'layout2',
						'title' => __( 'Layout 2', 'quadro' ),
						'img' => 'display-style2.png',
						'description' => '',
					),
					'layout3' => array(
						'name' => 'layout3',
						'title' => __( 'Layout 3', 'quadro' ),
						'img' => 'display-style3.png',
						'description' => '',
					),
					'layout4' => array(
						'name' => 'layout4',
						'title' => __( 'Layout 4', 'quadro' ),
						'img' => 'display-style4.png',
						'description' => '',
					),
					'layout5' => array(
						'name' => 'layout5',
						'title' => __( 'Layout 5', 'quadro' ),
						'img' => 'display-style5.png',
						'description' => '',
					),
				),
				'desc' => __( 'To use layouts 1 or 3 <strong>large thumbnail</strong> size must be set on WordPress defaults of 1024 by 1024 pixels.', 'quadro' ),
				'std' => 'layout1'
			),
			array(
				'name' => __('Margins (make full width)', 'quadro'),
				'id' => $prefix . 'mod_display_margins',
				'type' => 'select',
				'options' => array(
					array('name' => __('With Margins', 'quadro' ), 'value' => 'with-margins'),
					array('name' => __('Without Margins', 'quadro' ), 'value' => 'no-margins'),
				),
				'std' => 'with-margins'
			),
			array(
				'name' => __('What to show?', 'quadro'),
				'id' => $prefix . 'mod_display_method',
				'type' => 'select',
				'options' => array(
					array('name' => __('All Posts', 'quadro' ), 'value' => 'all'),
					array('name' => __('By Categories', 'quadro' ), 'value' => 'tax'),
					array('name' => __('By Post Format', 'quadro' ), 'value' => 'format'),
					array('name' => __('Custom Selection', 'quadro' ), 'value' => 'custom'),
				),
				'std' => 'all'
			),
			array(
				'name' => __('Choose Categories to Show', 'quadro'),
				'id' => $prefix . 'mod_display_terms',
				'type' => 'tax_picker',
				'tax_slug' => 'category'
			),
			array(
				'name' => __('Choose Post Formats to Show', 'quadro'),
				'id' => $prefix . 'mod_display_formats',
				'type' => 'format_picker',
			),
			array(
				'name' => __('Choose Posts to Show', 'quadro'),
				'id' => $prefix . 'mod_pick_display',
				'type' => 'posts_picker',
				'post_type' => array( 'post', 'product' ),
				'show_type' => true
			),
		)
	),

	// Adding modules FLASH NEWS Type meta box
	'mod_flashnews_type_metabox' => array(
		'id' => 'mod-flashnews-qi-type-metabox',
		'title' => __('Flash News Module Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('How many posts to show?', 'quadro'),
				'id' => $prefix . 'mod_flashnews_pper',
				'type' => 'text',
				'std' => '',
				'desc' => __('Enter -1 to show all posts.', 'quadro')
			),
			array(
				'name' => __('What to show?', 'quadro'),
				'id' => $prefix . 'mod_flashnews_method',
				'type' => 'select',
				'options' => array(
					array('name' => __('All Posts', 'quadro' ), 'value' => 'all'),
					array('name' => __('By Categories', 'quadro' ), 'value' => 'tax'),
					array('name' => __('By Post Format', 'quadro' ), 'value' => 'format'),
					array('name' => __('Custom Selection', 'quadro' ), 'value' => 'custom'),
				),
				'std' => 'all'
			),
			array(
				'name' => __('Choose Categories to Show', 'quadro'),
				'id' => $prefix . 'mod_flashnews_terms',
				'type' => 'tax_picker',
				'tax_slug' => 'category'
			),
			array(
				'name' => __('Choose Post Formats to Show', 'quadro'),
				'id' => $prefix . 'mod_flashnews_formats',
				'type' => 'format_picker',
			),
			array(
				'name' => __('Choose Posts to Show', 'quadro'),
				'id' => $prefix . 'mod_pick_flashnews',
				'type' => 'posts_picker',
				'post_type' => array( 'post', 'product' ),
				'show_type' => true
			),
		)
	),

	// Adding modules MAGAZINE Type meta box
	'mod_magazine_type_metabox' => array(
		'id' => 'mod-magazine-qi-type-metabox',
		'title' => __('Magazine Module Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Magazine Style', 'quadro'),
				'id' => $prefix . 'mod_magazine_layout',
				'type' => 'layout-picker',
				'path' => '/images/admin/magazine-styles/',
				'options' => array(
					'layout1' => array(
						'name' => 'layout1',
						'title' => __( 'Layout 1', 'quadro' ),
						'img' => 'magazine-style1.png',
						'description' => '',
					),
					'layout2' => array(
						'name' => 'layout2',
						'title' => __( 'Layout 2', 'quadro' ),
						'img' => 'magazine-style2.png',
						'description' => '',
					),
					'layout3' => array(
						'name' => 'layout3',
						'title' => __( 'Layout 3', 'quadro' ),
						'img' => 'magazine-style3.png',
						'description' => '',
					),
					'layout4' => array(
						'name' => 'layout4',
						'title' => __( 'Layout 4', 'quadro' ),
						'img' => 'magazine-style4.png',
						'description' => '',
					),
				),
				'desc' => '',
				'std' => 'layout1'
			),
			array(
				'name' => __('Columns', 'quadro'),
				'id' => $prefix . 'mod_magazine_columns',
				'type' => 'select',
				'options' => array(
					array('name' => __('Two', 'quadro' ), 'value' => 'two'),
					array('name' => __('Three', 'quadro' ), 'value' => 'three'),
				),
				'desc' => __('Applies only for layouts 2 and 4.', 'quadro'),
				'std' => 'two'
			),
			array(
				'name' => __('How many posts to show?', 'quadro'),
				'id' => $prefix . 'mod_magazine_perpage',
				'type' => 'text',
				'std' => '',
				'desc' => __('Applies only for layout 4. Enter -1 to show all posts.', 'quadro')
			),
			array(
				'name' => __('Excerpt', 'quadro'),
				'id' => $prefix . 'mod_magazine_excerpt',
				'type' => 'select',
				'options' => array(
					array('name' => __('Show', 'quadro' ), 'value' => 'show'),
					array('name' => __('Hide', 'quadro' ), 'value' => 'hide'),
				),
				'desc' => __('Applies only for layout 4.', 'quadro'),
				'std' => 'show'
			),
			array(
				'name' => __('Exclude Posts Without Thumbnail?', 'quadro'),
				'id' => $prefix . 'mod_magazine_nothumb',
				'type' => 'checkbox'
			),
			array(
				'name' => __('What to show?', 'quadro'),
				'id' => $prefix . 'mod_magazine_method',
				'type' => 'select',
				'options' => array(
					array('name' => __('Latest Posts', 'quadro' ), 'value' => 'all'),
					array('name' => __('By Categories', 'quadro' ), 'value' => 'tax'),
					array('name' => __('By Post Format', 'quadro' ), 'value' => 'format'),
					array('name' => __('Custom Selection', 'quadro' ), 'value' => 'custom'),
				),
				'std' => 'all'
			),
			array(
				'name' => __('Choose Categories to Show', 'quadro'),
				'id' => $prefix . 'mod_magazine_terms',
				'type' => 'tax_picker',
				'tax_slug' => 'category'
			),
			array(
				'name' => __('Choose Post Formats to Show', 'quadro'),
				'id' => $prefix . 'mod_magazine_formats',
				'type' => 'format_picker',
			),
			array(
				'name' => __('Choose Posts to Show', 'quadro'),
				'id' => $prefix . 'mod_pick_magazine',
				'type' => 'posts_picker',
				'post_type' => array( 'post', 'product' ),
				'show_type' => true
			),
		)
	),

	// Adding modules SLOGAN Type meta box
	'mod_slogan_type_metabox' => array(
		'id' => 'mod-slogan-qi-type-metabox',
		'title' => __('Slogan Module Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Call to Action Text', 'quadro'),
				'id' => $prefix . 'mod_slogan_action_text',
				'type' => 'text'
			),
			array(
				'name' => __('Call to Action Link', 'quadro'),
				'id' => $prefix . 'mod_slogan_action_link',
				'type' => 'text'
			),
			array(
				'name' => __('Call to Action Color', 'quadro'),
				'id' => $prefix . 'mod_slogan_action_color',
				'type' => 'color',
				'std' => '#'
			),
		)
	),

	// Adding modules FEATURED Type meta box
	'mod_featured_type_metabox' => array(
		'id' => 'mod-featured-qi-type-metabox',
		'title' => __('Featured Post Module Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('What to show?', 'quadro'),
				'id' => $prefix . 'mod_featured_method',
				'type' => 'select',
				'options' => array(
					array('name' => __('Custom Selection', 'quadro' ), 'value' => 'custom'),
					array('name' => __('Last post (from all posts)', 'quadro' ), 'value' => 'all'),
					array('name' => __('Last post By Categories', 'quadro' ), 'value' => 'tax'),
					array('name' => __('Last post By Post Format', 'quadro' ), 'value' => 'format'),
				),
				'std' => 'custom'
			),
			array(
				'name' => __('Choose Categories to Show', 'quadro'),
				'id' => $prefix . 'mod_featured_terms',
				'type' => 'tax_picker',
				'tax_slug' => 'category'
			),
			array(
				'name' => __('Choose Post Formats to Show', 'quadro'),
				'id' => $prefix . 'mod_featured_formats',
				'type' => 'format_picker',
			),
			array(
				'name' => __('Choose Post to Show', 'quadro'),
				'id' => $prefix . 'mod_pick_featured',
				'type' => 'one_post_picker',
				'post_type' => array( 'post' )
			),
			array(
				'name' => __('Select Featured Post Style', 'quadro'),
				'id' => $prefix . 'mod_featured_style',
				'type' => 'radio',
				'options' => array(
					array('name' => __('Content on right side', 'quadro' ), 'value' => 'type1'),
					array('name' => __('Content on left side', 'quadro' ), 'value' => 'type2')
					),
				'desc' => __( 'Note: To display featured posts <strong>large thumbnail</strong> size must be set on WordPress defaults of 1024 by 1024 pixels.', 'quadro' ),
				'std' => 'type1'
			),
			array(
				'name' => __('Post Icon', 'quadro'),
				'id' => $prefix . 'mod_featured_icon',
				'type' => 'select',
				'options' => array(
					array('name' => __('Show', 'quadro' ), 'value' => 'show'),
					array('name' => __('Hide', 'quadro' ), 'value' => 'hide'),
				),
				'std' => 'show'
			),
			array(
				'name' => __('Post Date', 'quadro'),
				'id' => $prefix . 'mod_featured_date',
				'type' => 'select',
				'options' => array(
					array('name' => __('Show', 'quadro' ), 'value' => 'show'),
					array('name' => __('Hide', 'quadro' ), 'value' => 'hide'),
				),
				'std' => 'show'
			),
			array(
				'name' => __('Post Categories', 'quadro'),
				'id' => $prefix . 'mod_featured_cats',
				'type' => 'select',
				'options' => array(
					array('name' => __('Show', 'quadro' ), 'value' => 'show'),
					array('name' => __('Hide', 'quadro' ), 'value' => 'hide'),
				),
				'std' => 'show'
			),
		)
	),

	// Adding modules VIDEO POSTS Type meta box
	'mod_videoposts_type_metabox' => array(
		'id' => 'mod-videoposts-qi-type-metabox',
		'title' => __('Video Posts Slider Module Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('How many posts to show?', 'quadro'),
				'id' => $prefix . 'mod_videoposts_pper',
				'type' => 'text',
				'std' => '',
				'desc' => __('Enter -1 to show all posts.', 'quadro')
			),
			array(
				'name' => __('What to show?', 'quadro'),
				'id' => $prefix . 'mod_videoposts_method',
				'type' => 'select',
				'options' => array(
					array('name' => __('All Posts', 'quadro' ), 'value' => 'all'),
					array('name' => __('By Categories', 'quadro' ), 'value' => 'tax'),
					array('name' => __('Custom Selection', 'quadro' ), 'value' => 'custom'),
				),
				'std' => 'all'
			),
			array(
				'name' => __('Choose Categories to Show', 'quadro'),
				'id' => $prefix . 'mod_videoposts_terms',
				'type' => 'tax_picker',
				'tax_slug' => 'category'
			),
			array(
				'name' => __('Choose Posts to Show', 'quadro'),
				'id' => $prefix . 'mod_pick_videoposts',
				'type' => 'posts_picker',
				'post_type' => array( 'post' ),
				'post_format' => array( 'video' ),
				'show_type' => false
			),
			array(
				'name' => __('Text Color (optional)', 'quadro'),
				'id' => $prefix . 'mod_videoposts_color',
				'type' => 'color',
				'std' => '#'
			),
		)
	),

	// Adding modules SLIDER Type meta box
	'mod_slider_type_metabox' => array(
		'id' => 'mod-slider-qi-type-metabox',
		'title' => __('Slider Module Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Select Caption Style', 'quadro'),
				'id' => $prefix . 'mod_slider_caption_style',
				'type' => 'radio',
				'options' => array(
					array('name' => __('Big Caption', 'quadro' ), 'value' => 'type1'),
					array('name' => __('Striped Caption', 'quadro' ), 'value' => 'type2'),
					),
				'std' => 'type1'
			),
			array(
				'name' => __('Select Caption Position', 'quadro'),
				'id' => $prefix . 'mod_slider_caption_pos',
				'type' => 'radio',
				'options' => array(
					array('name' => __('Left', 'quadro' ), 'value' => 'left'),
					array('name' => __('Right', 'quadro' ), 'value' => 'right'),
					array('name' => __('Left & Right (alternated)', 'quadro' ), 'value' => 'alternated'),
					),
				'std' => 'left'
			),
			array(
				'name' => __('Transition Timer (in millisecs.)', 'quadro'),
				'id' => $prefix . 'mod_slider_time',
				'type' => 'text',
				'desc' => __('Enter <strong>stop</strong> to disable autorun.', 'quadro')
			),
			array(
				'name' => __('Override Post Background Color (optional)', 'quadro'),
				'id' => $prefix . 'mod_slider_color',
				'type' => 'color',
				'desc' => __('Leave empty to use original post background.', 'quadro'),
				'std' => '#'
			),
			array(
				'name' => __('What to show?', 'quadro'),
				'id' => $prefix . 'mod_slider_method',
				'type' => 'select',
				'options' => array(
					array('name' => __('Custom Selection', 'quadro' ), 'value' => 'custom'),
					array('name' => __('Latest posts (from all posts)', 'quadro' ), 'value' => 'all'),
					array('name' => __('Latest posts By Categories', 'quadro' ), 'value' => 'tax'),
					array('name' => __('Latest posts By Post Format', 'quadro' ), 'value' => 'format'),
				),
				'std' => 'custom'
			),
			array(
				'name' => __('Choose Categories to Show', 'quadro'),
				'id' => $prefix . 'mod_slider_terms',
				'type' => 'tax_picker',
				'tax_slug' => 'category'
			),
			array(
				'name' => __('Choose Post Formats to Show', 'quadro'),
				'id' => $prefix . 'mod_slider_formats',
				'type' => 'format_picker',
			),
			array(
				'name' => __('Choose Posts to Show', 'quadro'),
				'id' => $prefix . 'mod_pick_slider',
				'type' => 'posts_picker',
				'post_type' => array( 'post' ),
				'show_type' => false
			),
			array(
				'name' => __('How many posts to show?', 'quadro'),
				'id' => $prefix . 'mod_slider_pper',
				'type' => 'text',
				'std' => '',
			),
			array(
				'name' => __('Post Icon', 'quadro'),
				'id' => $prefix . 'mod_slider_icon',
				'type' => 'select',
				'options' => array(
					array('name' => __('Show', 'quadro' ), 'value' => 'show'),
					array('name' => __('Hide', 'quadro' ), 'value' => 'hide'),
				),
				'desc' => __('Only available for Big Caption style.', 'quadro'),
				'std' => 'show'
			),
			array(
				'name' => __('Post Date', 'quadro'),
				'id' => $prefix . 'mod_slider_date',
				'type' => 'select',
				'options' => array(
					array('name' => __('Show', 'quadro' ), 'value' => 'show'),
					array('name' => __('Hide', 'quadro' ), 'value' => 'hide'),
				),
				'std' => 'show'
			),
			array(
				'name' => __('Post Categories', 'quadro'),
				'id' => $prefix . 'mod_slider_cats',
				'type' => 'select',
				'options' => array(
					array('name' => __('Show', 'quadro' ), 'value' => 'show'),
					array('name' => __('Hide', 'quadro' ), 'value' => 'hide'),
				),
				'std' => 'show'
			),
			array(
				'name' => __('Margins (make full width)', 'quadro'),
				'id' => $prefix . 'mod_slider_margins',
				'type' => 'select',
				'options' => array(
					array('name' => __('With Margins', 'quadro' ), 'value' => 'with-margins'),
					array('name' => __('Without Margins', 'quadro' ), 'value' => 'no-margins'),
				),
				'std' => 'with-margins'
			),
		)
	),

	// Adding modules AUTHORS Type meta box
	'mod_authors_type_metabox' => array(
		'id' => 'mod-authors-qi-type-metabox',
		'title' => __('Authors Module Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('What to show?', 'quadro'),
				'id' => $prefix . 'mod_authors_method',
				'type' => 'select',
				'options' => array(
					array('name' => __('Custom Selection', 'quadro' ), 'value' => 'custom'),
					array('name' => __('All Authors', 'quadro' ), 'value' => 'all'),
				),
				'std' => 'custom'
			),
			array(
				'name' => __('Choose Authors to Show', 'quadro'),
				'id' => $prefix . 'mod_pick_authors',
				'type' => 'authors_picker',
			),
			array(
				'name' => __('Users Bio', 'quadro'),
				'id' => $prefix . 'mod_authors_bio',
				'type' => 'select',
				'options' => array(
					array('name' => __('Show', 'quadro' ), 'value' => 'show'),
					array('name' => __('Hide', 'quadro' ), 'value' => 'hide'),
				),
				'std' => 'show'
			),
			array(
				'name' => __('Users Web & Social Profiles', 'quadro'),
				'id' => $prefix . 'mod_authors_extras',
				'type' => 'select',
				'options' => array(
					array('name' => __('Show', 'quadro' ), 'value' => 'show'),
					array('name' => __('Hide', 'quadro' ), 'value' => 'hide'),
				),
				'std' => 'show'
			),
		)
	),

	// Adding modules Quote POSTS Type meta box
	'mod_quoteposts_type_metabox' => array(
		'id' => 'mod-quoteposts-qi-type-metabox',
		'title' => __('Quote Posts Slider Module Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('How many posts to show?', 'quadro'),
				'id' => $prefix . 'mod_quoteposts_pper',
				'type' => 'text',
				'std' => '',
				'desc' => __('Enter -1 to show all posts.', 'quadro')
			),
			array(
				'name' => __('What to show?', 'quadro'),
				'id' => $prefix . 'mod_quoteposts_method',
				'type' => 'select',
				'options' => array(
					array('name' => __('All Posts', 'quadro' ), 'value' => 'all'),
					array('name' => __('By Categories', 'quadro' ), 'value' => 'tax'),
					array('name' => __('Custom Selection', 'quadro' ), 'value' => 'custom'),
				),
				'std' => 'all'
			),
			array(
				'name' => __('Choose Categories to Show', 'quadro'),
				'id' => $prefix . 'mod_quoteposts_terms',
				'type' => 'tax_picker',
				'tax_slug' => 'category'
			),
			array(
				'name' => __('Choose Posts to Show', 'quadro'),
				'id' => $prefix . 'mod_pick_quoteposts',
				'type' => 'posts_picker',
				'post_type' => array( 'post' ),
				'post_format' => array( 'quote' ),
				'show_type' => false
			),
			array(
				'name' => __('Text Color (optional)', 'quadro'),
				'id' => $prefix . 'mod_quoteposts_color',
				'type' => 'color',
				'std' => '#'
			),
		)
	),

	// Adding modules BLOG Type meta box
	'mod_blog_type_metabox' => array(
		'id' => 'mod-blog-qi-type-metabox',
		'title' => __('Blog Module Options', 'quadro'),
		'page' => 'quadro_mods',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Blog Style', 'quadro'),
				'id' => $prefix . 'mod_blog_layout',
				'type' => 'radio',
				'options' => array(
					array('name' => __('Masonry Style', 'quadro' ), 'value' => 'masonry'),
					array('name' => __('Classic Style', 'quadro' ), 'value' => 'classic'),
					array('name' => __('Teasers Style', 'quadro' ), 'value' => 'teasers')
					),
				'std' => 'grid'
			),
			array(
				'name' => __('Columns', 'quadro'),
				'id' => $prefix . 'mod_blog_columns',
				'type' => 'select',
				'options' => array(
					array('name' => __('Three', 'quadro' ), 'value' => 'three'),
					array('name' => __('Two', 'quadro' ), 'value' => 'two')
					),
				'std' => 'three',
				'desc' => __( '(Available in Masonry Blog Style)', 'quadro' ),
			),
			array(
				'name' => __('Margins', 'quadro'),
				'id' => $prefix . 'mod_blog_margins',
				'type' => 'select',
				'options' => array(
					array('name' => __('Without Margins', 'quadro' ), 'value' => 'false'),
					array('name' => __('With Margins', 'quadro' ), 'value' => 'true')
					),
				'std' => 'false',
				'desc' => __( '(Available in Masonry Blog Style)', 'quadro' )
			),
			array(
				'name' => __('Posts Loading Animation', 'quadro'),
				'id' => $prefix . 'mod_blog_anim',
				'type' => 'select',
				'options' => array(
					array('name' => __('None', 'quadro' ), 'value' => 'none'),
					array('name' => __('Type 1', 'quadro' ), 'value' => '1'),
					array('name' => __('Type 2', 'quadro' ), 'value' => '2'),
					array('name' => __('Type 3', 'quadro' ), 'value' => '3'),
					array('name' => __('Type 4', 'quadro' ), 'value' => '4'),
					array('name' => __('Type 5', 'quadro' ), 'value' => '5'),
					array('name' => __('Type 6', 'quadro' ), 'value' => '6'),
					array('name' => __('Type 7', 'quadro' ), 'value' => '7'),
					array('name' => __('Type 8', 'quadro' ), 'value' => '8'),
					),
				'std' => '3',
				'desc' => __( '(Available in Masonry Blog Style)', 'quadro' ),
			),
			array(
				'name' => __('Posts per page', 'quadro'),
				'id' => $prefix . 'mod_blog_perpage',
				'type' => 'text',
				'desc' => __('Enter -1 to show all posts in one page or leave empty to use WordPress general setting in Settings >> Reading.', 'quadro')
			),
			array(
				'name' => __('Navigation', 'quadro'),
				'id' => $prefix . 'mod_blog_show_nav',
				'type' => 'select',
				'options' => array(
					array('name' => __('Show', 'quadro' ), 'value' => 'show'),
					array('name' => __('Hide', 'quadro' ), 'value' => 'hide'),
				),
				'desc' => __('Keep in mind that navigation will always navigate all posts regardless of your custom selection at this screen.', 'quadro'),
				'std' => 'show'
			),
			array(
				'name' => __('What to show?', 'quadro'),
				'id' => $prefix . 'mod_blog_method',
				'type' => 'select',
				'options' => array(
					array('name' => __('All Posts', 'quadro' ), 'value' => 'all'),
					array('name' => __('By Categories', 'quadro' ), 'value' => 'tax'),
					array('name' => __('By Post Format', 'quadro' ), 'value' => 'format'),
					array('name' => __('Custom Selection', 'quadro' ), 'value' => 'custom'),
				),
				'std' => 'all'
			),
			array(
				'name' => __('Choose Categories to Show', 'quadro'),
				'id' => $prefix . 'mod_blog_terms',
				'type' => 'tax_picker',
				'tax_slug' => 'category'
			),
			array(
				'name' => __('Choose Post Formats to Show', 'quadro'),
				'id' => $prefix . 'mod_blog_formats',
				'type' => 'format_picker',
			),
			array(
				'name' => __('Choose Posts to Show', 'quadro'),
				'id' => $prefix . 'mod_pick_blog',
				'type' => 'posts_picker',
				'post_type' => array( 'post' ),
				'show_type' => true
			),
		)
	),


);


?>