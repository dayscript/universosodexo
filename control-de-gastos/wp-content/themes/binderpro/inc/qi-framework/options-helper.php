<?php
/**
 * Quadro Theme Options Settings API
 *
 * This file implements the WordPress Settings API for the 
 * Options for the Theme.
 * 
 */

/**
 * Register Settings
 * 
 * Register $quadro_options_group array to hold all Theme options.
 */
global $quadro_options_group;
register_setting( 
	// $option_group
	$quadro_options_group, 
	// $option_name
	$quadro_options_group, 
	// $sanitize_callback
	'quadro_options_validate' 
);

/**
 * Quadro register_setting() sanitize callback
 * 
 * Validate and whitelist user-input data before updating Theme 
 * Options in the database. Only whitelisted options are passed
 * back to the database, and user-input data for all whitelisted
 * options are sanitized.
 * 
 * @link	http://codex.wordpress.org/Data_Validation	Codex Reference: Data Validation
 * 
 * @param	array	$input	Raw user-input data submitted via the Theme Settings page
 * @return	array	$input	Sanitized user-input data passed to the database
 */
function quadro_options_validate( $input ) {

	// This is the "whitelist": current settings
	$valid_input = quadro_get_options();
	// Get the array of Theme settings, by Settings Page tab
	$settingsbytab = quadro_get_settings_by_tab();
	// Get the array of option parameters
	$option_parameters = quadro_get_option_parameters();
	// Get the array of option defaults
	$option_defaults = quadro_get_option_defaults();
	// Get list of tabs
	$tabs = quadro_get_settings_page_tabs();

	// Determine what type of submit was input
	$submittype = 'submit';	
	foreach ( $tabs as $tab ) {
		$resetname = 'reset-' . $tab['name'];
		if ( ! empty( $input[$resetname] ) ) {
			$submittype = 'reset';
		}
	}

	// Determine what tab was input
	$submittab = 'general';	
	foreach ( $tabs as $tab ) {
		$submitname = 'submit-' . $tab['name'];
		$resetname = 'reset-' . $tab['name'];
		if ( ! empty( $input[$submitname] ) || ! empty($input[$resetname] ) ) {
			$submittab = $tab['name'];
		}
	}
	global $wp_customize;
	// Get settings by tab
	$tabsettings = ( isset( $wp_customize ) ? $settingsbytab['all'] : $settingsbytab[$submittab] );

	// Restore options from backup if submitted
	if ( isset($input['restore_next']) && $input['restore_next'] === true ) {
		$tabsettings = $settingsbytab['all'];
		$valid_input['restore_next'] = false;
	}

	// Loop through each tab setting
	foreach ( $tabsettings as $setting ) {
		// If no option is selected, set the default
		$valid_input[$setting] = ( ! isset( $input[$setting] ) ? $option_defaults[$setting] : $input[$setting] );

		// Get the setting details from the defaults array
		$optiondetails = $option_parameters[$setting];

		// If submit, validate/sanitize $input
		if ( 'submit' == $submittype ) {

			// Get the array of valid options, if applicable
			$valid_options = ( isset( $optiondetails['valid_options'] ) ? $optiondetails['valid_options'] : false );

			// Validate checkbox fields
			if ( 'checkbox' == $optiondetails['type'] ) {
				// If input value is set and is true, return true; otherwise return false
				$valid_input[$setting] = ( ( isset( $input[$setting] ) && true == $input[$setting] ) ? true : false );
			}
			// Validate radio button fields
			else if ( 'radio' == $optiondetails['type'] ) {
				// Only update setting if input value is in the list of valid options
				$valid_input[$setting] = ( array_key_exists( $input[$setting], $valid_options ) ? $input[$setting] : $valid_input[$setting] );
			}
			// Validate select fields
			else if ( 'select' == $optiondetails['type'] ) {
				// Only update setting if input value is in the list of valid options
				$valid_input[$setting] = ( array_key_exists( $input[$setting], $valid_options ) ? $input[$setting] : $valid_input[$setting] );
			}
			// Validate text input and textarea fields
			else if ( 'text' == $optiondetails['type'] || 'textarea' == $optiondetails['type'] || 'pass' == $optiondetails['type'] ) {
				// Validate no-HTML content
				if ( 'nohtml' == $optiondetails['sanitize'] ) {
					// Pass input data through the wp_filter_nohtml_kses filter
					$valid_input[$setting] = wp_filter_nohtml_kses( $input[$setting] );
				}
				// Validate HTML content
				if ( 'html' == $optiondetails['sanitize'] ) {
					// Pass input data through the wp_filter_kses filter
					$valid_input[$setting] = wp_kses_post( $input[$setting] );
				}
			}
			// Validate upload input fields
			else if ( 'upload' == $optiondetails['type'] ) {
				// Pass input data through the wp_filter_nohtml_kses filter
				$valid_input[$setting] = wp_filter_nohtml_kses( $input[$setting] );
			}
			// Validate color input fields
			else if ( 'color' == $optiondetails['type'] ) {
				// Pass input data through the wp_filter_kses filter
				$valid_input[$setting] = ( preg_match('/#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/', $input[$setting]) ? $input[$setting] : $option_defaults[$setting] );
				// $valid_input[$setting] = ( sanitize_hex_color($input[$setting]) ? $input[$setting] : $option_defaults[$setting] );
			}
			// Validate layout-picker fields
			else if ( 'layout-picker' == $optiondetails['type'] ) {
				// Only update setting if input value is in the list of valid options
				$valid_input[$setting] = ( array_key_exists( $input[$setting], $valid_options ) ? $input[$setting] : $valid_input[$setting] );
			}
			// Validate select fields
			else if ( 'font' == $optiondetails['type'] ) {
				$valid_fonts = quadro_get_valid_fontslist();
				$chosen_font = explode('|', $input[$setting]);
				// Only update setting if input value is in the list of valid options
				$valid_input[$setting] = ( array_key_exists( $chosen_font[0], $valid_fonts ) ? $input[$setting] : $valid_input[$setting] );
			}
			// Validate select fields
			else if ( 'number' == $optiondetails['type'] ) {
				// Only update setting if number is between defined limits
				$valid_input[$setting] = ( intval( $input[$setting] >= $optiondetails['min'] ) && intval( $input[$setting] <= $optiondetails['max'] ) ? intval( $input[$setting] ) : $option_defaults[$setting] );
			}
			// Validate repeatable fields
			else if ( 'repeatable' == $optiondetails['type'] ) {
				$valid_input[$setting] = quadro_array_map_r( 'wp_filter_kses', $input[$setting] );
			}
			// Validate backup options fields
			else if ( 'backup_options' == $optiondetails['type'] ) {
			}
			// Validate transfer options fields
			else if ( 'transfer_options' == $optiondetails['type'] ) {
			}
		}
		// If reset, reset defaults
		elseif ( 'reset' == $submittype ) {
			// Escape this Reset iteration if no_reset is set to true
			if ( isset($optiondetails['no_reset']) && $optiondetails['no_reset'] == true ) continue;
			// Set $setting to the default value
			$valid_input[$setting] = $option_defaults[$setting];
		}
	}

	return $valid_input;

}

