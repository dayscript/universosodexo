<?php

add_action( 'widgets_init', 'quadro_load_widgets' );

function quadro_load_widgets() {
	register_widget( 'quadro_recent_posts' );
	register_widget( 'quadro_featured_post' );
	register_widget( 'quadro_image_widget' );
	register_widget( 'quadro_video_widget' );
	register_widget( 'quadro_gmap_widget' );
	register_widget( 'quadro_ads_widget_1col' );
	register_widget( 'quadro_ads_widget_2cols' );
}


/**
 * Quadro Recent Posts Widget Class.
 */
class quadro_recent_posts extends WP_Widget {

	/* Widget setup */
	function quadro_recent_posts() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'quadro-recents-widget', 'description' => __('Quadro Recent Posts with Thumbnails.', 'quadro') );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'quadro-recent-posts' );

		/* Create the widget. */
		$this->WP_Widget( 'quadro-recent-posts', __('Quadro Recent Posts', 'quadro'), $widget_ops, $control_ops );
	}

	/* How to display the widget on the screen */
	function widget( $args, $controls ) {
		
		extract( $args );

		/* Our variables from the widget settings */
		$title = apply_filters('widget_title', $controls['title'] );
		$post_count = $controls['post_count'];

		echo $before_widget;

		if ( $title ) echo $before_title . esc_attr( $title, 'quadro' ) . $after_title; ?>

		<ul>
		
			<?php global $post;
			if ( !$post_count ) $post_count = 5;
			$args = array( 'numberposts' => $post_count );
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :  setup_postdata($post); ?>
		    <li class="quadro-rpost clear">
		    	<a href="<?php the_permalink(); ?>" class="quadro-rpost-thumb-link" title="<?php echo get_the_title(); ?>">
					<?php if ( has_post_thumbnail() ) { 
						the_post_thumbnail('thumbnail');
					} else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/default-thumb.jpg" alt="<?php echo get_the_title(); ?>" width="60" height="60" title="<?php the_title(); ?>">
					<?php } ?>
				</a>
				<div class="quadro-rpost-data">
					<h4><a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title(); ?></a></h4>
					<p class="meta"><?php the_time(get_option('date_format')); ?></p>
				</div>
			</li>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
   		
		</ul>
		<?php

		/* After widget (defined by themes) */
		echo $after_widget;
	}

	/* Update the widget settings */
	function update( $new_controls, $old_controls ) {
		$controls = $old_controls;
		$controls['title'] = strip_tags( $new_controls['title'] );
		$controls['post_count'] = strip_tags( $new_controls['post_count'] );

		return $controls;
	}

	/* Displays the widget settings controls on the widget panel */
	function form( $controls ) {

		/* Set up some default widget settings */
		$defaults = array( 'title' => '', 'post_count' => 3 );
		$controls = wp_parse_args( (array) $controls, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e('Title:', 'quadro'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $controls['title'] ); ?>" style="width: 80%;" />
		</p>

		<!-- Post Quantity: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_count' ) ); ?>"><?php _e('Post Quantity:', 'quadro'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'post_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_count' ) ); ?>" value="<?php echo esc_attr( $controls['post_count'] ); ?>" style="width:20%;" />
		</p>

	<?php
	}
}


/**
 * Quadro Featured Post Widget Class.
 */
class quadro_featured_post extends WP_Widget {

