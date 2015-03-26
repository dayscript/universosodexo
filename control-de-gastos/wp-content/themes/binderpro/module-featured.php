<?php
/**
 * The template used for displaying Featured Post Modules content
 *
 */
?>

<?php 
$mod_id = get_the_ID();

// Get Featured Post Module Layout Style & Data
$feat_layout 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_featured_style', true ) );
$feat_icon 		= esc_attr( get_post_meta( $mod_id, 'quadro_mod_featured_icon', true ) );
$feat_date 		= esc_attr( get_post_meta( $mod_id, 'quadro_mod_featured_date', true ) );
$feat_cats 		= esc_attr( get_post_meta( $mod_id, 'quadro_mod_featured_cats', true ) );
$picker_method 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_featured_method', true ) );

// Now, let's get the Featured post
$args = array(
	'post_type' => array( 'post' ),
	'posts_per_page' => 1
);

// Modify Query depending on the selected Show Method
if ( $picker_method == 'tax' ) {
	// Bring Selected Categories
	$sel_terms = esc_attr( get_post_meta( $mod_id, 'quadro_mod_featured_terms', true ) );
	if ( $sel_terms != '' ) {
		// Add tax query to query arguments
		$args['cat'] = $sel_terms;
	}
}
elseif ( $picker_method == 'format' ) {
	// Bring selected post formats
	$args = quadro_add_selected_formats( $mod_id, 'quadro_mod_featured_formats', $args );
}
elseif ( $picker_method == 'custom' ) {
	// Bring picked posts if there are some
	$args = quadro_add_selected_posts( $mod_id, 'quadro_mod_pick_featured', $args );
}

$featured_post = new WP_Query( $args );
?>

<section id="post-<?php the_ID(); ?>" class="quadro-mod type-featured <?php quadro_mod_parallax($mod_id); ?>">
	
	<?php // Apply function for inline styles
	quadro_mod_styles( $mod_id ); ?>

	<div class="inner-mod">

		<?php quadro_mod_title( $mod_id ); ?>

		<?php if( $featured_post->have_posts() ) : while( $featured_post->have_posts() ) : $featured_post->the_post(); ?>

			<?php $post_id = get_the_ID();
			// Apply function for inline styles
			quadro_post_styles( $post_id ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('featured-item clear feat-' . $feat_layout); ?>>

				<?php // Prepare thumbnail to function as background
				$back_img = '';
				$post_format = get_post_format();
				if ( $post_format != 'video' && $post_format != 'gallery' ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
					$back_img = 'style="background-image: url(\'' . $image[0] . '\');"';
				} ?>

				<div class="feat-post-img" <?php echo $back_img; ?>>
					<?php // Loop through post formats possibilities
					switch ( $post_format ) {
						
						case 'video':
							$media_return = quadro_print_media(get_the_content(), array('video', 'iframe', 'embed'), 1, '', '');
							echo $media_return['media'];	
							break;

						case 'audio':
							$media_return = quadro_print_media(get_the_content(), array('audio', 'iframe', 'embed'), 1, '', '');
							echo $media_return['media'];	
							break;

						case 'gallery':
							if ( get_post_gallery() ) {
								// Remove Galleries from content
								$content = quadro_strip_shortcode_gallery( get_the_content() );
								// Filter through the_content filter
								$content = apply_filters( 'the_content', $content );
								$content = str_replace( ']]>', ']]&gt;', $content );
								echo '<div class="entry-gallery">';
								echo '<ul class="slides">';
								$gallery = get_post_gallery( get_the_ID(), false );
								/* Loop through all images and output them one by one */
								$gallery_ids = explode(',', $gallery['ids']);
								foreach( $gallery_ids as $pic_id ) {
									echo '<li class="gallery-item">';
									echo wp_get_attachment_image( $pic_id, 'large' );
									echo ( get_post($pic_id) && get_post($pic_id)->post_excerpt != '' ) ? '<p class="gallery-caption">' . get_post($pic_id)->post_excerpt . '</p>' : '';
									echo '</li>';
								}
								echo '</ul></div>';
							}
							break;

					} ?>
				</div>
				
				<div class="feat-item-content">
					<?php if ( $feat_icon == 'show' ) echo '<span class="post-icon"></span>';?>
					<?php if ( $feat_date == 'show' ) quadro_posted_on( 'M j, Y' ); ?>
					<h1 class="feat-item-title">
						<a href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h1>
					<?php if ( $feat_cats == 'show' ) { ?>
						<?php $categories_list = get_the_category_list( __( ', ', 'quadro' ) );
						if ( $categories_list && quadro_categorized_blog() ) : ?>
							<span class="cat-links">
								<?php echo $categories_list; ?>
							</span>
						<?php endif; // End if categories ?>
					<?php } ?>
					<div class="feat-item-text">
						<?php // Display the content according to what we did before with it.
						if ( $post_format == 'video' || $post_format == 'audio' ) echo quadro_excerpt($media_return['content'], 40, '<span class="read-more">' . __('Leer más', 'quadro') . '</span>');
						elseif ( $post_format == 'gallery' ) echo quadro_excerpt($content, 40, '<span class="read-more">' . __('Leer más', 'quadro') . '</span>');
						elseif ( $post_format == 'quote' ) {
							echo quadro_just_quote(get_the_content(), '', '');
							echo '<a href="' . get_the_permalink() . '" class="readmore-link"><span class="read-more">' . __('Leer más', 'quadro') . '</span></a>';
						}
						else quadro_excerpt(get_the_excerpt(), 40, '<span class="read-more">' . __('Lee más', 'quadro') . '</span>');
						?>
					</div>
				</div>
			
			</article>

		<?php endwhile; endif; // ends Featured loop ?>
		<?php wp_reset_postdata(); ?>

	</div>

</section>