/**
 * Globalize the variable that holds 
 * the Settings Page tab definitions
 * 
 * @global	array	Settings Page Tab definitions
 */
global $quadro_tabs;
$quadro_tabs = quadro_get_settings_page_tabs();
/**
 * Call add_settings_section() for each Settings 
 * 
 * Loop through each Theme Settings page tab, and add 
 * a new section to the Theme Settings page for each 
 * section specified for each tab.
 * 
 * @link	http://codex.wordpress.org/Function_Reference/add_settings_section	Codex Reference: add_settings_section()
 * 
 * @param	string		$sectionid	Unique Settings API identifier; passed to add_settings_field() call
 * @param	string		$title		Title of the Settings page section
 * @param	callback	$callback	Name of the callback function in which section text is output
 * @param	string		$pageid		Name of the Settings page to which to add the section; passed to do_settings_sections()
 */
foreach ( $quadro_tabs as $tab ) {
	$tabname = $tab['name'];
	$tabsections = $tab['sections'];
	foreach ( $tabsections as $section ) {
		$sectionname = $section['name'];
		$sectiontitle = $section['title'];
		// Add settings section
		add_settings_section(
			// $sectionid
			'quadro_' . $sectionname . '_section',
			// $title
			$sectiontitle,
			// $callback
			'quadro_sections_callback',
			// $pageid
			'quadro_' . $tabname . '_tab'
		);
	}
}

