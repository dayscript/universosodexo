<?php
/**
 * Template Name: Contact Page
 * 
 * The template for displaying all contact pages.
 * Note: Page styles function gets called in header.php
 */

get_header(); ?>

<?php 
// Get metadata for Contact Page Template
$page_id = get_the_ID();
$map_address 	= esc_attr( get_post_meta( $page_id, 'quadro_contact_map', true ) );
$sidebar_style 	= esc_attr( get_post_meta( $page_id, 'quadro_contact_sidebar', true ) );
?>

	<div id="primary" class="content-area sidebar-<?php echo $sidebar_style; ?>">
		
		<main id="main" class="site-main" role="main">

			<?php if ( $map_address != '' ) { ?>
			<div class="contact-map">
				<div id="google-map-iframe" class="google-map-contact"></div>
				<script>
					jQuery(document).ready(function(){ 
						jQuery('.google-map-contact').gmap3({
							marker:{
								address: "<?php echo esc_attr( $map_address ); ?>",
							},
							map:{
								options:{
									zoom: 14,
									scrollwheel: false,
								}
							}
						});
					});
				</script>
			</div>
			<?php } ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #content -->

	</div><!-- #primary -->

<?php if ( $sidebar_style != 'nosidebar' ) get_sidebar(); ?>
<?php get_footer(); ?>
