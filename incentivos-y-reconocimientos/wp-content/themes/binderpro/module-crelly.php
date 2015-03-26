<?php
/**
 * The template used for displaying Crelly Slider Modules content
 *
 */
?>

<?php 
$mod_id = get_the_ID();

// Get Crelly Slider Shortcode
$slider_shortcode = get_post_meta( $mod_id, 'quadro_mod_crelly_shortcode', true );
?>

<section id="post-<?php the_ID(); ?>" class="quadro-mod type-crelly-slider no-margins <?php quadro_mod_parallax($mod_id); ?>">

	<?php // Apply function for inline styles
	quadro_mod_styles( $mod_id ); ?>

	<div class="inner-mod">

		<?php quadro_mod_title( $mod_id ); ?>
		<?php echo do_shortcode( $slider_shortcode ); ?>

	</div>

</section><!-- .module -->