/**
 * Callback for add_settings_section()
 * 
 * Generic callback to output the section text
 * for each Theme settings section. 
 * 
 * @uses	quadro_get_settings_page_tabs()	Defined in /functions/options.php
 * 
 * @param	array	$section_passed	Array passed from add_settings_section()
 */
function quadro_sections_callback( $section_passed ) {
	global $quadro_tabs;
	$quadro_tabs = quadro_get_settings_page_tabs();
	foreach ( $quadro_tabs as $tabname => $tab ) {
		$tabsections = $tab['sections'];
		foreach ( $tabsections as $sectionname => $section ) {
			if ( 'quadro_' . $sectionname . '_section' == $section_passed['id'] ) {
				?>
				<p><?php echo $section['description']; ?></p>
				<?php
			}
		}
	}
}

/**
 * Globalize the variable that holds 
 * all the Theme option parameters
 * 
 * @global	array	Theme options parameters
 */
global $option_parameters;
$option_parameters = quadro_get_option_parameters();

/**
 * Call add_settings_field() for each Setting Field
 * 
 * Loop through each Theme option, and add a new 
 * setting field to the Theme Settings page for each 
 * setting.
 * 
 * @link	http://codex.wordpress.org/Function_Reference/add_settings_field	Codex Reference: add_settings_field()
 * 
 * @param	string		$settingid	Unique Settings API identifier; passed to the callback function
 * @param	string		$title		Title of the setting field
 * @param	callback	$callback	Name of the callback function in which setting field markup is output
 * @param	string		$pageid		Name of the Settings page to which to add the setting field; passed from add_settings_section()
 * @param	string		$sectionid	ID of the Settings page section to which to add the setting field; passed from add_settings_section()
 * @param	array		$args		Array of arguments to pass to the callback function
 */
foreach ( $option_parameters as $option ) {
	$optionname = $option['name'];
	$optiontitle = $option['title'];
	$optiontab = $option['tab'];
	$optionsection = $option['section'];
	$optiontype = $option['type'];
	if ( 'custom' != $optiontype ) {
		add_settings_field(
			// $settingid
			'quadro_setting_' . $optionname,
			// $title
			$optiontitle,
			// $callback
			'quadro_setting_callback',
			// $pageid
			'quadro_' . $optiontab . '_tab',
			// $sectionid
			'quadro_' . $optionsection . '_section',
			// $args
			$option
		);
	} if ( 'custom' == $optiontype ) {
		add_settings_field(
			// $settingid
			'quadro_setting_' . $optionname,
			// $title
			$optiontitle,
			//$callback
			'quadro_setting_' . $optionname,
			// $pageid
			'quadro_' . $optiontab . '_tab',
			// $sectionid
			'quadro_' . $optionsection . '_section'
		);
	}
}

/**
 * Callback for get_settings_field()
 */
