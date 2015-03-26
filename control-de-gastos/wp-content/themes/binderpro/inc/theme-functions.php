<?php 
/**
 * This file contains functions that are specific to this theme.
 * 
 */

// Retrieve Theme Options
global $quadro_options;
$quadro_options = quadro_get_options();


/*-----------------------------------------------------------------------------------*/
/*	Post Styling Functions
/*-----------------------------------------------------------------------------------*/

// Aply CSS styles to blog post for Colors & Background
if ( ! function_exists( 'quadro_post_styles' ) ) :
function quadro_post_styles( $post_id ) {
	$post_background = esc_attr( get_post_meta( get_the_ID(), 'quadro_post_blog_back', true ) );
	// Prevent complete black from messing with brightness meassurement
	$post_background = $post_background == '#000' || $post_background == '#000000' ? $post_background = '#010101' : $post_background;
	
	// Defining default light and dark body colors for blog posts
	$body_light = '#ffffff';
	$body_dark = '#000000';

	if ( $post_background != '#' && $post_background != '' ) {
		$post_color = quadro_get_brightness($post_background) > 130 || quadro_get_brightness($post_background) == '' ? $body_dark : $body_light;
		$this_post_css = '';
		$this_post_css .= '#post-' . $post_id . ' { background-color: ' . $post_background . ';	color: ' . $post_color . '; }';
		$this_post_css .= '#post-' . $post_id . ' h1 a, #post-' . $post_id . ' a, #post-' . $post_id . ' .cat-links { color: ' . $post_color . '; }';
		$this_post_css .= '#post-' . $post_id . ' .posted-on a, #post-' . $post_id . ' .post-icon:before { color: ' . $post_color . '; }';
		$this_post_css .= '#post-' . $post_id . ' .post-icon { background: ' . $post_background . '; }';
		// We add this to prevent same background overlap on icon and post when no thumbnail
		$this_post_css .= '#post-' . $post_id . ':not(.has-post-thumbnail):not(.format-video):not(.format-gallery) .post-icon { background: rgba(0,0,0,0.1); }';

		// Add Dynamically Generated Styles
		echo '<style scoped>' . $this_post_css . '</style>';
	}
}
endif; // if !function_exists


// Aply CSS styles to POST ICON for Colors & Background
if ( ! function_exists( 'quadro_icon_styles' ) ) :
function quadro_icon_styles( $post_id ) {
	$post_background = esc_attr( get_post_meta( get_the_ID(), 'quadro_post_blog_back', true ) );
	$post_background = $post_background == '#000' || $post_background == '#000000' ? $post_background = '#010101' : $post_background;
	
	// Defining default light and dark body colors for blog posts
	$body_light = '#fff';
	$body_dark = '#000';

	if ( $post_background != '#' && $post_background != '' ) {
		$post_color = quadro_get_brightness($post_background) > 130 || quadro_get_brightness($post_background) == '' ? $body_dark : $body_light;
		$this_post_css = '#post-' . $post_id . ' .post-icon:before { color: ' . $post_color . '; }';
		$this_post_css .= '#post-' . $post_id . ' .post-icon { background: ' . $post_background . '; }';

		// Add Dynamically Generated Styles
		echo '<style scoped>' . $this_post_css . '</style>';
	}	
}
endif; // if !function_exists


// Modify the output for the More Tag in posts
if ( ! function_exists( 'quadro_more_tag' ) ) :
function quadro_more_tag() {
	return '<a href="' . get_the_permalink() . '" class="readmore-link"><span class="read-more">' . __('Leer más', 'quadro') . '</span></a>';
}
endif; // if !function_exists
add_filter( 'the_content_more_link', 'quadro_more_tag' );


/*-----------------------------------------------------------------------------------*/
/*	Pages Styling Functions
/*-----------------------------------------------------------------------------------*/