	/* Widget setup */
	function quadro_featured_post() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'quadro-featured-widget', 'description' => __('Quadro Featured Post.', 'quadro') );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'quadro-featured-post' );

		/* Create the widget. */
		$this->WP_Widget( 'quadro-featured-post', __('Quadro Featured Post', 'quadro'), $widget_ops, $control_ops );
	}

	/* How to display the widget on the screen */
	function widget( $args, $controls ) {
		
		extract( $args );

		/* Our variables from the widget settings */
		$title = apply_filters('widget_title', $controls['title'] );

		echo $before_widget;

		if ( $title ) echo $before_title . esc_attr( $title, 'quadro' ) . $after_title; ?>
		
		<?php global $post;
		$args = array( 'numberposts' => 1, 'p' => $controls['feat_post'] );
		$featposts = get_posts( $args );
		foreach( $featposts as $post ) :  setup_postdata($post); ?>
	    <div class="quadro-feat-post clear">
			<div class="quadro-feat-post-data">
				<h4><a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title(); ?></a></h4>
				<p class="meta"><?php the_time(get_option('date_format')); ?></p>
			</div>
	    	<a href="<?php the_permalink(); ?>" class="quadro-feat-post-thumb-link" title="<?php echo get_the_title(); ?>">
				<?php if ( has_post_thumbnail() ) { 
					the_post_thumbnail('medium');
				} else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/default-thumb.jpg" alt="<?php echo get_the_title(); ?>" width="60" height="60" title="<?php the_title(); ?>">
				<?php } ?>
			</a>
		</div>
		<?php endforeach; ?>
		<?php wp_reset_postdata(); ?>
   		
		<?php

		/* After widget (defined by themes) */
		echo $after_widget;
	}

	/* Update the widget settings */
	function update( $new_controls, $old_controls ) {
		$controls = $old_controls;
		$controls['title'] = strip_tags( $new_controls['title'] );
		$controls['feat_post'] = strip_tags( $new_controls['feat_post'] );

		return $controls;
	}

	/* Displays the widget settings controls on the widget panel */
	function form( $controls ) {

		/* Set up some default widget settings */
		$defaults = array( 'title' => '', 'feat_post' => 3 );
		$controls = wp_parse_args( (array) $controls, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e('Title:', 'quadro'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $controls['title'] ); ?>" style="width: 80%;" />
		</p>

		<!-- Post Quantity: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'feat_post' ) ); ?>"><?php _e('Select Post:', 'quadro'); ?></label>
			<?php // Posts query, bring all of them
			$args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
			$select_query = get_posts( $args );
			// List them
			if( !empty($select_query) ) : 
				echo '<select id="' . esc_attr( $this->get_field_id( 'feat_post' ) ) . '" name="' . esc_attr( $this->get_field_name( 'feat_post' ) ) . '" class="qcustom-selector">';
				foreach ( $select_query as $litem ) :
					echo '<option value="' . $litem->ID . '"', esc_attr( $controls['feat_post'] ) == $litem->ID ? ' selected="selected"' : '', '>', $litem->post_title, '</option>';
            	endforeach;
				echo '</select>';
			endif;
			wp_reset_postdata();
			?>
		</p>

	<?php
	}
}


// Modify the default Categories Widget
add_filter('wp_list_categories', 'quadro_add_arrow');
function quadro_add_arrow($output) {
	$output = str_replace('</a> (',' (',$output);
	$output = str_replace(')',')</a> ',$output);
	return $output;
}


// Modify the next and prev month links in Calendar Widget
add_filter('get_calendar', 'quadro_month_link');
function quadro_month_link($output) {
	$output = str_replace(array('&laquo;', '&raquo;'), array('&larr;', '&rarr;'), $output);
	return $output;
}


/**
 * Quadro Image Widget Class.
 */
class quadro_image_widget extends WP_Widget {

	/* Widget setup */
	function quadro_image_widget() {
		/* Widget settings */
		$widget_ops = array( 'classname' => 'quadro-image-widget', 'description' => __('Quadro Image Widget.', 'quadro') );

		/* Widget control settings */
		$control_ops = array( 'id_base' => 'quadro-image-widget' );

		/* Create the widget */
		$this->WP_Widget( 'quadro-image-widget', __('Quadro Image Widget', 'quadro'), $widget_ops, $control_ops );
	}

	/* How to display the widget on the screen */
	function widget( $args, $controls ) {
		extract( $args );

		/* Our variables from the widget settings */
		$title = apply_filters('widget_title', $controls['title'] );
		$image_url = $controls['image_url'];
		
		if ( $controls['image_url'] != '' ) {

			echo $before_widget;

			if ( $title )
				echo $before_title . esc_attr( $title, 'quadro' ) . $after_title; ?>
			
			<div class="widget-image-container">
				<img src="<?php echo esc_url( $image_url ); ?>" alt="" class="widget-image">
			</div>
			
			<?php echo $after_widget;
		
		} // end If we have an image Url
	
	}
	

	/* Update the widget settings */
	function update( $new_controls, $old_controls ) {
		$controls = $old_controls;
		$controls['title'] = strip_tags( $new_controls['title'] );
		$controls['image_url'] = $new_controls['image_url'];

		return $controls;
	}

