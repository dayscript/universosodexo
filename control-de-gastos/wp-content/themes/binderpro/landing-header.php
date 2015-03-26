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
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script><![endif]-->

<?php // Retrieve Theme Options
global $quadro_options;
$quadro_options = quadro_get_options(); ?>

<?php if ( $quadro_options['favicon_img'] ) { ?>
<link rel="shortcut icon" href="<?php echo esc_url( $quadro_options['favicon_img'] ); ?>">
<?php } ?>

<?php wp_head(); ?>
</head>

<body <?php body_class('site-header-type2'); ?>>

<?php // Apply function for inline styles
quadro_page_styles( get_the_ID() ); ?>

<div id="page" class="hfeed site">

	<div id="content" class="site-content">
