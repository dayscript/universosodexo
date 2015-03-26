<?php
/**
 * Quadro Theme Settings Theme Customizer Implementation
 * Implements the Theme Customizer for Theme Settings.
 * 
 * @link	https://github.com/chipbennett/oenology >> Chip Bennett   
 * @link	http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/ >> Otto
 */
function quadro_register_theme_customizer( $wp_customize ){

	// Failsafe is safe
	if ( ! isset( $wp_customize ) ) {
		return;
	}

	// Enqueue Customizer Styles
	wp_register_style( 'quadro-customizer-styles', get_template_directory_uri() . '/inc/qi-framework/quadro-customizer-styles.css', array(), '' );	
	wp_enqueue_style( 'quadro-customizer-styles' );

	if ( !function_exists('quadro_get_valid_fontslist') ) {
		// Load fonts list
		require( get_template_directory() . '/inc/qi-framework/google-fonts-list.php' );
	}

	/**
	 * Define custom controls
	 */
	// textarea
	class Quadro_Customize_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	    public function render_content() {
	        ?>
	        <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>
	        <?php
	    }
	}
	// layout picker
	class Quadro_Customize_LayoutPicker_Control extends WP_Customize_Control {
	    public $type = 'radio';
	    public function render_content() {
	        ?>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <?php
	        $valid_options = array();
			$valid_options = $this->choices;
			$option_parameters = quadro_get_option_parameters();
			$option_id = str_replace( 'quadro_', '', $this->id );
			$path = $option_parameters[$option_id]['path'];
			foreach ( $valid_options as $valid_option ) {
				?>
				<label class="layout-item <?php echo $optionname; ?>-layout">
				<input type="radio" name="_customize-radio-<?php echo $this->id; ?>" <?php $this->link(); ?> data-customize-setting-link="quadro_nayma_options[<?php echo $option_id; ?>]" <?php checked( $valid_option['name'] == $this->value() ); ?> value="<?php echo $valid_option['name']; ?>" />
				<?php if ( $valid_option['img'] != '' ) { ?>
				<img src="<?php echo get_template_directory_uri() . $path . $valid_option['img']; ?>" alt="<?php echo $valid_option['title']; ?>">
				<?php } ?>
				<span>
				<?php echo $valid_option['title']; ?>
				<?php if ( $valid_option['description'] ) { ?>
					<span><em><?php echo $valid_option['description']; ?></em></span>
				<?php } ?>
				</span>
				</label>
				<?php
			}
	    }
	}
	// font picker
	class Quadro_Customize_Font_Control extends WP_Customize_Control {
	    public $type = 'select';
	    public function render_content() {
	        ?>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <?php
	        $valid_fonts = array();
			$valid_fonts = quadro_get_valid_fontslist();
			$option_parameters = quadro_get_option_parameters();
			$option_id = str_replace( 'quadro_', '', $this->id ); ?>
			<select name="quadro_nayma_options[<?php echo $option_id; ?>]" id="quadro_nayma_options[<?php echo $option_id; ?>]" <?php $this->link(); ?>>
			<?php foreach ( $valid_fonts as $valid_font ) { ?>
				<option <?php selected( $valid_font['css-name'] . '|' . $valid_font['font-family'] == $this->value() ); ?> value="<?php echo esc_attr( $valid_font['css-name'] ) . '|' . esc_attr( $valid_font['font-family'] ); ?>"><?php echo $valid_font['font-name']; ?></option>
			<?php } ?>
			</select>
			<?php
	    }
	}
	/**
	 * End of custom controls
	 */

	global $quadro_options;
	$quadro_options = quadro_get_options();
	// Get the array of option parameters
	$option_parameters = quadro_get_option_parameters();
	// Get list of tabs
	$tabs = quadro_get_settings_page_tabs();

	// Set Priority Counters
	$y = 1;
	$i = 1;

	// Add Sections
	foreach ( $tabs as $tab ) {
		// Skip this TAB for the Customizer if set to 'exclude'
		if ( isset($tab['customizer']) && $tab['customizer'] == 'exclude' ) continue;
		// Add $tab section
		$wp_customize->add_section( 'quadro_' . $tab['name'], array(
			'title'		=> 'Nayma ' . $tab['title'] . ' Settings',
			'priority'	=> $y,
		) );
		// Increase Priority Counter
		$y++;
	}

	// Add Settings
	foreach ( $option_parameters as $option_parameter ) {

		// Skip this setting for the Customizer if set to 'exclude'
		if ( isset($option_parameter['customizer']) && $option_parameter['customizer'] == 'exclude' ) continue;

		// Add $option_parameter setting
		$wp_customize->add_setting( 'quadro_nayma_options[' . $option_parameter['name'] . ']', array(
			'default'	=> $option_parameter['default'],
			'type'		=> 'option',
		) );

		// Add $option_parameter control
		if ( 'text' == $option_parameter['type'] ) {
			$wp_customize->add_control( 'quadro_' . $option_parameter['name'], array(
				'label'		=> $option_parameter['title'],
				'section'	=> 'quadro_' . $option_parameter['tab'],
				'settings'	=> 'quadro_nayma_options['. $option_parameter['name'] . ']',
				'type'		=> 'text',
				'priority'	=> $i,
			) );

		} else if ( 'textarea' == $option_parameter['type'] ) {
			$wp_customize->add_control( new Quadro_Customize_Textarea_Control(
	        	$wp_customize,
        		'quadro_' . $option_parameter['name'], array(
					'label'		=> $option_parameter['title'],
					'section'	=> 'quadro_' . $option_parameter['tab'],
					'settings'	=> 'quadro_nayma_options['. $option_parameter['name'] . ']',
					'priority'	=> $i,
				)
			) );

		} else if ( 'checkbox' == $option_parameter['type'] ) {
			$wp_customize->add_control( 'quadro_' . $option_parameter['name'], array(
				'label'		=> $option_parameter['title'],
				'section'	=> 'quadro_' . $option_parameter['tab'],
				'settings'	=> 'quadro_nayma_options['. $option_parameter['name'] . ']',
				'type'		=> 'checkbox',
				'priority'	=> $i,
			) );

		} else if ( 'radio' == $option_parameter['type'] ) {
			$valid_options = array();
			foreach ( $option_parameter['valid_options'] as $valid_option ) {
				$valid_options[$valid_option['name']] = $valid_option['title'];
			}
			$wp_customize->add_control( 'quadro_' . $option_parameter['name'], array(
				'label'		=> $option_parameter['title'],
				'section'	=> 'quadro_' . $option_parameter['tab'],
				'settings'	=> 'quadro_nayma_options['. $option_parameter['name'] . ']',
				'type'		=> 'radio',
				'choices'	=> $valid_options,
				'priority'	=> $i,
			) );

		} else if ( 'select' == $option_parameter['type'] ) {
			$valid_options = array();
			foreach ( $option_parameter['valid_options'] as $valid_option ) {
				$valid_options[$valid_option['name']] = $valid_option['title'];
			}
			$wp_customize->add_control( 'quadro_' . $option_parameter['name'], array(
				'label'		=> $option_parameter['title'],
				'section'	=> 'quadro_' . $option_parameter['tab'],
				'settings'	=> 'quadro_nayma_options['. $option_parameter['name'] . ']',
				'type'		=> 'select',
				'choices'	=> $valid_options,
				'priority'	=> $i,
			) );

		} else if ( 'font' == $option_parameter['type'] ) {
			$valid_options = array();
			$valid_fonts = array();
			$valid_fonts = quadro_get_valid_fontslist();
			foreach ( $valid_fonts as $valid_font ) {
				$valid_options[esc_attr( $valid_font['css-name'] ) . '|' . esc_attr( $valid_font['font-family'] )] = $valid_font['font-name'];
			}
			$wp_customize->add_control( 'quadro_' . $option_parameter['name'], array(
				'label'		=> $option_parameter['title'],
				'section'	=> 'quadro_' . $option_parameter['tab'],
				'settings'	=> 'quadro_nayma_options['. $option_parameter['name'] . ']',
				'type'		=> 'select',
				'choices'	=> $valid_options,
				'priority'	=> $i,
			) );

		} else if ( 'custom' == $option_parameter['type'] ) {
			$valid_options = array();
			foreach ( $option_parameter['valid_options'] as $valid_option ) {
				$valid_options[$valid_option['name']] = $valid_option['title'];
			}
			$wp_customize->add_control( 'quadro_' . $option_parameter['name'], array(
				'label'		=> $option_parameter['title'],
				'section'	=> 'quadro_' . $option_parameter['tab'],
				'settings'	=> 'quadro_nayma_options['. $option_parameter['name'] . ']',
				'type'    	=> 'select',
				'choices'	=> $valid_options,
				'priority'	=> $i,
			) );
		} else if ( 'color' == $option_parameter['type'] ) {
			$wp_customize->add_control( new WP_Customize_Color_Control(
        		$wp_customize,
        		'quadro_' . $option_parameter['name'], array(
					'label'   	=> $option_parameter['title'],
					'section' 	=> 'quadro_' . $option_parameter['tab'],
					'settings'	=> 'quadro_nayma_options['. $option_parameter['name'] . ']',
					'priority'	=> $i,
				)
			) );
		} else if ( 'upload' == $option_parameter['type'] ) {
			$wp_customize->add_control( new WP_Customize_Image_Control(
	        	$wp_customize,
        		'quadro_' . $option_parameter['name'], array(
					'label'   	=> $option_parameter['title'],
					'section' 	=> 'quadro_' . $option_parameter['tab'],
					'settings'	=> 'quadro_nayma_options['. $option_parameter['name'] . ']',
					'priority'	=> $i,
				)
			) );
		} else if ( 'layout-picker' == $option_parameter['type'] ) {
			$valid_options = array();
			$valid_options = $option_parameter['valid_options'];
			$wp_customize->add_control( new Quadro_Customize_LayoutPicker_Control(
	        	$wp_customize,
	        	'quadro_' . $option_parameter['name'], array(
					'label' 		=> $option_parameter['title'],
					'section'		=> 'quadro_' . $option_parameter['tab'],
					'settings' 		=> 'quadro_nayma_options['. $option_parameter['name'] . ']',
					'choices'		=> $valid_options,
					'path' 			=> $option_parameter['path'],
					'priority'   	=> $i,
				) 
	        ) );
		} else if ( 'fonts' == $option_parameter['type'] ) {
			$wp_customize->add_control( new Quadro_Customize_Font_Control(
	        	$wp_customize,
	        	'quadro_' . $option_parameter['name'], array(
					'label' 		=> $option_parameter['title'],
					'section'		=> 'quadro_' . $option_parameter['tab'],
					'settings' 		=> 'quadro_nayma_options['. $option_parameter['name'] . ']',
					'priority'   	=> $i,
				) 
	        ) );
		}

	// Increase Priority Counter
	$i++;

	}


}
// Settings API options initilization and validation
add_action( 'customize_register', 'quadro_register_theme_customizer' );


?>