// Aply CSS styles to Pages for Colors & Background
if ( ! function_exists( 'quadro_page_styles' ) ) :
function quadro_page_styles( $page_id ) {

	$page_css = '';
	$css = false;
	$page_use_pic	= get_post_meta( $page_id, 'quadro_page_back_usepic', true );
	$page_pic_url 	= esc_url( get_post_meta( $page_id, 'quadro_page_back_pic', true ) );
	$title_color    = esc_attr( get_post_meta( $page_id, 'quadro_page_title_color', true ) );
	$back_color     = esc_attr( get_post_meta( $page_id, 'quadro_page_header_back_color', true ) );
	$header_use_pic	= get_post_meta( $page_id, 'quadro_page_header_back_usepic', true );
	// Get featured image for background
	if ( $header_use_pic == 'true' ) $feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($page_id), 'full-thumb' );

	if ( $page_use_pic == 'true' ) {
		$page_css .= $page_pic_url != '' ? 'body { background-image: url("' . $page_pic_url . '"); background-size: cover; background-repeat: repeat; background-attachment: fixed; }' : '';
		$css = true;
	}

	if ( $title_color != '#' || $back_color != '#' || $header_use_pic ) {
		$page_css .= $title_color != '#' ? 'h1.page-title, .page-tagline { color: ' . $title_color . '; }' : '';
		$page_css .= $back_color != '#' && $header_use_pic != 'true' ? '.page-header { background-color: ' . $back_color . '; }' : '';
		$page_css .= $header_use_pic == 'true' && $feat_image_url[0] != '' ? '.page-header { background-image: url("' . $feat_image_url[0] . '"); }' : '';
		$css = true;
	}

	if ( $css == true ) {
		// Add Dynamically Generated Styles
		echo '<style scoped>' . $page_css . '</style>';
	}

}
endif; // if !function_exists


/*-----------------------------------------------------------------------------------*/
/*	Sections Output (printing) Functions
/*-----------------------------------------------------------------------------------*/

/**
 * Print Site Title & Gravatar / Logo
 */
if ( ! function_exists( 'quadro_site_title' ) ) :
function quadro_site_title() {
	// Retrieve Theme Options
	global $quadro_options;
	if ( $quadro_options['logo_type'] == 'gravatar' ) {
		if ( get_avatar( get_bloginfo('admin_email') ) ) 
			echo '<a href="' . esc_url( home_url( "/" ) ) . '" class="avatar-link" rel="home">' . get_avatar( get_bloginfo('admin_email'), $size='120', '', get_bloginfo('name') ) . '</a>';
		?>
		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</h1>
	<?php } else if ( $quadro_options['logo_type'] == 'logo' ) { ?>
		<h1 class="site-title logo-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php echo esc_url( $quadro_options['logo_img'] ); ?>" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?> Logo">
			</a>
		</h1>
	<?php } else if ( $quadro_options['logo_type'] == 'title' ) { ?>
		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</h1>
	<?php }
}
endif; // if !function_exists


/**
 * Print Site Menu
 */
if ( ! function_exists( 'quadro_site_menu' ) ) :
function quadro_site_menu() {
	// Retrieve Theme Options
	global $quadro_options; ?>
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="inner-nav">
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'quadro' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<?php if ( $quadro_options['search_header_display'] == 'show' ) {
				echo '<div class="header-search">';
					get_search_form();
				echo '</div>';
				// Add handler for full width, static menu
				if ( $quadro_options['header_style'] == 'type2' && $quadro_options['menu_type'] == 'static' ) {
					echo '<span class="search-handler"></span>';
				}
			} ?>
		</div>
	</nav><!-- #site-navigation -->
	<?php
}
endif; // if !function_exists


/**
 * Print Search Bar
 */
if ( ! function_exists( 'quadro_search_bar' ) ) :
function quadro_search_bar() {
	// Retrieve Theme Options
	global $quadro_options;
	if ( $quadro_options['search_header_display'] == 'show' ) {
		echo '<div class="search-area"><span class="search-icon"><i class="fa fa-search"></i></span>';
		echo '<div class="search-slide">';
			get_search_form();
		echo '</div></div>';
	}
}
endif; // if !function_exists


/**
 * Prints a Login functionality section, as defined in Theme Options.
 * Will bring a custom menu when user logged in.
 */
if ( ! function_exists( 'quadro_header_login' ) ) :
function quadro_header_login() {
	global $quadro_options;
	if( !is_user_logged_in() ) { ?>
		<a href="<?php echo esc_url( $quadro_options['header_login_url'] ); ?>" title="<?php echo esc_attr( $quadro_options['header_login_text'] ); ?>">
			<i class="fa fa-user"></i><span><?php echo esc_attr( $quadro_options['header_login_text'] ); ?></span>
		</a>
	<?php } else { 
		$current_user = wp_get_current_user(); ?>
		<a href="<?php echo esc_url( $quadro_options['header_logged_url'] ); ?>" title="<?php echo $current_user->display_name; ?>">
			<i class="fa fa-user"></i><span><?php echo $current_user->display_name; ?></span></a>
		<?php if ( has_nav_menu( 'user' ) ) { ?>
			<nav id="user-navigation" class="user-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'user' ) ); ?>
			</nav>
		<?php } ?>
	<?php }
}
endif; // if !function_exists