	/* Displays the widget settings controls on the widget panel */
	function form( $controls ) {

		/* Set up some default widget settings */
		$defaults = array( 'title' => '', 'image_url' => '' );
		$controls = wp_parse_args( (array) $controls, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e('Title:', 'quadro'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $controls['title'] ); ?>" style="width: 80%;" />
		</p>

		<!-- Image Url: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'image_url' ) ); ?>">
			<input class="upload" id="<?php echo esc_attr( $this->get_field_id( 'image_url' ) ); ?>" 
			type="text" size="36" name="<?php echo esc_attr( $this->get_field_name( 'image_url' ) ); ?>" 
			value="<?php echo esc_attr( $controls['image_url'] ); ?>" />
			<input class="upload_file_button" type="button" value="<?php _e('Upload Image', 'quadro'); ?>" />
			</label>
		</p>
		
		<?php if ( $controls['image_url'] != '' ) { ?>
		<p>
			<img src="<?php echo esc_url( $controls['image_url'] ); ?>" alt="" width="100%">
		</p>
		<?php }
		
	}
}


/**
 * Quadro Video Widget Class.
 */
class quadro_video_widget extends WP_Widget {

	/* Widget setup */
	function quadro_video_widget() {
		/* Widget settings */
		$widget_ops = array( 'classname' => 'quadro-video-widget', 'description' => __('Quadro Video Widget.', 'quadro') );

		/* Widget control settings */
		$control_ops = array( 'id_base' => 'quadro-video-widget' );

		/* Create the widget */
		$this->WP_Widget( 'quadro-video-widget', __('Quadro Video Widget', 'quadro'), $widget_ops, $control_ops );
	}

	/* How to display the widget on the screen */
	function widget( $args, $controls ) {
		extract( $args );

		$title = apply_filters('widget_title', $controls['title'] );
		$video_url = $controls['video_url'];

		echo $before_widget;

		if ( $title )
			echo $before_title . esc_attr( $title, 'quadro' ) . $after_title;

		// Present the Embed if we have one
		if ( $video_url ) {
			global $wp_embed;
			$video_embed = $wp_embed->run_shortcode('[embed]' . esc_url( $video_url ) . '[/embed]');
			echo $video_embed;
		}

		echo $after_widget;
	}

	/* Update the widget settings */
	function update( $new_controls, $old_controls ) {
		$controls = $old_controls;
		$controls['title'] = strip_tags( $new_controls['title'] );
		$controls['video_url'] = $new_controls['video_url'];
		return $controls;
	}

	/* Displays the widget settings controls on the widget panel */
	function form( $controls ) {

		/* Set up some default widget settings */
		$defaults = array( 'title' => '', 'video_url' => '' );
		$controls = wp_parse_args( (array) $controls, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e('Title:', 'quadro'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $controls['title'] ); ?>" style="width: 80%;" />
		</p>

		<!-- Video Embed Url: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'video_url' ) ); ?>"><?php _e('Video Embed Url:', 'quadro'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'video_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'video_url' ) ); ?>" value="<?php echo esc_attr( $controls['video_url'] ); ?>" style="width:93%;" />
		</p>

	<?php
	}
}


/**
 * Quadro Google Map Widget Class.
 */
class quadro_gmap_widget extends WP_Widget {

	/* Widget setup */
	function quadro_gmap_widget() {
		/* Widget settings */
		$widget_ops = array( 'classname' => 'quadro-gmap-widget', 'description' => __('Quadro Google Map Widget.', 'quadro') );

		/* Widget control settings */
		$control_ops = array( 'id_base' => 'gmap-widget' );

		/* Create the widget */
		$this->WP_Widget( 'gmap-widget', __('Quadro Google Map Widget', 'quadro'), $widget_ops, $control_ops );
	}

	/* How to display the widget on the screen */
	function widget( $args, $controls ) {
		extract( $args );

		/* Our variables from the widget settings */
		$title = apply_filters('widget_title', $controls['title'] );
		$gmap_url = $controls['gmap_url'];

		echo $before_widget;

		if ( $title )
			echo $before_title . esc_attr( $title, 'quadro' ) . $after_title;

		if ( $gmap_url ) { ?>
		<div class="google-map-wrapper">
			<div class="google-map-map" data-address="<?php echo esc_attr( $gmap_url ); ?>"></div>
		</div>
		<?php }
		global $quadro_options;
		if ( ! $quadro_options['gmaps_enable'] == true ) {
			echo '<p>' . __('Please enable the Google Maps script under Theme Options &raquo; Homepage.', 'quadro') . '</p>';
		}
		
		echo $after_widget;
	}