function quadro_setting_callback( $option ) {
	global $quadro_options_group;
	$quadro_options = quadro_get_options();
	$option_parameters = quadro_get_option_parameters();
	$optionname = $option['name'];
	$optiontitle = $option['title'];
	$optiondescription = $option['description'];
	$fieldtype = $option['type'];
	$fieldname = $quadro_options_group . '[' . $optionname . ']';

	// Output checkbox form field markup
	if ( 'checkbox' == $fieldtype ) {
		?>
		<input type="checkbox" name="<?php echo $fieldname; ?>" <?php checked( $quadro_options[$optionname] ); ?> />
		<?php
	}
	// Output radio button form field markup
	else if ( 'radio' == $fieldtype ) {
		$valid_options = array();
		$valid_options = $option['valid_options'];
		foreach ( $valid_options as $valid_option ) {
			?>
			<span class="radio-container">
				<label>
					<input type="radio" name="<?php echo $fieldname; ?>" <?php checked( $valid_option['name'] == $quadro_options[$optionname] ); ?> value="<?php echo $valid_option['name']; ?>" />
					<?php echo $valid_option['title']; ?>
					<?php if ( $valid_option['description'] ) { ?>
						<small style="padding-left: 5px;"><em><?php echo $valid_option['description']; ?></em></small>
					<?php } ?>
				</label>
			</span>
			<?php
		}
	}
	// Output select form field markup
	else if ( 'select' == $fieldtype ) {
		$valid_options = array();
		$valid_options = $option['valid_options'];
		?>
		<select name="<?php echo $fieldname; ?>">
		<?php 
		foreach ( $valid_options as $valid_option ) {
			?>
			<option <?php selected( $valid_option['name'] == $quadro_options[$optionname] ); ?> value="<?php echo $valid_option['name']; ?>"><?php echo $valid_option['title']; ?></option>
			<?php
		}
		?>
		</select>
		<?php
	} 
	// Output color form field markup
	else if ( 'color' == $fieldtype ) {
		?>
		</select>
		<input type="text" name="<?php echo $fieldname; ?>" value="<?php echo wp_filter_nohtml_kses( $quadro_options[$optionname] ); ?>" />
		<input type="button" class="quadropickcolor button-secondary" value="<?php _e( 'Select color', 'quadro' ); ?>">
		<div id="qcolorpicker"></div>
		<?php 
	} 
	// Output text input form field markup
	else if ( 'text' == $fieldtype ) {
		?>
		<input type="text" name="<?php echo $fieldname; ?>" value="<?php echo esc_attr( $quadro_options[$optionname] ); ?>" />
		<?php
	}
	// Output textarea input form field markup
	else if ( 'textarea' == $fieldtype ) {
		?>
		<textarea name="<?php echo $fieldname; ?>"><?php echo esc_attr( $quadro_options[$optionname] ); ?></textarea>
		<?php
	}
	// Output pass input form field markup
	else if ( 'pass' == $fieldtype ) {
		?>
		<input type="password" name="<?php echo $fieldname; ?>" value="<?php echo esc_attr( $quadro_options[$optionname] ); ?>" />
		<?php
	}
	// Output upload form field markup
	else if ( 'upload' == $fieldtype ) {
		?>
		<input class="upload" id="<?php echo $fieldname; ?>" type="text" name="<?php echo $fieldname; ?>" value="<?php echo wp_filter_nohtml_kses( $quadro_options[$optionname] ); ?>" />
		<input class="upload_file_button" type="button" value="<?php _e( 'Upload file', 'quadro' ) ?>" />
		<p>Once you upload the file, click "Insert into post".</p>
		<?php
	}
	// Output layout picker form field markup
	else if ( 'layout-picker' == $fieldtype ) {
		$valid_options = array();
		$valid_options = $option['valid_options'];
		$hide_option = '';
		if ( isset($option['hide']) && $option['hide'] == true ) {
			$hide_option .= 'data-hide="hideme" ';
			$hide_option .= 'data-if=' . json_encode( $option['conditions'] );
		}
		echo '<div ' . $hide_option . '>';
		foreach ( $valid_options as $valid_option ) {
			?>
			<label class="layout-item <?php echo isset($valid_option['label-class']) ? $valid_option['label-class'] : ''; ?> <?php echo $optionname; ?>-layout">
			<input type="radio" name="<?php echo $fieldname; ?>" <?php checked( $valid_option['name'] == $quadro_options[$optionname] ); ?> value="<?php echo $valid_option['name']; ?>" <?php echo isset($valid_option['disabled']) ? $valid_option['disabled'] : ''; ?>/>
			<?php if ( $valid_option['img'] != '' ) { ?>
			<img src="<?php echo get_template_directory_uri() . $option['path'] . $valid_option['img']; ?>" alt="<?php echo $valid_option['title']; ?>">
			<?php } ?>
			<span>
			<?php echo $valid_option['title']; ?>
			<?php if ( $valid_option['description'] ) { ?>
				<span style="padding-left:5px;"><em><?php echo $valid_option['description']; ?></em></span>
			<?php } ?>
			</span>
			</label>
			<?php
		}
		echo '</div>';
	}
	// Output Repeatable Fields form field markup
	else if ( 'repeatable' == $fieldtype ) {
		$repeat_fields = array();
		$repeat_fields = $option['repeat_fields'];
		$meta = $quadro_options[$optionname];
		
		echo '<ul id="'.$fieldname.'-repeatable" class="custom_repeatable">';

		// Make it behave as an array even if it's not
		if ( !is_array($meta) ) $meta[0] = array();

		$i = 0;

		foreach ( $meta as $row ) {
			echo '<li><span class="sort hndle button">&#8597; </span> ';
			echo '<a class="repeatable-remove button" href="#">' . __('Remove', 'quadro') . '</a>';
				echo '<div class="fields-set">';
					foreach ( $repeat_fields as $repeat_field ) {
						$this_item = $repeat_field['name'];
						$this_value = ( !empty($row) && isset($row[$this_item]) ) ? esc_attr($row[$this_item]) : '';
						echo '<label><span>' . $repeat_field['title'] . '</span>';
						// Swith through possible field types
						switch ( $repeat_field['type'] ) {
							case 'text':
								echo '<input type="text" name="' . $fieldname . '['.$i.']['. $repeat_field['name'] .']" id="' . $fieldname . '" value="' . $this_value . '" size="30" />';		
								break;
							case 'textarea':
								echo '<textarea name="' . $fieldname . '['.$i.']['. $repeat_field['name'] .']" id="' . $fieldname . '" size="30" />' . $this_value . '</textarea>';
								break;
							case 'checkbox':
								?>
								<input type="checkbox" name="<?php echo $fieldname . '['.$i.']['. $repeat_field['name'] .']'; ?>" id="<?php echo $fieldname; ?>" <?php checked( $this_value == 'on' ); ?> />
								<?php
								break;
						}
						if ( $repeat_field['description'] ) { ?>
						<span style="padding-left:5px;"><em><?php echo $repeat_field['description']; ?></em></span>
						<?php }
						echo '</label>';
					}
				echo '</div>';
			echo '</li>';
			$i++;
		}

		echo '</ul>';
		echo '<a class="repeatable-add button" href="#">+ ' . $option['repeat-item'] . '</a>';
	}
	// Output font form field markup
	else if ( 'font' == $fieldtype ) {
		$valid_fonts = array();
		$valid_fonts = quadro_get_valid_fontslist(); ?>
		<select name="<?php echo $fieldname; ?>">
		<?php foreach ( $valid_fonts as $valid_font ) { ?>
			<option <?php selected( $valid_font['css-name'] . '|' . $valid_font['font-family'] == $quadro_options[$optionname] ); ?> value="<?php echo esc_attr( $valid_font['css-name'] ) . '|' . esc_attr( $valid_font['font-family'] ); ?>"><?php echo $valid_font['font-name']; ?></option>
		<?php } ?>
		</select>
		<?php
	}
	// Output number input form field markup
	else if ( 'number' == $fieldtype ) {
		?>
		<input type="number" name="<?php echo $fieldname; ?>" min="<?php echo $option['min']; ?>" max="<?php echo $option['max']; ?>" value="<?php echo wp_filter_nohtml_kses( $quadro_options[$optionname] ); ?>" />
		<?php
	}
	// Output greyed out input form field markup
	else if ( 'greyed-out' == $fieldtype ) {
		$pro_desc 	= $option['pro_desc'];
		$pro_url 	= $option['pro_url'];
		?>
		<p id="<?php echo $fieldname; ?>" class="greyed-out-option">
			<a href="<?php echo $pro_url; ?>"><?php echo $pro_desc; ?></a>
		</p>
		<?php
	}
	// Output radio button form field markup
	else if ( 'skin_select' == $fieldtype ) {
		$valid_options = array();
		$valid_options = $option['valid_options'];
		foreach ( $valid_options as $valid_option ) {
			?>
			<label>
			<input type="radio" name="<?php echo $fieldname; ?>" class="skin-select-radio" <?php checked( $valid_option['name'] == $quadro_options[$optionname] ); ?> value="<?php echo $valid_option['name']; ?>" />
			<input type="hidden" id="<?php echo $valid_option['name']; ?>-skin" value='<?php echo json_encode($valid_option['settings']); /* 100% safe - ignore theme check nag */ ?>' />
			<span>
			<?php echo $valid_option['title']; ?>
			<?php if ( $valid_option['description'] ) { ?>
				<span style="padding-left:5px;"><em><?php echo $valid_option['description']; ?></em></span>
			<?php } ?>
			</span>
			</label>
			<br />
			<?php
		}
		echo '<input type="hidden" id="skin_confirm" value="' . __('By clicking OK you will replace some of your theme options. Are you sure?', 'quadro') . '" />';
		echo '<a href="#" id="quadro_skin_button" class="button" title="' . __('Set Skin', 'quadro') . '">' . __('Set Skin', 'quadro') . '</a>';
	}
	// Output backup and restore options markup
	else if ( 'backup_options' == $fieldtype ) {
		global $quadro_options_group;
		$backup = get_option( $quadro_options_group . '_backup' );
		
		if(!isset($backup['backup_log'])) {
			$log = __('No backups yet', 'quadro');
		} else {
			$log = $backup['backup_log'];
		}
		
		$output = '';
		$output .= '<div class="backup-box">';
		$output .= '<input type="hidden" id="backup_confirm" value="' . __('Click OK to backup your current saved options.', 'quadro') . '" />';
		$output .= '<input type="hidden" id="restore_confirm" value="' . __('Warning: All of your current saved options will be replaced with the data from your last backup! Proceed?', 'quadro') . '" />';
		$output .= '<p><strong>'. __('Last Backup : ', 'quadro').'<span class="backup-log">'.$log.'</span></strong></p></div>'."\n";
		$output .= '<a href="#" id="quadro_backup_button" class="button" title="' . __('Backup Options', 'quadro') . '">' . __('Backup Options', 'quadro') . '</a>';
		$output .= '<a href="#" id="quadro_restore_button" class="button" title="' . __('Restore Options', 'quadro') . '">' . __('Restore Options', 'quadro') . '</a>';
		$output .= '</div>';

		echo $output;

	}
	// Output transfer options markup
	else if ( 'transfer_options' == $fieldtype ) {		
		// Get Theme Options
		$data = quadro_get_options();
		echo '<input type="hidden" id="import_confirm" value="' . __('Click OK to import these options. All your theme options will be replaced!', 'quadro') . '" />';
		echo '<textarea id="export_data" rows="8">'.urlencode(serialize($data)).'</textarea>'."\n";
		echo '<a href="#" id="quadro_select_button" class="button" title="' . __('Select All', 'quadro') . '">' . __('Select All', 'quadro') . '</a>';
		echo '<a href="#" id="quadro_import_button" class="button" title="' . __('Import Options', 'quadro') . '">' . __('Import Options', 'quadro') . '</a>';
	}
	// Output dummy content import options markup
	else if ( 'dummy_import' == $fieldtype ) {
		echo '<input type="hidden" id="dcontent_confirm" value="' . __('Click OK to import Dummy Content to your WordPress install. Several WP options and all your theme options will be replaced!', 'quadro') . '" />';
		echo '<input type="hidden" id="dcontent_success" value="' . __('Dummy Content successfully imported. Page needs to be refreshed.', 'quadro') . '" />';
		echo '<div class="loader-icon" style="display: none;"><i class="fa fa-spinner fa-spin"></i> ' . __('This may take a while. Please, don\'t refresh your browser till you get a nice message saying it went ok. ;)', 'quadro') . '</div>';
		echo '<a href="#" id="quadro_dcontent_button" class="button" title="' . __('Import Dummy Content', 'quadro') . '">' . __('Import Dummy Content', 'quadro') . '</a>';
	}
	// Output user check markup
	else if ( 'usercheck' == $fieldtype ) {
		echo '<a href="#" id="quadro_user_check" class="button" title="' . __('Check Now', 'quadro') . '">' . __('Check Now', 'quadro') . '</a>';
	}

	// Output the setting description
	?>
	<span class="description"><?php echo $optiondescription; ?></span>
	<?php
}


