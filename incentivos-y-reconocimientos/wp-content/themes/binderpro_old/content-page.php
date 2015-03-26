<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package quadro
 */
?>

<?php 
// Get Page metadata
$page_id = get_the_ID();
$use_tagline 	= esc_attr( get_post_meta( $page_id, 'quadro_page_show_tagline', true ) );
$page_tagline 	= esc_attr( get_post_meta( $page_id, 'quadro_page_tagline', true ) );
$back_color     = esc_attr( get_post_meta( $page_id, 'quadro_page_header_back_color', true ) );
$header_style 	= ( $back_color != '#' && $back_color != '' ) ? 'colored-header' : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header <?php echo $header_style; ?>">
		<div class="page-inner-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
			<?php if ( $use_tagline == 'true' ) { ?>
			<h2 class="page-tagline"><?php echo $page_tagline; ?></h2>
			<?php } ?>
			<?php bop_breadcrumbs(); ?>
		</div>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'quadro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .page-content -->
	<?php edit_post_link( __( 'Edit', 'quadro' ), '<footer class="page-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
