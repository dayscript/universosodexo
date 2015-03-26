<?php
/**
 * @package quadro
 */
?>

<?php // Retrieve Theme Options
global $quadro_options; ?>

<?php $post_id = get_the_ID();
// Apply function for inline styles
quadro_post_styles( $post_id ); ?>

<?php
$post_format = get_post_format();
$post_type = get_post_type();
?>

<?php // Enabling the "more tag"
global $more;
$more = 0;
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item size-item'); ?>>
	
	<?php // Declare global $more (before the loop) to allow <!--more--> tag
	global $more; $more = 0; ?>

	<header class="entry-header">

		<?php $back_img = '';
		switch ( $post_format ) {
			
			// Prepare thumbnails to function as background
			
			case 'video':
				// if post thumbnail, bring it
				if ( has_post_thumbnail() && ! post_password_required() ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'med-thumb' );
					$back_img = 'style="background-image: url(\'' . $image[0] . '\');"';
				} else {
					// there's no thumbnail, try to bring a video screenshot
					$image = quadro_video_screenshot_url( get_the_content() );
					$back_img = 'style="background-image: url(\'' . $image . '\');"';
				}
				break;

			case 'status':
				break;

			case 'aside':
				break;

			case 'gallery':
				if ( !has_post_thumbnail() && ! post_password_required() ) {
					$gallery = get_post_gallery( get_the_ID(), false );
					if ( isset($gallery['ids']) ) {
						$gallery_ids = explode(',', $gallery['ids']);
						$image = wp_get_attachment_image_src( $gallery_ids[0], 'med-thumb' );
					}
					$back_img = 'style="background-image: url(\'' . $image[0] . '\');"';
				}
				else if ( has_post_thumbnail() && ! post_password_required() ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'med-thumb' );
					$back_img = 'style="background-image: url(\'' . $image[0] . '\');"';
				}
		
			default:
				if ( has_post_thumbnail() && ! post_password_required() ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'med-thumb' );
					$back_img = 'style="background-image: url(\'' . $image[0] . '\');"';
				}

		}?>

		<div class="entry-thumbnail" <?php echo $back_img; ?>>
		
			<?php if ( 'post' == $post_type ) { ?>
			<a href="<?php the_permalink(); ?>" class="icon-link" rel="bookmark"><span class="post-icon"></span></a>
			<?php } ?>

		</div><!-- .entry-thumbnail -->

		<?php if ( 'post' == $post_type ) {
			// Print date meta
			quadro_posted_on( 'M j, Y' );
		} ?>

		<?php if ( $post_format != 'aside' && $post_format != 'status' && $post_format != 'quote' ) { ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php } ?>

		<?php if ( 'post' == $post_type && ( $post_format != 'aside' && $post_format != 'status' && $post_format != 'quote' && $post_format != 'image' && $post_format != 'link' ) ) { 
		// Hide category and tag text for pages on Search ?>
			<?php $categories_list = get_the_category_list( __( ', ', 'quadro' ) );
			if ( $categories_list && quadro_categorized_blog() ) : ?>
				<span class="cat-links">
					<?php echo $categories_list; ?>
				</span>
			<?php endif; // End if categories ?>
		<?php } ?>

	</header><!-- .entry-header -->


	<?php // We show here the excerpt, but not for these formats
 	if ( $post_format == '' || $post_format == 'gallery' ) { ?>
		<div class="entry-summary">
			<?php echo quadro_excerpt(get_the_excerpt(), 30, '<span class="read-more">' . __('Read more', 'quadro') . '</span>'); ?>
		</div><!-- .entry-summary -->
	<?php } else {
		if ( $post_format == 'quote' ) {
			echo '<div class="entry-summary">';
			echo quadro_just_quote(get_the_content(), '', '');
			echo '<a href="' . get_the_permalink() . '" class="readmore-link"><span class="read-more">' . __('Read more', 'quadro') . '</span></a>';
			echo '</div>';
		} elseif ( $post_format == 'link' && is_array($the_link = quadro_getUrls(get_the_content())) && isset($the_link[0]) ) {
			// $the_link = quadro_getUrls(get_the_content())[0];
			$the_link = $the_link[0];
			$the_link_parsed = parse_url($the_link);
			echo '<div class="entry-summary">';
			echo '<p class="the-link-url"><a href="' . $the_link . '" title="' . $the_link . '">' . $the_link_parsed['host'] . '</a></p>';
			echo '</div>';
		} elseif ( $post_format == 'audio' || $post_format == 'video' ) {
			echo '<div class="entry-summary">';
			echo quadro_excerpt(get_the_excerpt(), 30, '<span class="read-more">' . __('Read more', 'quadro') . '</span>');
			echo '</div>';
		} elseif ( $post_format == 'aside' || $post_format == 'status' ) {
			// Bring the full content for the other formats (aside & status between others)
			echo '<div class="entry-summary">';
			the_content( '<span class="read-more">' . __('Read more', 'quadro') . '</span>' );
			echo '</div>';
		} else { ?>
			<div class="entry-summary">
			<?php echo quadro_excerpt(get_the_excerpt(), 30, '<span class="read-more">' . __('Read more', 'quadro') . '</span>'); ?>
			</div><!-- .entry-summary -->
		<?php }
	} ?>

</article><!-- #post-## -->