	/* Update the widget settings */
	function update( $new_controls, $old_controls ) {
		$controls = $old_controls;

		/* Strip tags for title to remove HTML */
		$controls['title'] = strip_tags( $new_controls['title'] );
		$controls['gmap_url'] = $new_controls['gmap_url'];

		return $controls;
	}

	/* Displays the widget settings controls on the widget panel */
	function form( $controls ) {

		/* Set up some default widget settings */
		$defaults = array( 'title' => '', 'gmap_url' => '' );
		$controls = wp_parse_args( (array) $controls, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e('Title:', 'quadro'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $controls['title'] ); ?>" style="width:80%;" />
		</p>
		<!-- Gmap Embed Url: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'gmap_url' ) ); ?>"><?php _e('Google Map Address:', 'quadro'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'gmap_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'gmap_url' ) ); ?>" value="<?php echo esc_attr( $controls['gmap_url'] ); ?>" style="width:93%;" />
		</p>

	<?php
	}
}


/**
 * Quadro Ads 1 Column Widget Class.
 */
class quadro_ads_widget_1col extends WP_Widget {

	/* Widget setup */
	function quadro_ads_widget_1col() {
		/* Widget settings */
		$widget_ops = array( 'classname' => 'quadro-ads-widget-1col', 'description' => __('Add your advertising shortcodes or banner images.', 'quadro') );

		/* Widget control settings */
		$control_ops = array( 'id_base' => 'ads-1col-widget' );

		/* Create the widget */
		$this->WP_Widget( 'ads-1col-widget', __('Quadro Ads (1 column)', 'quadro'), $widget_ops, $control_ops );
	}

	/* How to display the widget on the screen */
	function widget( $args, $controls ) {
		extract( $args );

		/* Our variables from the widget settings */
		$title 			= apply_filters('widget_title', $controls['title'] );
		$ad_spots 		= esc_attr($controls['ad_spots']);

		echo $before_widget;

		if ( $title )
			echo $before_title . esc_attr( $title, 'quadro' ) . $after_title;

		for ( $i = 1; $i <= $ad_spots; $i++ ) {
			if ( $controls['ad_shortcode_'.$i] ) {
				echo '<div class="qi-ad-widget">';
				echo do_shortcode( esc_textarea( $controls['ad_shortcode_'.$i] ) );
				echo '</div>';
			}
			elseif ( $controls['ad_img_'.$i] ) {
				echo '<div class="qi-ad-widget"><a href="' . esc_url( $controls['ad_url_'.$i] ) . '" target="' . esc_attr( $controls['ad_target_'.$i] ) . '">
				<img src="' . esc_url( $controls['ad_img_'.$i] ) . '"></a></div>';
			}
		}
		
		echo $after_widget;
	}

	/* Update the widget settings */
	function update( $new_controls, $old_controls ) {
		$controls = $old_controls;

		/* Strip tags for title to remove HTML */
		$controls['title'] = strip_tags( $new_controls['title'] );
		$controls['ad_spots'] = $new_controls['ad_spots'];
		
		for ( $i = 1; $i <= $controls['ad_spots']; $i++ ) {
			$controls['ad_img_'.$i] = $new_controls['ad_img_'.$i];
			$controls['ad_url_'.$i] = $new_controls['ad_url_'.$i];
			$controls['ad_target_'.$i] = $new_controls['ad_target_'.$i];
			$controls['ad_shortcode_'.$i] = $new_controls['ad_shortcode_'.$i];
		}

		return $controls;
	}

