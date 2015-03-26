<?php
/**
 * The template used for displaying Magazine Modules content
 *
 */
?>

<?php 
$mod_id = get_the_ID();

// Get Module Data
$columns	 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_magazine_columns', true ) );
$chosen_perpage	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_magazine_perpage', true ) );
$excerpt	 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_magazine_excerpt', true ) );
$nothumb	 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_magazine_nothumb', true ) );
$layout		 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_magazine_layout', true ) );
$picker_method 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_magazine_method', true ) );
// Determine amount of posts to bring based on layout
if ( $layout == 'layout1' ) $items_perpage = 4;
elseif ( $layout == 'layout2' && $columns == 'two' ) $items_perpage = 6;
elseif ( $layout == 'layout2' && $columns == 'three' ) $items_perpage = 9;
elseif ( $layout == 'layout3' ) $items_perpage = 3;
elseif ( $layout == 'layout4' ) $items_perpage = $chosen_perpage;
// Set counter
$i = 1;


// Now, let's get all the magazine posts
$args = array(
	'post_type' => array( 'post' ),
);

// Modify Query depending on the selected Show Method
if ( $picker_method == 'tax' ) {
	// Bring Selected Categories
	$sel_terms = esc_attr( get_post_meta( $mod_id, 'quadro_mod_magazine_terms', true ) );
	if ( $sel_terms != '' ) {
		// Add tax query to query arguments
		$args['cat'] = $sel_terms;
	}
}
elseif ( $picker_method == 'format' ) {
	// Bring selected post formats
	$args = quadro_add_selected_formats( $mod_id, 'quadro_mod_magazine_formats', $args );
}
elseif ( $picker_method == 'custom' ) {
	// Bring picked posts if there are some
	$args = quadro_add_selected_posts( $mod_id, 'quadro_mod_pick_magazine', $args );
}

$magazine_posts = new WP_Query( $args );
?>

<section id="post-<?php the_ID(); ?>" class="quadro-mod type-magazine magazine-<?php echo $layout; ?> mag-columns-<?php echo $columns; ?> <?php quadro_mod_parallax($mod_id); ?>">
	
	<?php // Apply function for inline styles
	quadro_mod_styles( $mod_id ); ?>

	<div class="inner-mod">

		<?php quadro_mod_title( $mod_id ); ?>
		<?php quadro_module_content(); ?>

			<ul class="clear">

				<?php if( $magazine_posts->have_posts() ) : while( $magazine_posts->have_posts() ) : $magazine_posts->the_post(); ?>

					<?php $post_id = get_the_ID(); ?>
					
					<li id="magazine-post-<?php the_ID(); ?>" <?php post_class('magazine-item magazine-item' . $i); ?>>

						<?php // Get post data
						$post_format = get_post_format($post_id);

						// Exclude no Thumbnail Posts if Asked for
						if ( !has_post_thumbnail() && ($nothumb == 'true' && $post_format != 'video') ) continue;

						$post_background = esc_attr( get_post_meta( $post_id, 'quadro_post_blog_back', true ) );
						// Prevent complete black from messing with brightness meassurement
						$post_background = $post_background == '#000' || $post_background == '#000000' ? $post_background = '#010101' : $post_background;

						// Defining default light and dark body colors for blog posts
						$body_light = '#ffffff';
						$body_dark = '#000000';

						if ( $post_background != '#' && $post_background != '' ) {
							$post_color = quadro_get_brightness($post_background) > 130 || quadro_get_brightness($post_background) == '' ? $body_dark : $body_light;
							$this_css = '#magazine-post-' . $post_id . ' .post-icon:before { color: ' . $post_color . '; }';
							$this_css .= '#magazine-post-' . $post_id . ' .post-icon { background: ' . $post_background . '; }';
							echo '<style scoped>' . $this_css . '</style>';
						}	
						?>

						<article class="clear">

							<?php // Defining Thumb Sizes
							if ( $layout == 'layout4' || ($layout == 'layout1' && $i == 1) ) $thumb_size = 'med-thumb';
							elseif ( $layout == 'layout2' && $columns == 'two' && ($i == 1 || $i == 2) ) $thumb_size = 'med-thumb';
							elseif ( $layout == 'layout2' && $columns == 'three' && ($i == 1 || $i == 2 || $i == 3) ) $thumb_size = 'med-thumb';
							elseif ( $layout == 'layout3' && $i == 1 ) $thumb_size = 'full';
							elseif ( $layout == 'layout3' && ($i == 2 || $i == 3) ) $thumb_size = 'med-thumb';
							else $thumb_size = 'small-thumb';
							?>

							<div class="entry-thumbnail">
								<?php if ( $post_format != 'video' ) { ?>
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $thumb_size );
									$back_img = 'style="background-image: url(\'' . $image[0] . '\');"'; ?>
									<a href="<?php the_permalink(); ?>" rel="bookmark" class="lazy" data-original="<?php echo $image[0]; ?>" <?php echo $back_img; ?>>
										<span class="post-icon"></span>
									</a>
								<?php } else {
									$image = quadro_video_screenshot_url( get_the_content() );
									$back_img = 'style="background-image: url(\'' . $image . '\');"';
									// quadro_video_screenshot( get_the_content(), get_the_permalink(), get_the_title() ); ?>
									<a href="<?php the_permalink(); ?>" rel="bookmark" class="lazy" data-original="<?php echo $image[0]; ?>" <?php echo $back_img; ?>>
										<span class="post-icon"></span>
									</a>
								<?php } ?>

								<?php if ( $layout == 'layout4' ) { ?>
									<?php $categories_list = get_the_category_list( __( ', ', 'quadro' ) );
									if ( $categories_list && quadro_categorized_blog() ) : ?>
										<span class="cat-links">
											<?php echo $categories_list; ?>
										</span>
									<?php endif; // End if categories ?>
								<?php } ?>
							</div>

							<div class="magazine-content">

								<?php if ( $post_format != 'aside' && $post_format != 'status' && $post_format != 'quote' ) { ?>

									<h1 class="entry-title">
										<a href="<?php the_permalink(); ?>" rel="bookmark">
											<?php the_title(); ?>
										</a>
									</h1>

									<?php quadro_posted_on(); ?>
								
								<?php } ?>

								<?php // Set content differentially for First and subsequent posts depending on the selected layout
								if ( (($layout == 'layout1' || $layout == 'layout3') && $i == 1) || ($layout == 'layout2' && ($i == 1 || $i == 2)) || ($layout == 'layout2' && $columns == 'three' && $i == 3) || ($layout == 'layout4' && $excerpt == 'show') || ($post_format == 'aside' || $post_format == 'status' || $post_format == 'quote') ) { ?>
									<div class="entry-summary">
										<?php echo quadro_excerpt(get_the_excerpt(), 15, ''); ?>
									</div><!-- .entry-summary -->
								<?php } ?>

							</div>

						</article>
					
					</li>

					<?php // Break if reached number of posts
					if ( $i == $items_perpage ) break; ?>

					<?php $i++; ?>

				<?php endwhile; endif; // ends magazine loop ?>
				<?php wp_reset_postdata(); ?>

			</ul>

	</div>

</section>