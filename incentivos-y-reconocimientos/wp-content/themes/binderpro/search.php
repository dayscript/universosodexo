<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package quadro
 */

get_header(); ?>

<?php // Retrieve Theme Options
global $quadro_options; ?>

<?php // Define Animations
$anim = esc_attr($quadro_options['blog_layout']) == 'classic' ? '' : 'anim-grid'; ?>

<?php // Define Sidebar class
$sidebar = esc_attr($quadro_options['blog_sidebar']) == true ? 'with-sidebar' : 'no-sidebar'; ?>
		
<?php if ( have_posts() ) : ?>
	
	<div id="primary" class="content-area blog-style-<?php echo esc_attr($quadro_options['blog_layout']); ?> masonry-margins-<?php echo esc_attr($quadro_options['masonry_margins']); ?> <?php echo $sidebar; ?>">
		<main id="main" class="site-main" role="main">

			<div id="grid" class="<?php echo $anim; ?> anim-<?php echo esc_attr($quadro_options['blog_animation']); ?> blog-container blog-content blog-<?php echo esc_attr($quadro_options['blog_layout']); ?> blog-columns-<?php echo esc_attr($quadro_options['blog_columns']); ?>">

				<header class="archive-header mas-item blog-item">
					<h1 class="archive-title"><?php printf( __( 'Search Results for: %s', 'quadro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .archive-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					if ( esc_attr($quadro_options['blog_layout']) == 'masonry' ) $content_template = '';
					else $content_template = esc_attr($quadro_options['blog_layout']);
					get_template_part( 'content', $content_template );
					?>

				<?php endwhile; ?>

			</div>
				
			<?php quadro_paging_nav( '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php else : ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php get_template_part( 'content', 'none' ); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