/**
 * Ajax Theme Options Functions
 * Adapted from: https://github.com/syamilmj/Options-Framework
 */
function quadro_ajax_callback()
{
	// global $quadro_options;

	$nonce = $_POST['security'];

	if (! wp_verify_nonce($nonce, 'quadro_ajax_nonce') ) die('-1');

	// Get Theme Options
	$current_options = quadro_get_options();

	$call_type = $_POST['type'];

	if ( $call_type == 'backup_options' ) {

		$backup = $current_options;
		$backup['backup_log'] = date("D, j M Y G:i:s");

		global $quadro_options_group;
		update_option($quadro_options_group . '_backup', $backup);

		die('1');
	}
	elseif ( $call_type == 'restore_options' ) {

		global $quadro_options_group;
		$data = get_option($quadro_options_group . '_backup');
		// Set value to let the validation callback know
		// it is alright to go through all the options.
		$data['restore_next'] = true;
		update_option($quadro_options_group, $data);

		die('1');
	}
	elseif ( $call_type == 'import_options' ) {

		$data = $_POST['data'];
		$data = unserialize(urldecode($data));
		// Set value to let the validation callback know
		// it is alright to go through all the options.
		$data['restore_next'] = true;
		global $quadro_options_group;
		update_option($quadro_options_group, $data);

		die('1');
	}
	elseif ( $call_type == 'dcontent_import' ) {

		// Include Dummy Content Importer functions
		require( get_template_directory() . '/inc/qi-framework/dcontent_importer.php' );
		// Run Dummy Content Import functions
		quadro_dcontent_import();

		die('1');

	}
	elseif ( $call_type == 'user_check' ) {

		$check_url = 'http://quadroideas.com/users-api-check';
		$send_for_check = array(
			'body' => array(
				'item_slug' => get_option('template'),
				'username' => $current_options['quadro_username'],
				'userpass' => $current_options['quadro_userpass'],
			)
		);
		$raw_response = wp_remote_post($check_url, $send_for_check);
		if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200)) {
			// Print the proper response now
			if ( $raw_response['body'] == 'ok' ) {
				echo __('You theme was sucesfully verified.', 'quadro');
			} else {
				echo $raw_response['body'];
			}
		} else {
			// If there was a WP error, print it
			echo $result->get_error_message();
		}

		die();

	}

	die();
}
add_action('wp_ajax_quadro_ajax_options_action', 'quadro_ajax_callback');


?>