<?php

/*-----------------------------------------------------------------------------------*/
/*	Aply Theme options to CSS
/*-----------------------------------------------------------------------------------*/

function quadro_gfonts_script( ) {

	wp_register_script('googlefloader', '//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js');
	wp_enqueue_script('googlefloader');

}
add_action( 'wp_enqueue_scripts', 'quadro_gfonts_script' );


function quadro_css_aply( ) {
	
	// Retrieve Theme Options
	global $quadro_options;
	
	$headings_font = explode("|", strip_tags( $quadro_options['headings_font'] )); 
	$body_font = explode("|", strip_tags( $quadro_options['body_font'] )); 
	
	$load_fonts = '';

	if ( $headings_font[0] != 'none' && $quadro_options['custom_font_name'] == '' ) {
		$load_fonts .= "'" . $headings_font[0] . esc_attr( $quadro_options['headings_weight'] ) . esc_attr( $quadro_options['font_subset'] ) . "', ";
	}

	if ( $body_font !== $headings_font || $quadro_options['custom_font_name'] != '' ) {
		if ( $body_font[0] != 'none' ) {
			$load_fonts .= "'" . $body_font[0] . esc_attr( $quadro_options['body_weight'] ) . esc_attr( $quadro_options['font_subset'] ) . "', ";
		}
	} ?>

<?php if ( $load_fonts != '' ) { ?>
<script>
	WebFont.load({
		google: {
			families: [<?php echo $load_fonts; ?>],
		},
		timeout: 3500 // Set the timeout
	});
</script>
<?php } ?>

<?php echo '<style>'; ?>

body {
	<?php 
	echo 'background-color: ' . esc_attr( $quadro_options['background_color'] ) . ';';
	if ( $quadro_options['background_img'] != '' ) {
		echo 'background-image: url(\'' . esc_url( $quadro_options['background_img'] ) . '\');';
		echo 'background-size: cover;';
	} else {
		if ( $quadro_options['background_pattern'] != 'none' ) {
			echo 'background-image: url(\'' . get_template_directory_uri() . '/images/patterns/' . esc_attr( $quadro_options['background_pattern'] ) . '.jpg\');';
			echo 'background-repeat: repeat;';
		}
	} ?>

	<?php echo $body_font[1]; ?>
	font-size: <?php echo esc_attr( $quadro_options['body_size'] ); ?>px;
}

<?php // Header Background Image
if ( esc_url( $quadro_options['header_back'] ) != '' ) {
	echo '.site-header { background-image: url("' . esc_url( $quadro_options['header_back'] ) . '"); }';
} ?>

.mod-title, .meta-nav strong, .site-header .widget-title, .static-menu .main-navigation .menu a {
	<?php echo $body_font[1]; ?>
}

.single-post article a, .single-post article a:visited,
.page-content a, .page-content a:visited {
	color: <?php echo esc_attr( $quadro_options['links_color'] ); ?>;
}

a:hover,
.single-post article a:hover,
.page-content a:hover {
	color: <?php echo esc_attr( $quadro_options['hover_color'] ); ?>;
}

h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1, h2, h3, h4, h5, h6,
.mod-editor-content, .readmore-link, input[type="submit"], .comment-reply-link, 
.comment-author cite, .post-navigation .meta-nav, .paging-navigation .meta-nav, .comment-navigation a,
blockquote, q, .taxonomy-description p, .wpcf7 p, .read-author-link a, .qbtn, input[type="button"],
.flashnews-content .entry-title, div#jp-relatedposts h3.jp-relatedposts-headline {
	<?php echo $headings_font[1]; ?>
}

<?php if ( class_exists( 'Woocommerce' ) ) { ?>
.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit,
.woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button,
.woocommerce-page #respond input#submit, .woocommerce-page #content input.button {
	<?php echo $headings_font[1]; ?>
}
<?php } ?>


<?php if ( $quadro_options['logo_type'] == 'gravatar' ) {
	// Logo Text CSS
	echo '.site-title { ';
		echo $headings_font[1];
		echo 'font-size: ' . esc_attr( $quadro_options['site_title_size'] ) . 'px;';
	echo '}';
} ?>

