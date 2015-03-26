<?php
/**
 * The template used for displaying Slider Modules content
 *
 */
?>

<?php
$mod_id = get_the_ID();

// Get Slider Module Data
$mod_margins 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_slider_margins', true ) );
$caption_style 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_slider_caption_style', true ) );
$caption_pos 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_slider_caption_pos', true ) );
$slider_time 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_slider_time', true ) );
$slider_color 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_slider_color', true ) );
$slider_icon 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_slider_icon', true ) );
$slider_date 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_slider_date', true ) );
$slider_cats 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_slider_cats', true ) );
$picker_method 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_slider_method', true ) );
$items_perpage 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_slider_pper', true ) );
$items_perpage 	= $items_perpage != '' ? $items_perpage : 3;
$slider_time 	= $slider_time != '' ? $slider_time : 4000;
$i = 1;

// Now, let's get all the slider posts
$args = array(
	'post_type' => array( 'post' ),
	'posts_per_page' => $items_perpage
);

// Modify Query depending on the selected Show Method
if ( $picker_method == 'tax' ) {
	// Bring Selected Categories
	$sel_terms = esc_attr( get_post_meta( $mod_id, 'quadro_mod_slider_terms', true ) );
	if ( $sel_terms != '' ) {
		// Add tax query to query arguments
		$args['cat'] = $sel_terms;
	}
}
elseif ( $picker_method == 'format' ) {
	// Bring selected post formats
	$args = quadro_add_selected_formats( $mod_id, 'quadro_mod_slider_formats', $args );
}
elseif ( $picker_method == 'custom' ) {
	// Bring picked posts if there are some
	$args = quadro_add_selected_posts( $mod_id, 'quadro_mod_pick_slider', $args );
}

$quadro_slides = new WP_Query( $args );
?>

