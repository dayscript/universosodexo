jQuery(document).ready(function($){

	"use strict";
	

	/**
	 * Adding functionality for Upload input boxes in Custom Fields and Options
	 * New Code (new media manager)
	 * 
	 * IMPORTANT: Needs wp_enqueue_media(); anywhere in the theme to work in other
	 * places than regular post editor. We are calling it as soon as we initiate the
	 * QI Framework.
	 */
	var uploadID = '';
	var _custom_media = true,
      _orig_send_attachment = wp.media.editor.send.attachment;

  	jQuery(document).on('click', '.upload_file_button', function() {
  		uploadID = jQuery(this).prev('input');
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = jQuery(this);
		// var id = button.attr('id').replace('_button', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
				// jQuery("#"+id).val(attachment.url);
				uploadID.val(attachment.url);
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		}
		wp.media.editor.open(button);
		return false;
	});

	jQuery('.add_media').on('click', function(){
		_custom_media = false;
	});
	
	// End Custom fields Upload functionality


	/**
	 * Adding functionality for repeatable input boxes
	 */

	jQuery('.repeatable-add').click(function() {
		var field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
		var fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
		jQuery('input, textarea', field).val('').attr('name', function(index, name) {
			return name.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;
			});
		});
		field.insertAfter(fieldLocation, jQuery(this).closest('td'));
		return false;
	});

	jQuery('.repeatable-remove').click(function(){
		if ( jQuery('.custom_repeatable .fields-set').length != 1 ) {
			jQuery(this).parent().remove();
		} else {
			// If there is only one set, just clean it up
			jQuery(this).parent().find('input').val('');
		}
		return false;
	});

	jQuery('.custom_repeatable').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort',
		update: function() {
			// Renumber Array indexes when re ordered
			jQuery('.custom_repeatable li .fields-set').each(function(rowIndex){
				jQuery(this).find('input[name], textarea[name]').each(function(){
					var selectName;
					selectName = jQuery(this).attr('name');
					selectName = selectName.replace(/\[[0-9]+\]/g, '['+rowIndex+']');
					jQuery(this).attr('name',selectName);
				});
			});
		}
	});
	// End repeatable section


	// Enables Color Picker for Admin Options
	jQuery('.quadropickcolor').click( function(e) {
		var colorPicker = jQuery(this).next('div'),
			input = jQuery(this).prev('input');
		jQuery(colorPicker).farbtastic(input);
		colorPicker.children().show();
		e.preventDefault();
		jQuery(document).mousedown( function() {
			jQuery(colorPicker).children().hide();
			jQuery('#bg-color').trigger('change');
		});
	});


	/**
	 * Post selection and pickers functionality
	 */

	// Enables Posts Select functionality in custom fields
	jQuery('.posts-adder').click(function(){
		// Grab all selected
		var $selPosts = jQuery(this).prev('.posts-picker').find('option:selected'),
			$listContainer = jQuery(this).next();
		// Map them and construct icon prefixed li's with Posts' ID as data-id
		$selPosts.map(function(){
			// Get current posts list and check if current post is already there
			var $currentPosts = $listContainer.next().val().split(', ');
			if ( jQuery.inArray( jQuery(this).val(), $currentPosts ) == -1 ) {
				// If it isn't, add it
				$listContainer.append('<li data-id="' + jQuery(this).val() + '"><label class="li-mover"><i class="remove-post fa fa-times"></i> ' + jQuery(this).text() + '</label></li>');	
			}
		});

		// Grabs current li's data IDs and puts them into the hidden field
		var $postsIds = '';
		$listContainer.find('li').each(function(){
			$postsIds += jQuery(this).data('id') + ', ';
		});
		if ( $postsIds !== '' ) {
			$listContainer.next().val($postsIds);
		}
	});


	// Enables Posts Select functionality in custom fields on double click
	jQuery('.posts-picker option').dblclick(function() {
		// Grab all selected
		var $selPosts = jQuery(this),
			$listContainer = $selPosts.parent().siblings('ul');
		// Map them and construct icon prefixed li's with Posts' ID as data-id
		$selPosts.map(function(){
			// Get current posts list and check if current post is already there
			var $currentPosts = $listContainer.next().val().split(', ');
			if ( jQuery.inArray( jQuery(this).val(), $currentPosts ) == -1 ) {
				// If it isn't, add it
				$listContainer.append('<li data-id="' + jQuery(this).val() + '"><label class="li-mover"><i class="remove-post fa fa-times"></i> ' + jQuery(this).text() + '</label></li>')	
			}
		});

		// Grabs current li's data IDs and puts them into the hidden field
		var $postsIds = '';
		$listContainer.find('li').each(function(){
			$postsIds += jQuery(this).data('id') + ', ';
		});
		if ( $postsIds != '' ) {
			$listContainer.next().val($postsIds);
		}
	});


	// Enables Posts Sorting in Posts Select fields
	jQuery('.sel-posts-container').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.li-mover',
		update: function (e, ui) {
			// Grabs current li's data IDs and puts them into the hidden field
			var $postsIds = '';
			jQuery(this).find('li').each(function(){
				$postsIds += jQuery(this).data('id') + ', ';
			});
			jQuery(this).next().val($postsIds);
		}
	});

	// Enables Remover for posts list items
	jQuery(document).on("click", '.remove-post', function(e){
		// Grab parent variable position before we swipe this li out
		var $containerUl = jQuery(this).parents('ul');
		// Remove this Parent li
		jQuery(this).parents('li').remove();
		// Grabs current li's data IDs and puts them into the hidden field
		var $postsIds = '';		
		$containerUl.find('li').each(function(){
			$postsIds += jQuery(this).data('id') + ', ';
		});
		$containerUl.next().val($postsIds);
	});


	// Removes empty select boxes when nothing to show
	jQuery('.posts-picker').each(function(){
		if ( ! jQuery(this).find('option').length ) {
			jQuery(this).hide();
			jQuery(this).next('.posts-adder').hide();
		}
	});

	
	/**
	 * Handles selection boxes appearing when chosing selection methods
	 */
	
	// First, hide the selectors by default and show already chosen selector
	var allSelectors = jQuery('.qcustom-selector, .qtax-selector, .qformat-selector').parents('tr');
	
	jQuery('select[id*=_method]').each(function(){
		jQuery(this).parents('tr').siblings('tr').find('.qcustom-selector, .qtax-selector, .qformat-selector').parents('tr').hide();
		jQuery(this).parents('tr').siblings('tr').find('.q' + jQuery(this).val() + '-selector').parents('tr').fadeIn();
	})
	// Then, detect change on selection method and show the proper select box
	jQuery('select[id*=_method]').change(function(){
		jQuery(this).parents('tr').siblings('tr').find('.qcustom-selector, .qtax-selector, .qformat-selector').parents('tr').hide();
		jQuery(this).parents('tr').siblings('tr').find('.q' + jQuery(this).val() + '-selector').parents('tr').fadeIn();
	})


	/**
	 * Little handler to make Greyed Out custom fields take full width space
	 */
	jQuery('#quadro_page_greyed_out').parent('td').prev('th').hide();


	/**
	 * Ajax Function for Options Backup and Restore
	 */
	jQuery('#quadro_backup_button').live('click', function(){
	
		var answerText = jQuery('#backup_confirm').val(),
			answer = confirm(answerText);
		
		if ( answer ) {
			var clickedObject = jQuery(this),
				clickedID = jQuery(this).attr('id'),
				nonce = jQuery('#quadro_nonce').val();
		
			var data = {
				action: 'quadro_ajax_options_action',
				type: 'backup_options',
				security: nonce
			};
						
			jQuery.post(ajaxurl, data, function(response) {				
				//check nonce
				if( response == -1 ) { 
					//failed
				} else {
					window.setTimeout(function(){
						location.reload();
					}, 1000);
				}
			});
			
		}
		
	return false;
					
	}); 
	
	//restore button
	jQuery('#quadro_restore_button').live('click', function(){
	
		var answerText = jQuery('#restore_confirm').val(),
			answer = confirm(answerText);
		
		if ( answer ){
					
			var nonce = jQuery('#quadro_nonce').val();
		
			var data = {
				action: 'quadro_ajax_options_action',
				type: 'restore_options',
				security: nonce
			};
						
			jQuery.post(ajaxurl, data, function(response) {			
				//check nonce
				if( response == -1 ) { 
					//failed
				} else {
					window.setTimeout(function(){
						location.reload();                        
					}, 1000);
					// jQuery('#restore_post').val('yes');
					// jQuery('#quadro_options_form').submit();
				}
			});
	
		}
	
	return false;
					
	});


	/**
	 * Select All Btn For Textareas
	 */
	jQuery('#quadro_select_button').live('click', function(){
		jQuery(this).prev('textarea').select();
		return false;
	});


	/**
	 * Ajax Transfer (Import/Export) Option
	 */
	jQuery('#quadro_import_button').live('click', function(){
	
		var answerText = jQuery('#import_confirm').val(),
			answer = confirm(answerText);
		
		if ( answer ) {
					
			var nonce = jQuery('#quadro_nonce').val();
			
			var import_data = jQuery('#export_data').val();

			var data = {
				action: 'quadro_ajax_options_action',
				type: 'import_options',
				security: nonce,
				data: import_data
			};
						
			jQuery.post(ajaxurl, data, function(response) {
				//check nonce
				if ( response == -1 ) { 
					//failed
				} else 	{
					window.setTimeout(function(){
						location.reload();
					}, 1000);
				}
			});
			
		}
		
		return false;
					
	});


	/**
	 * Ajax Dummy Content Install Option
	 */
	jQuery('#quadro_dcontent_button').live('click', function(){
	
		var answerText = jQuery('#dcontent_confirm').val(),
			answerSuccess = jQuery('#dcontent_success').val(),
			answer = confirm(answerText);
		
		if ( answer ) {
					
			var nonce = jQuery('#quadro_nonce').val(),
				loaderImg = jQuery('.loader-icon');
				loaderImg.fadeIn();

			var data = {
				action: 'quadro_ajax_options_action',
				type: 'dcontent_import',
				security: nonce,
			};

			jQuery.post(ajaxurl, data, function(response) {
				//check nonce
				if ( response == -1 ) { 
					// Failed
					loaderImg.fadeOut();
					alert('There was an error with the import. Please try to import it directly from the xml file located in your theme folder.');
				} else 	{
					loaderImg.fadeOut(function(){
						var answerSuccessResp = confirm(answerSuccess);
						if (answerSuccessResp){
							window.setTimeout(function(){
								location.reload();
							}, 1000);
						}
					});
				}
			});
			
		}
		
		return false;
					
	});


	/**
	 * Ajax Function for QuadroIdeas.com User check
	 */
	jQuery('#quadro_user_check').live('click', function(){
		
		var nonce = jQuery('#quadro_nonce').val();
	
		var data = {
			action: 'quadro_ajax_options_action',
			type: 'user_check',
			security: nonce
		};
					
		jQuery.post(ajaxurl, data, function(response) {				
			alert(response);
		});
		
	return false;
					
	});


	/**
	 * Ajax Set Skin Option
	 */
	jQuery('#quadro_skin_button').live('click', function(){

		var answerText = jQuery('#skin_confirm').val(),
			answer = confirm(answerText);
		
		if (answer){
	
			var nonce = jQuery('#quadro_nonce').val();

			var sel_option = jQuery('.skin-select-radio:checked').val();
			
			var selected_skin = jQuery.parseJSON(jQuery('#'+sel_option+'-skin').val());
		
			var data = {
				action: 'quadro_ajax_options_action',
				type: 'set_skin',
				security: nonce,
				data: selected_skin
			};
						
			jQuery.post(ajaxurl, data, function(response) {
				//check nonce
				if(response==-1){ 
					//failed
				} else 	{
					alert(response);
					window.setTimeout(function(){
						location.reload();
					}, 1000);
				}
			});
			
		}
		
		return false;
					
	});


	// Show or Hide Modules Metaboxes depending on Selected Modules
	// ************************************************************
	if ( jQuery('#mod-type-metabox').length ) {
		
		var moduleSelector = jQuery('#quadro_mod_type');

		// First, get selected type on loading and display metabox
		var selType = moduleSelector.val();
		jQuery('#mod-' + selType + '-qi-type-metabox').addClass('selected-type-metabox');
		if ( selType == 'slider' || selType == 'revolution' || selType == 'featured' ) { 
			jQuery('#postdivrich').hide(); 
		}

		// Reset Shown Module on change
		moduleSelector.change(function(){
			var selType = moduleSelector.val();
			jQuery('.selected-type-metabox').fadeOut().removeClass('selected-type-metabox');
			jQuery('#mod-' + selType + '-qi-type-metabox').fadeIn().addClass('selected-type-metabox');
			if ( selType == 'slider' || selType == 'revolution' || selType == 'featured' ) { 
				jQuery('#postdivrich').hide();
			} else {
				jQuery('#postdivrich').show();
			}
		});

	}


	// Show or Hide Specific Theme Options depending on selected theme options
	// ************************************************************
	
	function showHideFields() {
		// Function to loop through all hidden fields and show/hide if conditions met
		jQuery('*[data-hide="hideme"]').each(function(){
			var showConditions = jQuery(this).data('if'),
				conditionsCount = showConditions.length;

			jQuery.each(showConditions, function(index, item) {
				if ( jQuery('[name="quadro_binder_options['+item['id']+']"]'+item['type']).val() == item['val'] ) conditionsCount = conditionsCount - 1;
			});

			// We substracted 1 per each met condition, so we'll
			// show the option field if the count has reached 0.
			// Hide it, if the count isn't 0.
			if ( conditionsCount == 0 ) {
				jQuery(this).parents('tr').show();
			} else {
				jQuery(this).parents('tr').hide();
			}
		});
	}

	// Show or hide fields if conditions met
	showHideFields();

	// Trigger conditions check once form changes
	jQuery('#quadro_options_form').change(function(){
		showHideFields();
	})


	// Show or Hide Template Metaboxes depending on Selected Template
	// ************************************************************
	if ( jQuery('#page_template').length ) {
		
		// First, get selected type on loading and display metabox
		var selTemplate = jQuery('#page_template').val();
		selTemplate = selTemplate.substring(selTemplate.indexOf('-') +1).split('.');
		jQuery('#' + selTemplate[0] + '-qi-template-metabox').addClass('selected-template-metabox');

		// Reset Shown Module on change
		jQuery("#page_template").live('change',function(){
			var selTemplate = jQuery(this).val();
			selTemplate = selTemplate.substring(selTemplate.indexOf('-') +1).split('.');
			jQuery('.selected-template-metabox').removeClass('selected-template-metabox');
			jQuery('#' + selTemplate[0] + '-qi-template-metabox').addClass('selected-template-metabox');
		});

	}


	// Togles Pattern Selector display in Custom Fields
	jQuery('#pattern-picker-opener').click(function(){
		jQuery('#pattern-selector').toggle();
	});


	// Togles Icon Selector display in Custom Fields
	jQuery('.icon-picker-opener').click(function(){
		jQuery(this).next('.icon-selector').toggle();
	});


	/**
	 * Adds Portfolio Sortable Functionality in backend
	 */
	jQuery('#sortable-table tbody').sortable({
		
		axis: 'y',
		handle: '.draggable',
		placeholder: 'ui-state-highlight',
		forcePlaceholderSize: true,
		update: function(event, ui) {
		
			var theOrder = jQuery(this).sortable('toArray');

			var data = {
				action: 'quadro_update_portfolio_order',
				postType: jQuery(this).attr('data-post-type'),
				order: theOrder
			};

			jQuery.post(ajaxurl, data);
			
			jQuery('.order-updated').fadeTo('slow', 1).animate({opacity: 1.0}, 600).fadeTo('slow', 0);
			
		}
		
	}).disableSelection();


	// Dismisses Welcome Panel message
	jQuery('.welc-msg-dismiss').click(function(){
		jQuery('#qi-welcome-panel').fadeOut();
		return false;
	});


	/**
	 * Handling Mailchimp Form Option-Cookies to avoid
	 * showing it again after the user has already
	 * submitted the form once successfully.
	 */
	if ( jQuery('#mc_embed_signup').length ) {
		var mcForm = document.getElementById('mce-success-response');
		if( window.addEventListener ) {
			// Normal browsers
			mcForm.addEventListener('DOMSubtreeModified', mailchimpSent, false);
		} else
		if ( window.attachEvent ) {
			// IE
			mcForm.attachEvent('DOMSubtreeModified', mailchimpSent);
		}
	}

	function mailchimpSent() {

		// Store cookie for this user stating it has already
		// submitted the form once successfully
		var nonce = jQuery('#mailchimp_nonce').val();
		var data = {
			action: 'quadro_mailchimp_submit_check',
			security: nonce
		};
		// Call function via ajax
		jQuery.post(ajaxurl, data, function(response) {});
			
	}

});