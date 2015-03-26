<?php
/**
 * The template used for displaying Authors Modules content
 *
 */
?>

<?php
$mod_id = get_the_ID();

// Get Authors Module Data
$authors_bio 		= esc_attr( get_post_meta( $mod_id, 'quadro_mod_authors_bio', true ) );
$authors_extras		= esc_attr( get_post_meta( $mod_id, 'quadro_mod_authors_extras', true ) );
$picker_method 		= esc_attr( get_post_meta( $mod_id, 'quadro_mod_authors_method', true ) );

// Let's prepare the arguments
$args = array(
	'fields' => array( 'display_name', 'user_email', 'ID' ),
	'who' => 'authors'
);

// Modify query depending on the selected Show Method
if ( $picker_method == 'custom' ) {
	// Bring picked authors if there are some
	$picked_authors = esc_attr( get_post_meta( $mod_id, 'quadro_mod_pick_authors', true ) );
	// Make array for multiple later use
	global $author_array;
	$author_array = explode( ', ', rtrim($picked_authors, ', ') );
	$args['include'] = $author_array;
}

$authors = get_users( $args );

// Order retrieved Authors if hand picked
if ( $picker_method == 'custom' ) {
	function cmp($a, $b) {
	   global $author_array;

	   $pos1 = array_search( $a->ID, $author_array );
	   $pos2 = array_search( $b->ID, $author_array );

	   if ( $pos1 == $pos2 )
	       return 0;
	   else
	      return ( $pos1 < $pos2 ? -1 : 1 );
	}

	usort( $authors, 'cmp' );
}
?>

<section id="post-<?php the_ID(); ?>" class="quadro-mod type-authors clear <?php quadro_mod_parallax($mod_id); ?>">

	<?php // Apply function for inline styles
	quadro_mod_styles( $mod_id ); ?>

	<div class="inner-mod">

		<?php quadro_mod_title( $mod_id ); ?>
		<?php quadro_module_content(); ?>

		<ul class="authors-list">
			<?php if ( is_array($authors) ) : foreach ( $authors as $author ) : ?>

				<li>
					
					<?php $author_link = get_author_posts_url( $author->ID ); ?>

					<div class="author-name">
						<?php if ( get_avatar( $author->user_email ) ) {
							echo '<a href="' . $author_link . '" title="' . __('Posts by ', 'quadro') . $author->display_name . '">';
							echo get_avatar( $author->user_email, $size='120', '', $author->display_name ) . '</a>'; 
						} ?>
						<h3>
							<a href="<?php echo $author_link; ?>" title="<?php echo __('Posts by ', 'quadro') . $author->display_name; ?>">
								<?php echo $author->display_name; ?>
							</a>
						</h3>
					</div>
					
					<?php if ( $authors_extras == 'show' ) { ?>
						<div class="author-extras">
							<?php 
							if ( get_the_author_meta( 'user_email', $author->ID ) != '' )
								echo '<a class="author-email" href="mailto:' . get_the_author_meta( 'user_email', $author->ID ) . '" title="Email ' . $author->display_name . '"><i class="fa fa-envelope-o"></i></a>';
							$user_url = get_the_author_meta( 'user_url', $author->ID );
							if ( $user_url != '' )
								echo '<a class="author-web" href="' . $user_url . '" title="' . $user_url . '"><i class="fa fa-link"></i></a>';
							$twitter = get_the_author_meta( 'twitter', $author->ID );
							if ( $twitter != '' )
								echo '<a class="author-twitter" href="' . $twitter . '" title="Follow ' . $author->display_name . ' on Twitter"><i class="fa fa-twitter"></i></a>';
							$google = get_the_author_meta( 'google', $author->ID );
							if ( $google != '' )
								echo '<a class="author-googleplus" href="' . $google . '" title="Join ' . $author->display_name . ' on Google Plus"><i class="fa fa-google-plus"></i></a>';
							$facebook = get_the_author_meta( 'facebook', $author->ID );
							if ( $facebook != '' )
								echo '<a class="author-facebook" href="' . $facebook . '" title="Join ' . $author->display_name . ' on Facebook"><i class="fa fa-facebook"></i></a>';
							?>
						</div>
					<?php } ?>

					<?php if ( $authors_bio == 'show' ) {
						echo '<div class="author-bio">' . get_the_author_meta( 'description', $author->ID ) . '</div>';
					} ?>
				
				</li>

			<?php endforeach; endif; // ends 'authors' loop ?>
		</ul>

	</div>

</section>
