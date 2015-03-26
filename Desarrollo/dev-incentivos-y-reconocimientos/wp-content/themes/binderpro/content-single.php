<?php
/**
 * @package quadro
 */
?>

<?php $post_id = get_the_ID();
// Apply function for icon color
quadro_icon_styles( $post_id ); 
$post_format = get_post_format(); 
// Retrieve Theme Options
global $quadro_options; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header clear">
		
		<?php qi_before_post_title(); ?>

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php qi_after_post_title(); ?>

		<div class="entry-meta clear">
			
			<span class="post-icon"></span>
			<?php quadro_posted_on( 'M j, Y' ); ?>
			<?php quadro_posted_by_gravatar( $post->post_author, 40 ); ?>

			<?php /* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'quadro' ) );
			if ( $category_list != '' ) {
				if ( quadro_categorized_blog() ) {
					$cats_text = __( '<p class="cat-links">In %1$s.</p>', 'quadro' );
				} // end check for categories on this blog 
				printf( $cats_text, $category_list );
			} ?>
		
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() && ! post_password_required() && $post_format != 'video' && $post_format != 'image' && $post_format != 'status' && $post_format != 'aside' ) { ?>
	<div class="entry-thumbnail">
		<?php the_post_thumbnail( 'full-thumb', array('alt' => get_the_title(), 'title' => get_the_title()) ); ?>
	</div>
	<?php } ?>

	<?php if ( $post_format == 'image' ) { ?>
	<div class="entry-thumbnail">
		<?php the_post_thumbnail('full'); ?>
	</div>
	<?php } ?>

	<div class="entry-content">
		<?php qi_before_post(); ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'quadro' ),
				'after'  => '</div>',
			) );
		?>
		<?php qi_after_post(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php
			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'quadro' ) );

			if ( '' != $tag_list ) {
				$meta_text = __( '<p class="single-tags">Tagged %1$s.</p>', 'quadro' );
			} else {
				$meta_text = '';
			}

			printf(
				$meta_text,
				$tag_list,
				get_permalink()
			);
		?>
		
		<?php edit_post_link( __( 'Edit', 'quadro' ), '<span class="edit-link">', '</span>' ); ?>

		<?php if ( $quadro_options['single_author_box'] == 'show' ) quadro_author_box( $post->post_author ); ?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