if ( ($quadro_options['header_cart'] == 'show' && class_exists('Woocommerce')) || $quadro_options['header_login'] == 'show' ) { 
	
	// Add 'header-extras-on' to body class
	function quadro_header_extras_class($classes) {
		$classes[] = 'header-extras-on';
		return $classes;
	}
	add_filter('body_class', 'quadro_header_extras_class');

	// Add Logout link to User Menu
	if ( $quadro_options['header_login'] == 'show' && $quadro_options['header_logout'] == 'show' ) {
		if ( ! function_exists( 'quadro_logout_link' ) ) :
		function quadro_logout_link( $nav, $args ) {
			global $quadro_options;
			$logout_text = $quadro_options['header_logout_text'] != '' ? $quadro_options['header_logout_text'] : 'Logout';
			if( $args->theme_location == 'user' ) 
				return $nav . '<li><a href="' . wp_logout_url( get_permalink() ) . '" title="' . $logout_text . '"><i class="fa fa-sign-out"></i> ' . $logout_text . '</a></li>';
			return $nav;
		}
		endif; // if !function_exists
		add_filter('wp_nav_menu_items','quadro_logout_link', 10, 2);
	}

}


/**
 * Print Header Extras (WooCommerce Cart, Login Link)
 */
if ( ! function_exists( 'quadro_header_extras' ) ) :
function quadro_header_extras() {
	global $quadro_options;
	if ( ($quadro_options['header_cart'] == 'show' && class_exists('Woocommerce')) || $quadro_options['header_login'] == 'show' ) { 
		?>
		<div class="header-extras">
			<ul>
				<?php if ( $quadro_options['header_cart'] == 'show' && class_exists( 'Woocommerce' ) ) { ?>
					<li><?php quadro_header_cart(); ?></li> 
				<?php } ?>
				<?php if ( $quadro_options['header_login'] == 'show' ) { ?>
					<li class="qi-login-link"><?php quadro_header_login(); ?></li>
				<?php } ?>
			</ul>
		</div>
	<?php }
}
endif; // if !function_exists


/**
 * Print Author Box
 */
if ( ! function_exists( 'quadro_author_box' ) ) :
function quadro_author_box( $author_ID ) {

	$author = get_user_by( 'id', $author_ID );
	$author_link = get_author_posts_url( $author_ID );
	?>

	<div class="author-box">

		<div class="inner-author">

			<div class="author-name">
				<?php if ( get_avatar( $author->user_email ) ) {
					echo '<a href="' . $author_link . '" title="' . __('Posts by ', 'quadro') . $author->display_name . '">';
					echo get_avatar( $author->user_email, $size='120', '', $author->display_name ) . '</a>'; 
				} ?>
				<h3>
					<a href="<?php echo $author_link; ?>" title="<?php echo __('Posts by ', 'quadro') . $author->display_name; ?>">
						<?php echo $author->display_name; ?>
					</a>
				</h3>
			</div>
			
			<?php if ( get_the_author_meta( 'description', $author_ID ) != '' )
			 echo '<div class="author-bio">' . get_the_author_meta( 'description', $author_ID ) . '</div>'; ?>

			<div class="author-extras">
				<?php 
				if ( get_the_author_meta( 'user_email', $author_ID ) != '' )
					echo '<a class="author-email" href="mailto:' . get_the_author_meta( 'user_email', $author_ID ) . '" title="Email ' . $author->display_name . '"><i class="fa fa-envelope-o"></i></a>';
				$user_url = get_the_author_meta( 'user_url', $author_ID );
				if ( $user_url != '' )
					echo '<a class="author-web" href="' . $user_url . '" title="' . $user_url . '"><i class="fa fa-link"></i></a>';
				$twitter = get_the_author_meta( 'twitter', $author_ID );
				if ( $twitter != '' )
					echo '<a class="author-twitter" href="' . $twitter . '" title="Follow ' . $author->display_name . ' on Twitter"><i class="fa fa-twitter"></i></a>';
				$google = get_the_author_meta( 'google', $author_ID );
				if ( $google != '' )
					echo '<a class="author-googleplus" href="' . $google . '" title="Join ' . $author->display_name . ' on Google Plus"><i class="fa fa-google-plus"></i></a>';
				$facebook = get_the_author_meta( 'facebook', $author_ID );
				if ( $facebook != '' )
					echo '<a class="author-facebook" href="' . $facebook . '" title="Join ' . $author->display_name . ' on Facebook"><i class="fa fa-facebook"></i></a>';
				?>
			</div>

		</div>

	</div>

	<?php

}
endif; // if !function_exists