<section id="post-<?php the_ID(); ?>" class="quadro-mod caption-<?php echo $caption_style; ?> caption-<?php echo $caption_pos; ?> type-slider clear <?php quadro_mod_parallax($mod_id); ?> <?php echo $mod_margins; ?>">

	<?php // Apply function for inline styles
	quadro_mod_styles( $mod_id ); ?>

	<div class="inner-mod">

		<?php quadro_mod_title( $mod_id ); ?>
		<?php quadro_module_content(); ?>

		<div id="quadro-slider" class="quadro-slider-el">

			<input type="hidden" class="slider-time" value="<?php echo $slider_time; ?>">

			<ul class="quadro-slides slides">
				
				<?php if( $quadro_slides->have_posts() ) : while( $quadro_slides->have_posts() ) : $quadro_slides->the_post(); ?>

					<?php // Skip this post if has no thumbnail
					if ( ! has_post_thumbnail() ) continue; ?>

					<?php 
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					$back_img = 'style="background-image: url(\'' . $thumb[0] . '\');"'; 
					?>

					<li <?php post_class('quadro-slide lazy'); ?> data-original="<?php echo $thumb[0]; ?>" <?php echo $back_img; ?>>

						<?php
						$post_background = ($slider_color == '' || $slider_color == '#') ? esc_attr( get_post_meta( get_the_ID(), 'quadro_post_blog_back', true ) ) : $slider_color;
						$caption_css = '';
						// Build CSS for the caption
						if ( $post_background != '#' && $post_background != '' ) {
							// Prevent complete black from messing with brightness meassurement
							$post_background = $post_background == '#000' || $post_background == '#000000' ? $post_background = '#010101' : $post_background;
							$post_color = quadro_get_brightness($post_background) > 130 || quadro_get_brightness($post_background) == '' ? '#000000' : '#ffffff';
							
							// Only for Caption type1
							if ( $caption_style == 'type1' ) {
								
								$back_rgba = quadro_toRGB( $post_background, 1 );
								$back_rgba_0 = quadro_toRGB( $post_background, 0 );

								// Set gradient for left sided or alternated in odd position
								if ( $caption_pos == 'left' || ($caption_pos == 'alternated' && ($i & 1)) ) {
									$left = 'left';
									$right = 'right';
								}
								// Set gradient for right sided or alternated in even position
								else {
									$left = 'right';
									$right = 'left';	
								}

								$caption_css .= 'style="background: ' . $back_rgba . ';';
								$caption_css .= 'background: -moz-linear-gradient(' . $left . ', ' . $back_rgba . ' 50%, ' . $back_rgba_0 . ' 100%);';
								$caption_css .= 'background: -webkit-gradient(' . $left . ' top, ' . $right . ' top, color-stop(50%, ' . $back_rgba . '), color-stop(100%, ' . $back_rgba_0 . '));';
								$caption_css .= 'background: -webkit-linear-gradient(' . $left . ', ' . $back_rgba . ' 50%, ' . $back_rgba_0 . ' 100%);';
								$caption_css .= 'background: -o-linear-gradient(' . $left . ', ' . $back_rgba . ' 50%, ' . $back_rgba_0 . ' 100%);';
								$caption_css .= 'background: -ms-linear-gradient(' . $left . ', ' . $back_rgba . ' 50%, ' . $back_rgba_0 . ' 100%);';
								$caption_css .= 'background: linear-gradient(to ' . $right . ', ' . $back_rgba . ' 50%, ' . $back_rgba_0 . ' 100%);"';
								// $caption_css .= 'filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="' . $post_background . '", endColorstr="' . $post_background . '", GradientType=1 );"';
							}
							else {
								echo '<style scoped>.quadro-slide.post-' . $post->ID . ' .posted-on, .quadro-slide.post-' . $post->ID . ' .slider-caption-link, .quadro-slide.post-' . $post->ID . ' .cat-links { background: ' . $post_background . '; }</style>';
							}
							
							echo '<style scoped>.quadro-slide.post-' . $post->ID . ' .post-icon:before, .quadro-slide.post-' . $post->ID . ' .posted-on, .quadro-slide.post-' . $post->ID . ' .post-icon:before, .quadro-slide.post-' . $post->ID . ' .posted-on a, .quadro-slide.post-' . $post->ID . ' .slider-caption-link, .quadro-slide.post-' . $post->ID . ' .cat-links, .quadro-slide.post-' . $post->ID . ' .cat-links a, .quadro-slide.post-' . $post->ID . ' .caption-text, .quadro-slide.post-' . $post->ID . ' .readmore-link { color: ' . $post_color . '; }</style>';
						}
						?>

						<div class="slide-caption" <?php echo $caption_css; ?>>
								
							<?php if ( $slider_icon == 'show' && $caption_style == 'type1' ) {
								echo '<a href="' . get_permalink() . '" class="slider-caption-link" title="' . get_the_title() . '">';
								echo '<span class="post-icon"></span>';
								echo '</a>';
							} ?>

							<?php if ( $slider_date == 'show' ) quadro_posted_on( 'M j, Y' ); ?>
								
							<a href="<?php the_permalink(); ?>" class="slider-caption-link" title="<?php echo get_the_title(); ?>">
								<h3><?php the_title(); ?></h3>
							</a>
								
							<?php if ( $slider_cats == 'show' ) { ?>
								<?php $categories_list = get_the_category_list( __( ', ', 'quadro' ) );
								if ( $categories_list && quadro_categorized_blog() ) : ?>
									<span class="cat-links">
										<?php echo $categories_list; ?>
									</span>
								<?php endif; // End if categories ?>
							<?php } ?>
							
							
							<?php if ( $caption_style == 'type1' ) { ?>
								<div class="caption-text">
									<?php quadro_excerpt(get_the_excerpt(), 20, '<span class="read-more">' . __('Read more', 'quadro') . '</span>'); ?>
								</div>
							<?php } ?>

						</div>

					</li>

					<?php // Increase counter
					$i++; ?>

				<?php endwhile; endif; // ends 'quadro_slides' loop ?>
				<?php wp_reset_postdata(); ?>

			</ul>

		</div>

		<div id="slider-nav" class="slider-nav">
			<ul class="slides">
				<?php if( $quadro_slides->have_posts() ) : while( $quadro_slides->have_posts() ) : $quadro_slides->the_post(); ?>
				<?php // Skip this post if has no thumbnail
				if ( ! has_post_thumbnail() ) continue; ?>
				<li class="slider-nav-item">
					<?php the_post_thumbnail( 'small-thumb', array('alt' => '' . get_the_title() . '', 'title' => '') ); ?>
				</li>
				<?php endwhile; endif; // ends 'quadro_slides' loop ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		</div>

	</div>

</section>
