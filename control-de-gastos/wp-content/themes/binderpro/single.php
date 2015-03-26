<?php
/**
 * The Template for displaying all single posts.
 *
 * @package quadro
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php quadro_post_nav( '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>', 'med-thumb' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if ( esc_attr( $quadro_options['single_sidebar'] ) == 'sidebar') get_sidebar(); ?>
<?php get_footer(); ?>