/*-----------------------------------------------------------------------------------*/
/*	Modules Functions 
/*  (require declared post type and custom fields definition)
/*-----------------------------------------------------------------------------------*/

// Aply CSS styles to module for Colors & Background
if ( ! function_exists( 'quadro_mod_styles' ) ) :
function quadro_mod_styles( $mod_id ) {
	$show_title     = esc_attr( get_post_meta( $mod_id, 'quadro_mod_show_title', true ) );
	$title_back    = esc_attr( get_post_meta( $mod_id, 'quadro_mod_title_back', true ) );
	$back_color     = esc_attr( get_post_meta( $mod_id, 'quadro_mod_back_color', true ) );
	$back_pattern 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_back_pattern', true ) );
	$use_pic    	= get_post_meta( $mod_id, 'quadro_mod_back_usepic', true );
	$pic_url    	= esc_url( get_post_meta( $mod_id, 'quadro_mod_back_pic', true ) );

	if ( ($show_title == 'true' && $title_back != '#') || $back_color != '#' || $back_pattern != 'none' || $use_pic ) {
		$this_mod_css = '';
		$this_mod_css .= $title_back != '#' ? '#post-' . $mod_id . ' h1.mod-title { background: ' . $title_back . '; }' : '';
		$this_mod_css .= $back_color != '#' ? '#post-' . $mod_id . ' { background-color: ' . $back_color . '; }' : '';
		$this_mod_css .= $use_pic != 'true' && ($back_pattern != 'none' && $back_pattern != '') ? '#post-' . $mod_id . ' { background-image: url("' . get_template_directory_uri() . '/images/patterns/' . $back_pattern .'.jpg"); background-repeat: repeat; }' : '';
		$this_mod_css .= $use_pic == 'true' && $pic_url != '' ? '#post-' . $mod_id . ' { background-image: url("' . $pic_url . '"); background-repeat: no-repeat; background-size: cover; }' : '';

		// Add Dynamically Generated Styles
		echo '<style scoped>' . $this_mod_css . '</style>';
	}	
}
endif; // if !function_exists


// Bring Module's Editor Content
if ( ! function_exists( 'quadro_module_content' ) ) :
function quadro_module_content() {
	if ( get_the_content() != '' ) {
		echo '<div class="mod-editor-content">';
		the_content();
		echo '</div>';
	}
}
endif; // if !function_exists


// Check for Parallax Background Option
function quadro_mod_parallax( $mod_id ) {
	// Only if not mobile
	if ( ! wp_is_mobile() ) {
		// Get parallax data
		$parallax = esc_attr( get_post_meta( $mod_id, 'quadro_mod_parallax', true ) );
		echo $parallax == 'true' ? 'parallax-back' : '';
	}
	else {
		return;
	}
}


// Show the Title for Module if option is true
if ( ! function_exists( 'quadro_mod_title' ) ) :
function quadro_mod_title( $mod_id ) {
	// Retrieve option
	$show_title = get_post_meta( $mod_id, 'quadro_mod_show_title', true );
	if ( $show_title == 'true' ) {
		echo '<header class="mod-header">';
			echo '<h1 class="mod-title">' . get_the_title() . '</h1>';
		echo '</header><!-- .mod-header -->';
	}
}
endif; // if !function_exists


// Add Twitter, Google and Facebook fields to user profile
add_filter('user_contactmethods', 'quadro_user_contactmethods');
if ( ! function_exists( 'quadro_user_contactmethods' ) ) :
function quadro_user_contactmethods($user_contactmethods) {
 
  $user_contactmethods['twitter'] = 'Twitter URL';
  $user_contactmethods['google'] = 'Google Profile URL';
  $user_contactmethods['facebook'] = 'Facebook Profile URL';
 
  return $user_contactmethods;

}
endif; // if !function_exists


