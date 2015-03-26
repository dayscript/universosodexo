<?php
/**
 * The template used for displaying Slogan Modules content
 *
 */
?>

<?php 
$mod_id = get_the_ID();

// Get Slogan Module data
$action_text = esc_attr( get_post_meta( $mod_id, 'quadro_mod_slogan_action_text', true ) );
$action_link = esc_attr( get_post_meta( $mod_id, 'quadro_mod_slogan_action_link', true ) );
$action_color = esc_attr( get_post_meta( $mod_id, 'quadro_mod_slogan_action_color', true ) );
?>

<section id="post-<?php the_ID(); ?>" class="quadro-mod type-slogan <?php quadro_mod_parallax($mod_id); ?>">

	<?php // Apply function for inline styles
	quadro_mod_styles( $mod_id ); ?>

	<div class="inner-mod">

		<?php quadro_mod_title( $mod_id ); ?>

		<?php the_content(); ?>

		<?php if ( $action_text != '' ) { ?>
			<a href="<?php echo $action_link; ?>" title="<?php echo $action_text; ?>" style="color: <?php echo $action_color; ?>" class="slogan-call-to-action qbtn"><?php echo $action_text; ?></a>
		<?php } ?>

	</div>

</section><!-- .module -->