.main-navigation .menu a {
	<?php echo $headings_font[1]; ?>
}

.site-footer { background-color: <?php echo esc_attr( $quadro_options['footer_background'] ); ?>; }
.site-footer, .widget select, .widget input[type="submit"] { color: <?php echo esc_attr( $quadro_options['footer_text_color'] ); ?> }
.site-footer a { color: <?php echo esc_attr( $quadro_options['footer_links_color'] ); ?> }

<?php // Colors for Social Icons Areas
if ( $quadro_options['header_icons_color_type'] == 'custom' ) {
		echo '.header-social-icons li a i { color: ' . esc_attr( $quadro_options['header_icons_color'] ) . '; }';
}
if ( $quadro_options['footer_icons_color_type'] == 'custom' ) {
		echo '.footer-social-icons li a i { color: ' . esc_attr( $quadro_options['footer_icons_color'] ) . '; }';
} ?>

<?php // Custom Font Management
if ( $quadro_options['custom_font_name'] != '' ) {
	
	// Stam variable for comma adding
	$prev = false;

	// First, load the font
	echo '@font-face {';
	echo 'font-family: "' . esc_attr($quadro_options['custom_font_name']) . '";';
	if ( $quadro_options['custom_font_eot'] != '' ) echo 'src: url("' . esc_url($quadro_options['custom_font_eot']) . '");';
	echo 'src: ';
	if ( $quadro_options['custom_font_eot'] != '' ) { 
		$prev = true;
		echo 'url("' . esc_url($quadro_options['custom_font_eot']) . '?#iefix") format("embedded-opentype")';
	} if ( $quadro_options['custom_font_woff'] != '' ) { 
		if ( $prev == true ) echo ', '; $prev = true;
		echo 'url("' . esc_url($quadro_options['custom_font_woff']) . '") format("woff")';
	} if ( $quadro_options['custom_font_ttf'] != '' ) { 
		if ( $prev == true ) echo ', '; $prev = true;
		echo 'url("' . esc_url($quadro_options['custom_font_ttf']) . '") format("truetype")';
	} if ( $quadro_options['custom_font_svg'] != '' ) { 
		if ( $prev == true ) echo ', '; $prev = true;
		echo 'url("' . esc_url($quadro_options['custom_font_svg']) . '") format("svg")';
	} 
	echo '; font-weight: normal; font-style: normal; }';

	// Then, declare rules for it
	if ( $quadro_options['custom_font_use_logo'] == true && $quadro_options['logo_type'] == 'text' ) {
		echo '.site-title a { font-family: ' . esc_attr($quadro_options['custom_font_name']) . ', Helvetica, Arial, sans-serif;}';
	}
	if ( $quadro_options['custom_font_use_headings'] == true ) {
		echo 'h1 a, h2 a, h3 a, h4 a, h5 a, h6, h1, h2, h3, h4, h5, h6 { font-family: ' . esc_attr($quadro_options['custom_font_name']) . ', Helvetica, Arial, sans-serif;}';
	}

} ?>

<?php if ( $quadro_options['custom_css'] != '' ) {
	$css = preg_replace( "'<[^>]+>'U", "", $quadro_options['custom_css']);
	$css = str_replace( '&gt;', '>', $css ); // pre_replace replaces lone '>' with &gt;
	// Why both preg_replace and strip_tags?  Because we just added some '>'.
	$css = strip_tags( $css );
	echo $css;
} ?>

<?php echo '</style>'; ?>

<!--[if lt IE 10]>
<style>
@media only screen and (min-width: 760px) {
	.caption-type1 .slide-caption,
	.caption-type1.caption-right .slide-caption,
	.caption-type1.caption-alternated .quadro-slides li:nth-of-type(even) .slide-caption {
		min-width: 500px; 
		padding: 60px;
	}
}
</style>
<![endif]-->

<!--[if lt IE 9]>
	<?php $IEfontsPre = str_replace("'", "", $load_fonts); ?>
	<?php $IEfonts = str_replace(",", "|", $IEfontsPre); ?>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo esc_attr( $IEfonts ); ?>">
<![endif]-->
 
<?php } // end of function

add_action( 'wp_head', 'quadro_css_aply' );

?>