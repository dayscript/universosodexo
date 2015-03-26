<?php
/**
 * Template Name: Landing Page
 * 
 * The template for displaying landing pages.
 * 
 * Note: This template uses different header.php and footer.php files
 * that bring much less content and are optimized for this template.
 * 
 * Note (2): Page styles function gets called in landing-header.php
 * 
 */

get_template_part( 'landing', 'header' ); ?>

<?php // Get Page metadata
$page_id = get_the_ID();
$use_tagline 	= esc_attr( get_post_meta( $page_id, 'quadro_page_show_tagline', true ) );
$page_tagline 	= esc_attr( get_post_meta( $page_id, 'quadro_page_tagline', true ) );
$back_color     = esc_attr( get_post_meta( $page_id, 'quadro_page_header_back_color', true ) );
$header_style 	= $back_color != '#' ? 'colored-header' : '';
$hide_header 		= esc_attr( get_post_meta( $page_id, 'quadro_landing_header_hide', true ) );
$hide_header_class 	= $hide_header == 'true' ? ' header-hide' : ' no-header-hide';
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="page-inner-header">
					<?php if ( $hide_header != 'true' ) { ?>
					<header class="page-header <?php echo $header_style; ?>">
						<div class="page-inner-header">	
							<h1 class="page-title"><?php the_title(); ?></h1>
							<?php if ( $use_tagline == 'true' ) { ?>
							<h2 class="page-tagline"><?php echo $page_tagline; ?></h2>
							<?php } ?>
						</div>
					</header><!-- .page-header -->
					<?php } ?>

					<div class="page-content landing-page-content">
						<?php the_content(); ?>
					</div><!-- .page-content -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_template_part( 'landing', 'footer' ); ?>