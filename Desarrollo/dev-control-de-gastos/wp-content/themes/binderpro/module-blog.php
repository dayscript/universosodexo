<?php
/**
 * The template used for displaying Blog Modules content
 *
 */
?>

<?php 
$mod_id = get_the_ID();

// Get Blog Module Data
$blog_layout 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_blog_layout', true ) );
$blog_columns 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_blog_columns', true ) );
$blog_margins 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_blog_margins', true ) );
$blog_anim 		= esc_attr( get_post_meta( $mod_id, 'quadro_mod_blog_anim', true ) );
$blog_perpage 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_blog_perpage', true ) );
$show_nav 		= esc_attr( get_post_meta( $mod_id, 'quadro_mod_blog_show_nav', true ) );
$picker_method 	= esc_attr( get_post_meta( $mod_id, 'quadro_mod_blog_method', true ) );
$blog_perpage 	= $blog_perpage != '' ? $blog_perpage : get_option( 'posts_per_page' );

// Define Animations
$anim = $blog_layout == 'masonry' ? 'anim-grid' : '';

// Now, let's query for blog posts
global $paged;
$page_var = is_front_page() ? 'page' : 'paged';
$paged = (get_query_var($page_var)) ? get_query_var($page_var) : 1;
$args = array(
	'post_type' =>  'post',
	'posts_per_page' => $blog_perpage,
	'paged' => $paged,
 );

// Modify Query depending on the selected Show Method
if ( $picker_method == 'tax' ) {
	// Bring Selected Categories
	$sel_terms = esc_attr( get_post_meta( $mod_id, 'quadro_mod_blog_terms', true ) );
	if ( $sel_terms != '' ) {
		// Add tax query to query arguments
		$args['cat'] = $sel_terms;
	}
}
elseif ( $picker_method == 'format' ) {
	// Bring selected post formats
	$args = quadro_add_selected_formats( $mod_id, 'quadro_mod_blog_formats', $args );
}
elseif ( $picker_method == 'custom' ) {
	// Bring picked posts if there are some
	$args = quadro_add_selected_posts( $mod_id, 'quadro_mod_pick_blog', $args );
}

$wp_query = new WP_Query( $args );
?>

<section id="post-<?php the_ID(); ?>" class="quadro-mod type-blog clear blog-style-<?php echo $blog_layout; ?> masonry-margins-<?php echo $blog_margins; ?> <?php quadro_mod_parallax($mod_id); ?>">
	
	<?php // Apply function for inline styles
	quadro_mod_styles( $mod_id ); ?>
	
	<div class="inner-mod">
	
		<?php quadro_mod_title( $mod_id ); ?>
		<?php quadro_module_content(); ?>

		<?php if( $wp_query->have_posts() ) : ?>

			<div class="blog-wrapper">

				<div id="grid" class="<?php echo $anim; ?> anim-<?php echo $blog_anim; ?> blog-container blog-content blog-<?php echo $blog_layout; ?> blog-columns-<?php echo $blog_columns; ?>">
					
					<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

						<?php // Define template part to be called for posts content
						if ( $blog_layout != 'masonry' ) {
							get_template_part( 'content', $blog_layout );
						}
						else {
							// We call the template part with include to facilitate the use of data.
							include( locate_template('content.php') );
						} ?>

					<?php endwhile; ?>

				</div>
				
				<?php if ( $show_nav == 'show' ) quadro_paging_nav( '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ); ?>

			</div>

		<?php else : ?>

				<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; // ends 'posts' loop ?>
		
		<?php wp_reset_postdata(); ?>

	</div>

</section>