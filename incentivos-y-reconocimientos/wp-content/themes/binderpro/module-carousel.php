<?php
/**
 * The template used for displaying Carousel Modules content
 *
 */
?>

<?php 
$mod_id = get_the_ID();

// Get Carousel Module Data
$mod_margins 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_carousel_margins', true ) );
$picker_method 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_carousel_method', true ) );
$items_perpage 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_carousel_pper', true ) );
$items_perpage 	= $items_perpage != '' ? $items_perpage : -1;


// Now, let's get all the carousel posts
$args = array(
	'post_type' => array( 'post', 'product' ),
	'posts_per_page' => $items_perpage
);

// Modify Query depending on the selected Show Method
if ( $picker_method == 'tax' ) {
	// Bring Selected Categories
	$sel_terms = esc_attr( get_post_meta( $mod_id, 'quadro_mod_carousel_terms', true ) );
	if ( $sel_terms != '' ) {
		// Add tax query to query arguments
		$args['cat'] = $sel_terms;
	}
}
elseif ( $picker_method == 'format' ) {
	// Bring selected post formats
	$args = quadro_add_selected_formats( $mod_id, 'quadro_mod_carousel_formats', $args );
}
elseif ( $picker_method == 'custom' ) {
	// Bring picked posts if there are some
	$args = quadro_add_selected_posts( $mod_id, 'quadro_mod_pick_carousel', $args );
}

$home_carousel = new WP_Query( $args );
?>

<section id="post-<?php the_ID(); ?>" class="quadro-mod type-carousel <?php quadro_mod_parallax($mod_id); ?> <?php echo $mod_margins; ?>">
	
	<?php // Apply function for inline styles
	quadro_mod_styles( $mod_id ); ?>

	<div class="inner-mod">	

		<?php quadro_mod_title( $mod_id ); ?>
		<?php quadro_module_content(); ?>

		<div class="carousel-wrapper">

			<ul class="carousel slides clear">

				<?php if( $home_carousel->have_posts() ) : while( $home_carousel->have_posts() ) : $home_carousel->the_post(); ?>

					<?php $post_id = get_the_ID(); ?>

					<li id="carousel-post-<?php the_ID(); ?>" class="carousel-item">

						<?php // Get post data
						$post_format = get_post_format($post_id);
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'med-thumb' );
						$back_img = 'style="background-image: url(\'' . $image[0] . '\');"';
						$post_background = esc_attr( get_post_meta( get_the_ID(), 'quadro_post_blog_back', true ) );
						// Prevent complete black from messing with brightness meassurement
						$post_background = $post_background == '#000' || $post_background == '#000000' ? $post_background = '#010101' : $post_background;
						
						// Defining default light and dark body colors for blog posts
						$body_light = '#ffffff';
						$body_dark = '#000000';

						if ( $post_background != '#' && $post_background != '' ) {
							$post_color = quadro_get_brightness($post_background) > 130 || quadro_get_brightness($post_background) == '' ? $body_dark : $body_light;
							$this_css = '#carousel-post-' . $post_id . ' article { background-color: ' . $post_background . ';	color: ' . $post_color . '; }';
							$this_css .= '#carousel-post-' . $post_id . ' h1 a, #carousel-post-' . $post_id . ' a, #carousel-post-' . $post_id . ' .cat-links { color: ' . $post_color . '; }';
							$this_css .= '#carousel-post-' . $post_id . ' .posted-on a { color: ' . $post_color . '; }';
							echo '<style scoped>' . $this_css . '</style>';
						}	
						?>

						<article <?php post_class(); ?>>

							<div class="carousel-back-img lazy" data-original="<?php echo $image[0]; ?>" <?php echo $back_img; ?>></div>
							
							<div class="carousel-content">

								<a href="<?php the_permalink(); ?>" class="icon-link" rel="bookmark"><span class="post-icon"></span></a>

								<?php quadro_posted_on( 'M j, Y' ); ?>

								<?php if ( $post_format != 'aside' && $post_format != 'status' && $post_format != 'quote' ) { ?>
								<h1 class="entry-title">
									<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h1>
								<?php } 
								elseif ( $post_format == 'quote' ) {
									if ( get_the_title() != '' ) { ?>
										<h1 class="entry-title">
											<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
										</h1>
									<?php } else {
										echo '<div class="entry-summary">';
										echo quadro_excerpt(get_the_excerpt(), 15, '');
										echo '</div>';	
									}
								} elseif ( $post_format == 'aside' || $post_format == 'status' ) {
									echo '<div class="entry-summary">';
									echo quadro_excerpt(get_the_excerpt(), 15, '');
									echo '</div>';
								} ?>

								<?php $categories_list = get_the_category_list( __( ', ', 'quadro' ) );
								if ( $categories_list && quadro_categorized_blog() ) : ?>
									<span class="cat-links">
										<?php echo $categories_list; ?>
									</span>
								<?php endif; // End if categories ?>

								<a href="<?php the_permalink(); ?>" class="readmore-link"><span class="read-more"><?php echo __('Leer más', 'quadro'); ?></span></a>

							</div>

						</article>
					
					</li>

				<?php endwhile; endif; // ends Carousel loop ?>
				<?php wp_reset_postdata(); ?>

			</ul>

		</div>

	</div>

</section>