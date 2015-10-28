<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script><![endif]-->

<?php // Retrieve Theme Options
global $quadro_options;
$quadro_options = quadro_get_options(); ?>

<?php if ( $quadro_options['favicon_img'] ) { ?>
<link rel="shortcut icon" href="<?php echo esc_url( $quadro_options['favicon_img'] ); ?>">
<?php } ?>

<?php // Bring Header & Layout Options
$header_style 	= esc_attr( $quadro_options['header_style'] );
$menu_type 		= esc_attr( $quadro_options['menu_type'] );
$header_layout 	= esc_attr( $quadro_options['header_layout'] );
$show_search 	= esc_attr( $quadro_options['search_header_display'] );
$single_sidebar	= esc_attr( $quadro_options['single_sidebar'] );
$sidebar_pos	= esc_attr( $quadro_options['single_sidebar_pos'] );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class('site-header-'.$header_style . ' onsingle-' . $single_sidebar . '-' . $sidebar_pos . ' woo-sidebar-' . $quadro_options['woo_sidebar'] . ' woo-cols' . $quadro_options['woo_loop_columns']); ?>>

<?php if ( is_page() ) {
	// Apply function for inline styles
	quadro_page_styles( get_the_ID() );
} ?>

<?php if ( class_exists( 'Woocommerce' ) && ( is_woocommerce() ) ) {
	// Apply function for inline styles of WooCommerce special pages
	// using the selected Shop page options
	quadro_page_styles( get_option('woocommerce_shop_page_id') );
} ?>

<div id="page" class="hfeed site">

	<header id="masthead" class="site-header <?php echo $menu_type; ?>-menu <?php echo $header_layout; ?> <?php echo $show_search; ?>-search" role="banner">

		<div class="inner-header">
			<div class="site-branding">
				<?php quadro_site_title(); ?>
			</div>

			<?php if ( esc_attr($quadro_options['about_text']) != '' ) { ?>
			<h2 class="site-description"><?php echo esc_attr($quadro_options['about_text']); ?></h2>
			<?php } ?>

			<?php //quadro_social_icons('social_header_display', 'header-social-icons', 'header_icons_scheme', 'header_icons_color_type'); ?>

			<?php if ( $header_style == 'type2' && $menu_type == 'static' && $header_layout == 'header-layout2 header-layout3' && $quadro_options['ads_header_show'] == 'show' )
				quadro_ad_output( 'header' );
			else
				quadro_social_icons('social_header_display', 'header-social-icons', 'header_icons_scheme', 'header_icons_color_type');
			?>

			<h1 class="menu-toggle"><i class="fa fa-bars"></i></h1>

			<?php if ( $header_style == 'type2' && $menu_type == 'static' && $header_layout == 'header-layout1' ) quadro_site_menu(); ?>

			<?php if ( $quadro_options['widgt_header_display'] == 'show' && $header_style == 'type1' ) dynamic_sidebar( 'widgetized-header' ); ?>

		</div>

		<?php if ( $menu_type == 'icon' || ( $menu_type == 'static' && ($header_layout == 'header-layout2' || $header_layout == 'header-layout2 header-layout3') ) || $header_style == 'type1' ) quadro_site_menu(); ?>

		<?php quadro_header_extras(); ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
