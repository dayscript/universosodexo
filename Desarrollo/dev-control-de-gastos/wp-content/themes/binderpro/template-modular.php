<?php
/*
Template Name: Modular Template
*/

get_header(); ?>

<?php 
// Get Page metadata
$page_id = get_the_ID();
$hide_header 		= esc_attr( get_post_meta( $page_id, 'quadro_page_header_hide', true ) );
$hide_header_class 	= $hide_header == 'true' ? ' header-hide' : ' no-header-hide';
if ( $hide_header != 'true' ) {
	$use_tagline 		= esc_attr( get_post_meta( $page_id, 'quadro_page_show_tagline', true ) );
	$page_tagline 		= esc_attr( get_post_meta( $page_id, 'quadro_page_tagline', true ) );
	$back_color     	= esc_attr( get_post_meta( $page_id, 'quadro_page_header_back_color', true ) );
	$header_style 		= $back_color != '#' ? 'colored-header' : '';
}
?>	

	<div id="primary" class="modular-wrapper">
		
		<main id="main" class="modular-modules <?php echo $hide_header_class; ?>" role="main">

			<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( $hide_header != 'true' ) { ?>
				<header class="page-header <?php echo $header_style; ?>">
					<div class="page-inner-header">
						<h1 class="page-title"><?php the_title(); ?></h1>
						<?php if ( $use_tagline == 'true' ) { ?>
						<h2 class="page-tagline"><?php echo $page_tagline; ?></h2>
						<?php } ?>
						<?php bop_breadcrumbs(); ?>
					</div>
				</header><!-- .page-header -->
				<?php } ?>

				<?php // Query for the Modular Template Modules
				$args = array(
					'post_type' =>  'quadro_mods',
					'posts_per_page' => -1,
				);
				// Bring picked posts if there are some
				$args = quadro_add_selected_posts( get_the_ID(), 'quadro_mod_temp_modules', $args );
				$quadro_mods = new WP_Query( $args );
				?>
				
				<?php if( $quadro_mods->have_posts() ) : while( $quadro_mods->have_posts() ) : $quadro_mods->the_post(); ?>
			
					<?php // Retrieve Module type
					$mod_type = esc_attr( get_post_meta( get_the_ID(), 'quadro_mod_type', true ) ); ?>
					<?php // and call the template for it
					get_template_part( 'module', $mod_type ); ?>
				
				<?php endwhile; endif; // ends 'quadro_mods' loop ?>
				<?php wp_reset_postdata(); ?>

			</section><!-- #post-## -->

		</main><!-- #content -->
		
	</div><!-- #primary -->

<?php get_footer(); ?>