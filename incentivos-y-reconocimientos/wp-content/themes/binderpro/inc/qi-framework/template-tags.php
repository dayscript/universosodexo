<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package quadro
 */

if ( ! function_exists( 'quadro_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function quadro_content_nav( $nav_id ) {
	global $wp_query, $post, $quadro_options;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'quadro' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . __( '&larr;', 'Previous post link', 'quadro' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . __( '&rarr;', 'Next post link', 'quadro' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><span class="meta-nav">&larr;</span> <?php next_posts_link( __( 'Anterior', 'quadro' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Siguiente', 'quadro' ) ); ?> <span class="meta-nav">&rarr;</span></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // quadro_content_nav


if ( ! function_exists( 'quadro_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function quadro_paging_nav( $older = '&larr;', $newer = '&rarr;' ) {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation clear" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'quadro' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><span class="meta-nav"><?php next_posts_link( $older . ' ' . __( 'Noticias Antiguas', 'quadro' ) ); ?></span></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><span class="meta-nav"><?php previous_posts_link( __( 'Nuevas Noticias', 'quadro' ) . ' ' . $newer ); ?></span></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if ( ! function_exists( 'quadro_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable (with thumbnails).
 */
function quadro_post_nav( $older = '&larr;', $newer = '&rarr;', $thumb_size = 'medium' ) {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation clear" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'quadro' ); ?></h1>
		<div class="nav-links">
			<?php
			$prev_post = get_previous_post();
			$prev_thumb = '';
			if ( $prev_post ) $prev_thumb = get_the_post_thumbnail( $prev_post->ID, $thumb_size );
			$next_post = get_next_post();
			$next_thumb = '';
			if ( $next_post ) $next_thumb = get_the_post_thumbnail( $next_post->ID, $thumb_size );
			previous_post_link( '<div class="nav-previous">%link</div>' , $prev_thumb . '<span class="meta-nav"><strong>' . __( 'Anterior:', 'quadro' ) . '</strong>' . $older . ' %title</span>' );
			next_post_link( '<div class="nav-next">%link</div>', $next_thumb . '<span class="meta-nav"><strong>' . __( 'Siguiente:', 'quadro' ) . '</strong>%title ' . $newer . '</span>' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if ( ! function_exists( 'quadro_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function quadro_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'quadro' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'quadro' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<header class="comment-meta clear">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 80 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'quadro' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'quadro' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'quadro' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

			</header><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
			<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'quadro' ); ?></p>
			<?php endif; ?>
			
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for quadro_comment()

if ( ! function_exists( 'quadro_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function quadro_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'quadro_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'quadro_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function quadro_posted_on( $format = '', $atts = '' ) {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( $format ) ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date( $format ) )
	);

	printf( __( '<span class="posted-on">%1$s</span>', 'quadro' ),
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark" %4$s>%3$s</a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			$time_string,
			$atts
		)
	);
}
endif;

if ( ! function_exists( 'quadro_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current author.
 */
function quadro_posted_by() {
	printf( __( '<span class="byline">by %1$s</span>', 'quadro' ),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'quadro' ), get_the_author() ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

if ( ! function_exists( 'quadro_posted_by_gravatar' ) ) :
/**
 * Prints HTML with meta information for the current author plus his/her gravatar.
 */
function quadro_posted_by_gravatar( $author_ID, $g_size = 30 ) {
	
	$author = get_user_by( 'id', $author_ID );
	$author_link = esc_url( get_author_posts_url( $author_ID ) );
		
	echo '<div class="byline">';

		if ( get_avatar( $author->user_email ) ) {
			echo '<a href="' . $author_link . '" title="' . __('Posts by ', 'quadro') . $author->display_name . '">';
			echo get_avatar( $author->user_email, $size=$g_size, '', $author->display_name ) . '</a>'; 
		}
		
		printf( __( '<span>por %1$s</span>', 'quadro' ),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				$author_link,
				esc_attr( sprintf( __( 'View all posts by %s', 'quadro' ), get_the_author() ) ),
				esc_html( get_the_author() )
			)
		);

	echo '</div>';

}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function quadro_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'quadro_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'quadro_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so quadro_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so quadro_categorized_blog should return false.
		return false;
	}
}

/**
 * Print Categories and Taggs for single posts
 */
function quadro_cats_and_tags() {
	/* translators: used between list items, there is a space after the comma */
	$category_list = get_the_category_list( __( ', ', 'quadro' ) );

	/* translators: used between list items, there is a space after the comma */
	$tag_list = get_the_tag_list( '', __( ', ', 'quadro' ) );

	if ( ! quadro_categorized_blog() ) {
		// This blog only has 1 category so we just need to worry about tags in the meta text
		if ( '' != $tag_list ) {
			$meta_text = __( 'Tagged: %2$s.', 'quadro' );
		}
	} else {
		// But this blog has loads of categories so we should probably display them here
		if ( '' != $tag_list ) {
			$meta_text = __( 'This entry was posted in %1$s. Tagged: %2$s.', 'quadro' );
		} else {
			$meta_text = __( 'This entry was posted in %1$s.', 'quadro' );
		}

	} // end check for categories on this blog

	printf(
		$meta_text,
		$category_list,
		$tag_list
	);
}

/**
 * Print only categories
 */
function quadro_cats() {
	$categories_list = get_the_category_list( __( ' ', 'quadro' ) );
	if ( $categories_list && quadro_categorized_blog() ) { ?>
		<span class="cat-links">
			<?php echo $categories_list; ?>
		</span>
	<?php } // End if categories
}

/**
 * Print only tags
 */
function quadro_tags() {
	$tags_list = get_the_tag_list( '', __( ', ', 'quadro' ) );
	if ( $tags_list ) { ?>
		<span class="tags-links">
			<?php printf( __( 'Tagged: %1$s', 'quadro' ), $tags_list ); ?>
		</span>
	<?php }
}

/**
 * Flush out the transients used in quadro_categorized_blog.
 */
function quadro_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'quadro_categories' );
}
add_action( 'edit_category', 'quadro_category_transient_flusher' );
add_action( 'save_post',     'quadro_category_transient_flusher' );


if ( ! function_exists( 'quadro_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function quadro_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'quadro' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'quadro' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<header class="comment-meta clear">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 100 ); ?>
					<?php printf( __( '%s', 'quadro' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'quadro' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'quadro' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

			</header><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
			<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'quadro' ); ?></p>
			<?php endif; ?>
			
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for quadro_comment()
