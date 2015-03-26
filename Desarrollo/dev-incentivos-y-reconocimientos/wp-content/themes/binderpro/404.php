<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package quadro
 */

get_header(); ?>

<?php // Retrieve Theme Options
global $quadro_options; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<div class="page-inner-header">
						<h1 class="page-title">
							<?php echo esc_attr( $quadro_options['404_title'] ); ?>
						</h1>
					</div>
				</header><!-- .page-header -->

				<div class="page-content">
					<div class="error-404-text">
						<?php echo strip_tags( $quadro_options['404_text'], '<div><img><p><span><a><br><strong><em><i><bold><small>' ); ?>
					</div>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>