	/* Displays the widget settings controls on the widget panel */
	function form( $controls ) {

		/* Set up some default widget settings */
		$defaults = array( 'title' => '', 'ad_spots' => '1' );
		$spots = isset( $controls['ad_spots'] ) ? $controls['ad_spots'] : 1;
		for ( $i = 1; $i <= $spots; $i++ ) {
			$defaults['ad_img_'.$i] = '';
			$defaults['ad_url_'.$i] = '';
			$defaults['ad_target_'.$i] = '_self';
			$defaults['ad_shortcode_'.$i] = '';
		}
		$controls = wp_parse_args( (array) $controls, $defaults ); ?>

		<!-- Ad Spots: Number input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ad_spots' ) ); ?>"><?php _e('Ad Spots:', 'quadro'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'ad_spots' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ad_spots' ) ); ?>" value="<?php echo esc_attr( $controls['ad_spots'] ); ?>" type="number" style="width:20%;" />
			<br /><small><?php _e('Enter the number of desired ad spots, and click "Save" to refresh widget controls.', 'quadro'); ?></small>
		</p>
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e('Title:', 'quadro'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $controls['title'] ); ?>" style="width:80%;" />
		</p>
		<?php for ( $i = 1; $i <= $controls['ad_spots']; $i++ ) { ?>
			<h3>Controls for Ad Spot <?php echo $i; ?></h3>
			<!-- Image Ad Upload -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'ad_img_'.$i ) ); ?>"><?php _e('Image Ad Upload:', 'quadro'); ?></label>
				<input class="upload" id="<?php echo esc_attr( $this->get_field_id( 'ad_img_'.$i ) ); ?>" 
				type="text" size="36" name="<?php echo esc_attr( $this->get_field_name( 'ad_img_'.$i ) ); ?>" 
				value="<?php echo esc_attr( $controls['ad_img_'.$i] ); ?>" style="width:93%;"/>
				<input class="upload_file_button" type="button" value="<?php _e('Upload Image', 'quadro'); ?>" />
			</p>
			<!-- Ad URL: Text Input -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'ad_url_'.$i ) ); ?>"><?php _e('Image Ad Link:', 'quadro'); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'ad_url_'.$i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ad_url_'.$i ) ); ?>" value="<?php echo esc_attr( $controls['ad_url_'.$i] ); ?>" style="width:93%;" />
				<small><?php _e('Insert URL destination for your ad', 'quadro'); ?></small>
			</p>
			<!-- Ad Target: Text Input -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'ad_target_'.$i ) ); ?>"><?php _e('Image Ad Link Target:', 'quadro'); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'ad_target_'.$i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ad_target_'.$i ) ); ?>" value="<?php echo esc_attr( $controls['ad_target_'.$i] ); ?>" style="width:93%;" />
				<small><?php _e('Enter <i>_self</i> or <i>_blank</i>') ?></small>
			</p>
			<!-- Ad Shortcode: Text Input -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'ad_shortcode_'.$i ) ); ?>"><?php _e('Ad Shortcode:', 'quadro'); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'ad_shortcode_'.$i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ad_shortcode_'.$i ) ); ?>" value="<?php echo esc_attr( $controls['ad_shortcode_'.$i] ); ?>" style="width:93%;" />
				<small><?php _e('Paste here shortcode from your Ads Plugin (overrides image upload)', 'quadro'); ?></small>
			</p>
		<?php } ?>
	<?php
	}
}


/**
 * Quadro Ads 2 Columns Widget Class.
 */
class quadro_ads_widget_2cols extends WP_Widget {

	/* Widget setup */
	function quadro_ads_widget_2cols() {
		/* Widget settings */
		$widget_ops = array( 'classname' => 'quadro-ads-widget-2cols', 'description' => __('Add your advertising shortcodes or banner images.', 'quadro') );

		/* Widget control settings */
		$control_ops = array( 'id_base' => 'ads-2cols-widget' );

		/* Create the widget */
		$this->WP_Widget( 'ads-2cols-widget', __('Quadro Ads (2 columns)', 'quadro'), $widget_ops, $control_ops );
	}

	/* How to display the widget on the screen */
	function widget( $args, $controls ) {
		extract( $args );

		/* Our variables from the widget settings */
		$title 			= apply_filters('widget_title', $controls['title'] );
		$ad_spots 		= esc_attr($controls['ad_spots']);

		echo $before_widget;

		if ( $title )
			echo $before_title . esc_attr( $title, 'quadro' ) . $after_title;

		for ( $i = 1; $i <= $ad_spots; $i++ ) {
			if ( $controls['ad_shortcode_'.$i] ) {
				echo '<div class="qi-ad-widget">';
				echo do_shortcode( esc_textarea( $controls['ad_shortcode_'.$i] ) );
				echo '</div>';
			}
			elseif ( $controls['ad_img_'.$i] ) {
				echo '<div class="qi-ad-widget"><a href="' . esc_url( $controls['ad_url_'.$i] ) . '" target="' . esc_attr( $controls['ad_target_'.$i] ) . '">
				<img src="' . esc_url( $controls['ad_img_'.$i] ) . '"></a></div>';
			}
		}
		
		echo $after_widget;
	}

