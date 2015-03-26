<?php
/**
 * The template for displaying Archive pages.
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
					<h1 class="archive-title">
						<?php
							if ( is_category() ) :
								single_cat_title();

							elseif ( is_tag() ) :
								single_tag_title();

							elseif ( is_author() ) :
								printf( __( 'Posts by: %s', 'quadro' ), '<span class="vcard">' . get_the_author() . '</span>' );

							elseif ( is_day() ) :
								printf( __( 'Day: %s', 'quadro' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Month: %s', 'quadro' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'quadro' ) ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Year: %s', 'quadro' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'quadro' ) ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'quadro' );

							elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
								_e( 'Galleries', 'quadro');

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'quadro');

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'quadro' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'quadro' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'quadro' );

							elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
								_e( 'Statuses', 'quadro' );

							elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
								_e( 'Audios', 'quadro' );

							elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
								_e( 'Chats', 'quadro' );

							else :
								_e( 'Archives', 'quadro' );

							endif;
						?>
					</h1>
					<?php
						if ( is_author() ) {
							quadro_author_box( get_query_var( 'author' ) );
						}
						else {
							// Show an optional term description.
							$term_description = term_description();
							if ( ! empty( $term_description ) ) :
								printf( '<div class="taxonomy-description">%s</div>', $term_description );
							endif;
						}
					?>
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

	<div id="primary" class="content-area <?php echo $sidebar; ?>">
		<main id="main" class="site-main" role="main">
			<?php get_template_part( 'content', 'none' ); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