/*-----------------------------------------------------------------------------------*/
/*	Options Add Ons
/*-----------------------------------------------------------------------------------*/

// Handle the control for an already submitted Mailchimp form
function quadro_mailchimp_submit_checker() {

	// Verify nonce first
	$nonce = $_POST['security'];
	if ( ! wp_verify_nonce($nonce, 'quadro_mailchimp_nonce') ) die('-1');

	// Set form as already submitted for this user
	$user_id = get_current_user_id();
	$theme = wp_get_theme();
	update_option( $theme . '_mailchimp_user_' . $user_id , 'submitted' );

	die('1');

}
add_action('wp_ajax_quadro_mailchimp_submit_check', 'quadro_mailchimp_submit_checker');


// Define user and theme
$user_id = get_current_user_id();
$theme = wp_get_theme();

// Only for testing purposes. Keep commented.
// update_option( $theme . '_mailchimp_user_' . $user_id , false );

// Check for previously submitted form
$submitted = get_option( $theme . '_mailchimp_user_' . $user_id );
// Also, let's get this same data from Binder, for previously submitted forms
// so we can avoid showing the form if already submitted in Binder theme.
$b_submitted = get_option( 'binder_mailchimp_user_' . $user_id );


// Define and add Mailchimp scripts and subscription 
// form only if not submitted before by this user
if ( (!isset($submitted) || $submitted == false) && (!isset($b_submitted) || $b_submitted == false) ) {

	// Enqueue Mailchimp Validation Script
	function qi_mailchimp_scripts() {
		wp_enqueue_script('jquery');
		wp_register_script('mailchimp-scripts', get_template_directory_uri() . '/inc/qi-framework/js/mailchimp-validate.js', 'jquery', '', true);
		wp_enqueue_script('mailchimp-scripts');
	}
	add_action( 'admin_enqueue_scripts', 'qi_mailchimp_scripts' );

	// Add Email Signup Form to Theme Options Sidebar
	add_action( 'qi_options_sidebar', 'quadro_options_form' );
	function quadro_options_form() {
		?>
		<aside class="qi-aside">
			<!-- Begin MailChimp Signup Form -->
			<div id="mc_embed_signup">
				<h3>Get 5 super easy tips to make the most out of Binder Pro Theme!</h3>
				<span class="privacy-tag">(We respect your privacy and we'll never share your email address)</span>
				<form action="//quadroideas.com/newsletter-subscription-api/" method="get" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<!-- <div class="indicates-required"><span class="asterisk">*</span> indicates required</div> -->
					<div class="mc-field-group">
						<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label>
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
					</div>
					<div class="mc-field-group">
						<label for="mce-FNAME">First Name <span class="asterisk">*</span></label>
						<input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
					</div>
					<div class="mc-field-group">
						<label for="mce-LNAME">Last Name </label>
						<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
					</div>
					<!-- Specify which theme is applying -->
					<!-- <input type="checkbox" id="group_16" name="group[8293][16]" value="1" style="display: none;" checked="checked"> -->
					<input type="hidden" id="group_16" name="GROUP" value="Binder Pro WordPress Theme">
					<!-- end theme application -->
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;"><input type="text" name="b_da8317ec81c3be8caab556510_571b83d926" tabindex="-1" value=""></div>
					<div class="clear">
						<input type="hidden" id="mailchimp_nonce" name="mailchimp_nonce" value="<?php echo wp_create_nonce('quadro_mailchimp_nonce'); ?>" />
						<input type="submit" value="Get them!" name="subscribe" id="mc-embedded-subscribe" class="button">
					</div>
				</form>
			</div>
			<!--End mc_embed_signup-->
		</aside>
		<?php
	}

} // end if form not submitted yet once


// Add Video Library Banner to Theme Options Sidebar
add_action( 'qi_options_sidebar', 'quadro_options_video_banner' );
function quadro_options_video_banner() {
	?>
	<aside class="qi-aside banner">
		<a href="http://quadroideas.com/video-training?utm_source=BinderPRO&utm_medium=theme&utm_content=101videoBanner">
			<img src="<?php echo get_template_directory_uri(); ?>/images/admin/video-training-banner.jpg"/>
		</a>
	</aside>
	<?php
}


// // Add nice messages area to Theme Options sidebar
// add_action( 'qi_options_sidebar', 'quadro_greeting_posts' );
// function quadro_greeting_posts() {
// 	echo '<h3>Let\'s make this an awesome day! Any new ideas to work on?</h3>';
// }

// // Add useful links area to Theme Options sidebar
// add_action( 'qi_options_sidebar', 'quadro_useful_links' );
// function quadro_useful_links() {
// 	echo '<aside>';
// 	echo '<h3>Useful Links to Keep at Hand</h3>';
// 	echo '<ul>';
// 	echo '<li><a href="http://quadroideas.com/stock-photos/" target="_blank" title="Free Stock Photos Collection">QI Free Stock Photos Collection</a></li>';
// 	echo '</ul>';
// 	echo '</aside>';
// }


/*-----------------------------------------------------------------------------------*/
/*	Advertising Functions
/*-----------------------------------------------------------------------------------*/

// Output Ad Section (section corresponds to specific hook)
if ( ! function_exists( 'quadro_ad_output' ) ) :
function quadro_ad_output( $section ) {
	global $quadro_options; 

	// Return if set not to be shown
	if ( $quadro_options['ads_'.$section.'_show'] != 'show' )
		return false;

	// Do shortcode if there is one
	if ( $quadro_options['ads_'.$section.'_shortcode'] != '' ) {
		echo '<div class="qi-ad ad-' . $section . '">';
		echo do_shortcode( esc_textarea( $quadro_options['ads_'.$section.'_shortcode'] ) );
		echo '</div>';
	}
	elseif ( $quadro_options['ads_'.$section.'_upload'] != '' ) {
		echo '<div class="qi-ad ad-' . $section . '"><a href="' . esc_url( $quadro_options['ads_'.$section.'_url'] ) . '" 
			target="' . esc_attr( $quadro_options['ads_'.$section.'_target'] ) . '">
			<img src="' . esc_url( $quadro_options['ads_'.$section.'_upload'] ) . '"></a></div>';
	}
}
endif; // if !function_exists


// Return Ad Section (section corresponds to specific hook)
if ( ! function_exists( 'quadro_ad_return' ) ) :
function quadro_ad_return( $section ) {
	global $quadro_options; 

	// Return if set not to be shown
	if ( $quadro_options['ads_'.$section.'_show'] != 'show' )
		return false;

	// Do shortcode if there is one
	if ( $quadro_options['ads_'.$section.'_shortcode'] != '' ) {
		$ad = '<div class="qi-ad ad-' . $section . '">';
		$ad .= do_shortcode( esc_textarea( $quadro_options['ads_'.$section.'_shortcode'] ) );
		$ad .= '</div>';
	}
	elseif ( $quadro_options['ads_'.$section.'_upload'] != '' ) {
		$ad = '<div class="qi-ad ad-' . $section . '"><a href="' . esc_url( $quadro_options['ads_'.$section.'_url'] ) . '" 
			target="' . esc_attr( $quadro_options['ads_'.$section.'_target'] ) . '">
			<img src="' . esc_url( $quadro_options['ads_'.$section.'_upload'] ) . '"></a></div>';
	}
	return $ad;
}
endif; // if !function_exists

// Add Pre Title Ad
add_action( 'qi_before_post_title', 'quadro_ad_output', 1, 1 );

// Add After Title Ad
add_action( 'qi_after_post_title', 'quadro_ad_output', 1, 1 );

// Add Pre Content Ad
add_action( 'qi_before_post', 'quadro_ad_output', 1, 1 );

// Add After Content Ad
add_action( 'qi_after_post', 'quadro_ad_output', 1, 1 );

// Add Inside Post Ad
function qi_inside_post_ad( $content ) {
	// We check "single" for single posts and "is_main_query"
	// to avoid this showing up in weird places via the_content filter
	global $post;
	if( is_single() && is_main_query() && $post->post_type === 'post' ) {
		global $quadro_options;
		$ad_content = '';
		$p_after = $quadro_options['ads_midcontent_paragraphs'];
		$content = explode( '</p>', $content );
		for ( $i = 0; $i < count($content); $i++ ) {
			if ( $i == $p_after ) {
				$ad_content .= quadro_ad_return( 'midcontent' );
			}
			$ad_content .= $content[$i] . '</p>';
		}
	}
	if ( !isset($ad_content) || $ad_content == '' ) $ad_content = $content;
	return $ad_content;
}

// Add filter for inside posts ad
if ( $quadro_options['ads_midcontent_show'] == 'show' ) {
	add_filter( 'the_content', 'qi_inside_post_ad' );
}


?>