	/* Update the widget settings */
	function update( $new_controls, $old_controls ) {
		$controls = $old_controls;

		/* Strip tags for title to remove HTML */
		$controls['title'] = strip_tags( $new_controls['title'] );
		$controls['ad_spots'] = $new_controls['ad_spots'];
		
		for ( $i = 1; $i <= $controls['ad_spots']; $i++ ) {
			$controls['ad_img_'.$i] = $new_controls['ad_img_'.$i];
			$controls['ad_url_'.$i] = $new_controls['ad_url_'.$i];
			$controls['ad_target_'.$i] = $new_controls['ad_target_'.$i];
			$controls['ad_shortcode_'.$i] = $new_controls['ad_shortcode_'.$i];
		}

		return $controls;
	}

	/* Displays the widget settings controls on the widget panel */
	function form( $controls ) {

		/* Set up some default widget settings */
		$defaults = array( 'title' => '', 'ad_spots' => '1' );
		$spots = isset( $controls['ad_spots'] ) ? $controls['ad_spots'] : 1;
		for ( $i = 1; $i <= $spots; $i++ ) {
			$defaults['ad_img_'.$i] = '';
			$defaults['ad_url_'.$i] = '';
			$defaults['ad_target_'.$i] = '_self';
			$defaults['ad_shortcode_'.$i] = '';
		}
		$controls = wp_parse_args( (array) $controls, $defaults ); ?>

		<!-- Ad Spots: Number input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ad_spots' ) ); ?>"><?php _e('Ad Spots:', 'quadro'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'ad_spots' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ad_spots' ) ); ?>" value="<?php echo esc_attr( $controls['ad_spots'] ); ?>" type="number" style="width:20%;" />
			<br /><small><?php _e('Enter the number of desired ad spots, and click "Save" to refresh widget controls.', 'quadro'); ?></small>
		</p>
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e('Title:', 'quadro'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $controls['title'] ); ?>" style="width:80%;" />
		</p>
		<?php for ( $i = 1; $i <= $controls['ad_spots']; $i++ ) { ?>
			<h3>Controls for Ad Spot <?php echo $i; ?></h3>
			<!-- Image Ad Upload -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'ad_img_'.$i ) ); ?>"><?php _e('Image Ad Upload:', 'quadro'); ?></label>
				<input class="upload" id="<?php echo esc_attr( $this->get_field_id( 'ad_img_'.$i ) ); ?>" 
				type="text" size="36" name="<?php echo esc_attr( $this->get_field_name( 'ad_img_'.$i ) ); ?>" 
				value="<?php echo esc_attr( $controls['ad_img_'.$i] ); ?>" style="width:93%;"/>
				<input class="upload_file_button" type="button" value="<?php _e('Upload Image', 'quadro'); ?>" />
			</p>
			<!-- Ad URL: Text Input -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'ad_url_'.$i ) ); ?>"><?php _e('Image Ad Link:', 'quadro'); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'ad_url_'.$i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ad_url_'.$i ) ); ?>" value="<?php echo esc_attr( $controls['ad_url_'.$i] ); ?>" style="width:93%;" />
				<small><?php _e('Insert URL destination for your ad', 'quadro'); ?></small>
			</p>
			<!-- Ad Target: Text Input -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'ad_target_'.$i ) ); ?>"><?php _e('Image Ad Link Target:', 'quadro'); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'ad_target_'.$i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ad_target_'.$i ) ); ?>" value="<?php echo esc_attr( $controls['ad_target_'.$i] ); ?>" style="width:93%;" />
				<small><?php _e('Enter <i>_self</i> or <i>_blank</i>') ?></small>
			</p>
			<!-- Ad Shortcode: Text Input -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'ad_shortcode_'.$i ) ); ?>"><?php _e('Ad Shortcode:', 'quadro'); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'ad_shortcode_'.$i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ad_shortcode_'.$i ) ); ?>" value="<?php echo esc_attr( $controls['ad_shortcode_'.$i] ); ?>" style="width:93%;" />
				<small><?php _e('Paste here shortcode from your Ads Plugin (overrides image upload)', 'quadro'); ?></small>
			</p>
		<?php } ?>
	<?php
	}
}



// Enqueuing scripts
function quadro_widgets_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}
function quadro_widgets_scripts_styles() {
	wp_enqueue_style('thickbox');
}
if ( 'widgets.php' == $pagenow ) {
	add_action('admin_print_scripts', 'quadro_widgets_scripts');
	add_action('admin_print_styles', 'quadro_widgets_scripts_styles');
}

?>