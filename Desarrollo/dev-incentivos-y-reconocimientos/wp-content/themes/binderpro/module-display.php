<?php
/**
 * The template used for displaying Display Modules content
 *
 */
?>

<?php 
$mod_id = get_the_ID();

// Get Display Module Data
$layout		 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_display_layout', true ) );
$mod_margins 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_display_margins', true ) );
$picker_method 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_display_method', true ) );
// Determine amount of posts to bring based on layout
if ( $layout == 'layout1' || $layout == 'layout4' ) $items_perpage = 4;
elseif ( $layout == 'layout2' ) $items_perpage = 5;
elseif ( $layout == 'layout3' ) $items_perpage = 3;
elseif ( $layout == 'layout5' ) $items_perpage = 6;
// Set counter
$i = 1;


// Now, let's get all the display posts
$args = array(
	'post_type' => array( 'post' ),
	'posts_per_page' => $items_perpage
);

// Modify Query depending on the selected Show Method
if ( $picker_method == 'tax' ) {
	// Bring Selected Categories
	$sel_terms = esc_attr( get_post_meta( $mod_id, 'quadro_mod_display_terms', true ) );
	if ( $sel_terms != '' ) {
		// Add tax query to query arguments
		$args['cat'] = $sel_terms;
	}
}
elseif ( $picker_method == 'format' ) {
	// Bring selected post formats
	$args = quadro_add_selected_formats( $mod_id, 'quadro_mod_display_formats', $args );
}
elseif ( $picker_method == 'custom' ) {
	// Bring picked posts if there are some
	$args = quadro_add_selected_posts( $mod_id, 'quadro_mod_pick_display', $args );
}

$display_posts = new WP_Query( $args );
?>

<section id="post-<?php the_ID(); ?>" class="quadro-mod type-display <?php quadro_mod_parallax($mod_id); ?> <?php echo $mod_margins; ?>">
	
	<?php // Apply function for inline styles
	quadro_mod_styles( $mod_id ); ?>

	<div class="inner-mod">	

		<?php quadro_mod_title( $mod_id ); ?>
		<?php quadro_module_content(); ?>

		<div class="display-wrapper display-<?php echo $layout; ?>">

			<ul class="clear">

				<?php if( $display_posts->have_posts() ) : while( $display_posts->have_posts() ) : $display_posts->the_post(); ?>

					<?php $post_id = get_the_ID(); ?>

					<li id="display-post-<?php the_ID(); ?>" <?php post_class('display-item display-item' . $i); ?>>
					
						<?php // Defining Thumb Sizes
						if ( ($layout == 'layout1' || $layout == 'layout3') && $i == 1 ) $thumb_size = 'large';
						else $thumb_size = 'med-thumb';
						?>

						<?php // Get post data
						$post_format = get_post_format($post_id);
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $thumb_size );
						$back_img = 'style="background-image: url(\'' . $image[0] . '\');"';
						$post_background = esc_attr( get_post_meta( $post_id, 'quadro_post_blog_back', true ) );
						// Prevent complete black from messing with brightness meassurement
						$post_background = $post_background == '#000' || $post_background == '#000000' ? $post_background = '#010101' : $post_background;
						
						// Defining default light and dark body colors for blog posts
						$body_light = '#ffffff';
						$body_dark = '#000000';

						if ( $post_background != '#' && $post_background != '' ) {
							$post_color = quadro_get_brightness($post_background) > 130 || quadro_get_brightness($post_background) == '' ? $body_dark : $body_light;
							$this_css = '#display-post-' . $post_id . ' .display-content { background-color: ' . $post_background . ';	color: ' . $post_color . '; }';
							$this_css .= '#display-post-' . $post_id . ' h1 a, #display-post-' . $post_id . ' a, #display-post-' . $post_id . ' .cat-links { color: ' . $post_color . '; }';
							$this_css .= '#display-post-' . $post_id . ' .posted-on a, #display-post-' . $post_id . ' .post-icon:before { color: ' . $post_color . '; }';
							$this_css .= '#display-post-' . $post_id . ' .post-icon { background: ' . $post_background . '; }';
							// We add this to prevent same background overlap on icon and post when no thumbnail
							$this_css .= '#display-post-' . $post_id . ':not(.has-post-thumbnail):not(.format-video):not(.format-gallery) .post-icon { background: rgba(0,0,0,0.1); }';
							echo '<style scoped>' . $this_css . '</style>';
						}	
						?>

						<article>

							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<div class="display-back-img lazy" data-original="<?php echo $image[0]; ?>" <?php echo $back_img; ?>></div>
							</a>
							
							<a href="<?php the_permalink(); ?>" rel="bookmark"><span class="post-icon"></span></a>

							<div class="display-content">

								<?php quadro_posted_on( 'M j, Y' ); ?>

								<?php if ( $post_format != 'aside' && $post_format != 'status' && $post_format != 'quote' ) { ?>
								<h1 class="entry-title">
									<a href="<?php the_permalink(); ?>" rel="bookmark">
										<?php the_title(); ?>
									</a>
								</h1>
								<div class="entry-summary">
									<?php echo quadro_excerpt(get_the_excerpt(), 25, '<span class="read-more">' . __('Read more', 'quadro') . '</span>'); ?>
								</div><!-- .entry-summary -->
								<?php } 
								elseif ( $post_format == 'quote' ) {
									if ( get_the_title() != '' ) { ?>
										<h1 class="entry-title">
											<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
										</h1>
									<?php } else {
										echo '<div class="entry-summary">';
										echo '<a href="' . get_the_permalink() . '" rel="bookmark">';
										echo quadro_excerpt(get_the_excerpt(), 15, '');
										echo '</a>';
										echo '</div>';
									}
								} elseif ( $post_format == 'aside' || $post_format == 'status' ) {
									echo '<div class="entry-summary">';
									echo '<a href="' . get_the_permalink() . '" rel="bookmark">';
									echo quadro_excerpt(get_the_excerpt(), 15, '');
									echo '</a>';
									echo '</div>';
								} ?>

							</div>

						</article>
					
					</li>

					<?php $i++; ?>

				<?php endwhile; endif; // ends Display loop ?>
				<?php wp_reset_postdata(); ?>

			</ul>

		</div>

	</div>

</section>