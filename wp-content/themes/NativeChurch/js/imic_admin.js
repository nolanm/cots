/*
 *
 *	Admin jQuery Functions
 *	------------------------------------------------
 *	Imic Framework
 * 	Copyright Imic 2014 - http://imicreation.com
 *
 */
jQuery(window).load(function() {
    jQuery('#imic_number_of_post_cat').parent().parent().find('.rwmb-clone').each(function() {
        jQuery(this).find('.rwmb-button').hide();
    })
    jQuery('#imic_number_of_post_cat').parent().parent().find('.add-clone').hide();
jQuery('#wpseo_meta.postbox').show();
});
jQuery(function(jQuery) {
//SELECTED TEMPLATE BASED META BOX DISPLAY
    function show_hide_metabox() {
        if ((jQuery('body').hasClass('post-php')||(jQuery('body').hasClass('post-new-php')))&&jQuery('body').hasClass('post-type-page')) {
            var metaID = jQuery('#page_template').val().slice(0, -4);
            metaboxName = metaID.substring(metaID.indexOf('-') + 1);
            jQuery('#normal-sortables > div').each(function(i, k)
            {
                if (jQuery(this).attr('id').indexOf(metaboxName) != -1)
                {
                    jQuery(this).show();
                    
                }
                else
                {
                    jQuery(this).hide();
                }
				var imic_galleries_background_image_description = jQuery("#imic_galleries_background_image_description").parent().parent();
				imic_galleries_background_image_description.hide();
                  if (metaboxName == 'h-second') {
                    jQuery('#template-home3').show();
		}
		if((metaboxName=='home')||(metaboxName=='h-second')||(metaboxName=='h-third')) {
			jQuery('#post_page_meta_box').hide();
		}
		else{
                    jQuery('#post_page_meta_box').show();
                }
                if (metaboxName != 'def') {
                    jQuery('#select_sidebar').show();
                }
                   if (metaboxName == 'h-third') {
                    jQuery('#template-home1,#template-home3,#template-home5,#template-home7').show();
						imic_galleries_background_image_description.show();
		}
                var imic_custom_all_event_url=jQuery('#imic_custom_all_event_url').parent().parent();
				
				
                imic_custom_all_event_url.hide();
                 if (metaboxName == 'h-third') {
                   imic_custom_all_event_url.show();
		}
		jQuery('#events-taxonomies').hide();
		jQuery('#post-taxonomies').hide();
		jQuery('#gallery-taxonomies').hide();
		jQuery('#post-taxonomies-blog').hide();
		if((metaboxName == 'events')||(metaboxName == 'events-timeline')||(metaboxName == 'events_grid')) {
                   jQuery('#events-taxonomies').show();
		}
		if((metaboxName == 'blog-full-width')||(metaboxName == 'blog-masonry')||(metaboxName == 'blog-timeline')) {
                   jQuery('#post-taxonomies').show();
		}
		if((metaboxName == 'gallery-filter')||(metaboxName == 'gallery-masonry')||(metaboxName == 'gallery-pagination')) {
                   jQuery('#gallery-taxonomies').show();
		}
		if(metaboxName == 'def') {
			jQuery('#post-taxonomies-blog').show();
		}
		})
        }
    }
    show_hide_metabox();
    // META FIELD DISPLAY ON TEMPLATE SELECT
    jQuery('#page_template').on('change', function() {
        show_hide_metabox();
    });
     // Hide Revslider Metabox
    jQuery('#mymetabox_revslider_0').hide();
    // Map Display
    var $imic_contact_map_display = jQuery('#imic_contact_map_display');
    function map_display() {
        var $imic_contact_bottom_box = jQuery('#imic_contact_map_box_code').parent().parent();
        if ($imic_contact_map_display.val() == "no") {
            $imic_contact_bottom_box.css('display', 'none');
        }
        else {
            $imic_contact_bottom_box.css('display', 'block');
        }
    }
    map_display();
    $imic_contact_map_display.change(function() {
        map_display();
    });
    // slider display for home
    var $imic_Choose_slider_display = jQuery('#imic_Choose_slider_display');
    function slider_display() {
        var $imic_slider_image = jQuery('#imic_slider_image_description').parent().parent();
		var $imic_slider_speed = jQuery('#imic_slider_speed').parent().parent();
        var $imic_slider_pagination = jQuery('#imic_slider_pagination').parent().parent();
        var $imic_slider_auto_slide = jQuery('#imic_slider_auto_slide').parent().parent();
        var $imic_slider_direction_arrows = jQuery('#imic_slider_direction_arrows').parent().parent();
        var $imic_slider_effects = jQuery('#imic_slider_effects').parent().parent();
        var $imic_select_revolution_from_list = jQuery('#imic_select_revolution_from_list').parent().parent();
        
        if ($imic_Choose_slider_display.val() == 0) {
            $imic_slider_image.show();
			$imic_slider_speed.show();
            $imic_slider_pagination.show();
            $imic_slider_auto_slide.show();
            $imic_slider_direction_arrows.show();
            $imic_slider_effects.show();
            $imic_select_revolution_from_list.hide();
        }
        else {
             $imic_slider_image.hide();
			 $imic_slider_speed.hide();
            $imic_slider_pagination.hide();
            $imic_slider_auto_slide.hide();
            $imic_slider_direction_arrows.hide();
            $imic_slider_effects.hide();
            $imic_select_revolution_from_list.show();
        }
    }
    slider_display();
    $imic_Choose_slider_display.change(function() {
        slider_display();
    });
     // going on events section
    var $imic_going_on_events = jQuery('#imic_going_on_events');
    function going_on_events() {
        var $going_on_events_title = jQuery('#imic_custom_going_on_events_title').closest('.rwmb-field');
        var $going_on_events_to_show_on = jQuery('#imic_going_on_events_to_show_on').closest('.rwmb-field');
      if ($imic_going_on_events.val() =='2') {
           $going_on_events_title.show();
           $going_on_events_to_show_on.show();
          }
        else {
           $going_on_events_title.hide();
           $going_on_events_to_show_on.hide();
        }
    }
    going_on_events();
    $imic_going_on_events.change(function() {
        going_on_events();
    });
     // Event Registration section
    var $imic_event_registration_status = jQuery('#imic_event_registration_status');
    function imic_event_registration() {
        var $imic_event_registration_fee = jQuery('#imic_event_registration_fee').closest('.rwmb-field');
        if ($imic_event_registration_status.val() =='1') {
           $imic_event_registration_fee.show();
        }
     else {
       $imic_event_registration_fee.hide();
      }
     }    
    imic_event_registration();
    $imic_event_registration_status.change(function() {
    imic_event_registration();
    });
    // category display for home
    var $imic_latest_sermon_events_to_show_on = jQuery('#imic_latest_sermon_events_to_show_on');
    function category_display() {
        var $event_taxonomy = jQuery('#imic_advanced_event_taxonomy').closest('.rwmb-taxonomy_advanced-wrapper');
        var $sermons_taxonomy = jQuery('#imic_advanced_sermons_category').closest('.rwmb-taxonomy_advanced-wrapper');
        var $imic_going_on_events = jQuery('#imic_going_on_events').closest('.rwmb-field');
		var $imic_custom_message = jQuery('#imic_custom_text_message').closest('.rwmb-textarea-wrapper');
		var $imic_button_url = jQuery('#imic_all_event_sermon_url').closest('.rwmb-text-wrapper');
		var $imic_going_event_title = jQuery('#imic_custom_going_on_events_title').closest('.rwmb-text-wrapper');
      if ($imic_latest_sermon_events_to_show_on.val() =='letest_event') {
            $event_taxonomy.show();
            $imic_going_on_events.show();
            $sermons_taxonomy.hide();
			$imic_custom_message.hide();
			$imic_going_event_title.show();
            going_on_events();
        }
        else if($imic_latest_sermon_events_to_show_on.val() == 'letest_sermon'){
             $event_taxonomy.hide();
             $imic_going_on_events.hide();
			 $imic_custom_message.hide();
			 $imic_going_event_title.hide();
            $sermons_taxonomy.show();
        }
		else {
			$event_taxonomy.hide();
             $imic_going_on_events.hide();
            $sermons_taxonomy.hide();
			$imic_button_url.hide();
			$imic_going_event_title.hide();
			$imic_custom_message.show();
		}
    }
    category_display();
    $imic_latest_sermon_events_to_show_on.change(function() {
        category_display();
    });
	//header options for page/post
	var $imic_pages_choose_slider_display = jQuery('#imic_pages_Choose_slider_display');
    function pages_slider_display() {
        var $imic_pages_slider_image = jQuery('#imic_pages_slider_image_description').parent().parent();
		var $imic_pages_slider_speed = jQuery('#imic_pages_slider_speed').parent().parent();
        var $imic_pages_slider_pagination = jQuery('#imic_pages_slider_pagination').parent().parent();
        var $imic_pages_slider_auto_slide = jQuery('#imic_pages_slider_auto_slide').parent().parent();
        var $imic_pages_slider_direction_arrows = jQuery('#imic_pages_slider_direction_arrows').parent().parent();
        var $imic_pages_slider_effects = jQuery('#imic_pages_slider_effects').parent().parent();
        var $imic_pages_select_revolution_from_list = jQuery('#imic_pages_select_revolution_from_list').parent().parent();
		var $imic_banner_image = jQuery('#imic_header_image_description').parent().parent();
		var $imic_pages_slider_height = jQuery('#imic_pages_slider_height').parent().parent();
        
        if ($imic_pages_choose_slider_display.val() == 1) {
            $imic_pages_slider_image.show();
				$imic_pages_slider_speed.show();
            $imic_pages_slider_pagination.show();
            $imic_pages_slider_auto_slide.show();
            $imic_pages_slider_direction_arrows.show();
            $imic_pages_slider_effects.show();
			 $imic_pages_slider_height.show();
            $imic_pages_select_revolution_from_list.hide();
			 $imic_banner_image.hide();
        }
		else if($imic_pages_choose_slider_display.val() == 0) {
			  $imic_banner_image.show();
			  $imic_pages_slider_speed.hide();
			  $imic_pages_slider_image.hide();
            $imic_pages_slider_pagination.hide();
            $imic_pages_slider_auto_slide.hide();
            $imic_pages_slider_direction_arrows.hide();
            $imic_pages_slider_effects.hide();
            $imic_pages_select_revolution_from_list.hide();
			$imic_pages_slider_height.hide();
		}
        else {
             $imic_pages_slider_image.hide();
			 $imic_pages_slider_speed.hide();
            $imic_pages_slider_pagination.hide();
            $imic_pages_slider_auto_slide.hide();
            $imic_pages_slider_direction_arrows.hide();
            $imic_pages_slider_effects.hide();
			$imic_banner_image.hide();
			$imic_pages_slider_height.hide();
            $imic_pages_select_revolution_from_list.show();
        }
    }
    pages_slider_display();
    $imic_pages_choose_slider_display.change(function() {
        pages_slider_display();
    });
    jQuery('.repeatable-add').click(function() {
        field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
        fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
        jQuery('input', field).val('').attr('name', function(index, name) {
            return name.replace(/(\d+)/, function(fullMatch, n) {
                return Number(n) + 1;
            });
        })
        field.insertAfter(fieldLocation, jQuery(this).closest('td'))
        return false;
    });
    jQuery('.repeatable-remove').click(function() {
        jQuery(this).parent().remove();
        return false;
    });
    var imic_gallery_meta_box = jQuery('#gallery_meta_box');
    var imic_gallery_video_url = jQuery('#imic_gallery_video_url').parent().parent();
    var imic_gallery_link_url = jQuery('#imic_gallery_link_url').parent().parent();
    var imic_gallery_slider_images = jQuery('#imic_gallery_images_description').parent().parent();
    var imic_gallery_audio = jQuery('#imic_gallery_audio').parent().parent();
     var imic_gallery_audio_display = jQuery('#imic_gallery_audio_display').parent().parent();
    var imic_gallery_audio_uploaded = jQuery('#imic_gallery_uploaded_audio_description').parent().parent();
   var imic_gallery_slider_all =jQuery('#imic_gallery_slider_pagination,#imic_gallery_slider_speed,#imic_gallery_slider_auto_slide,#imic_gallery_slider_direction_arrows,#imic_gallery_slider_effects').parent().parent();
   function checkPostFormat(radio_val) {
        if (jQuery.trim(radio_val) == 'video') {
            imic_gallery_meta_box.show();
            imic_gallery_link_url.hide();
            imic_gallery_slider_images.hide();
            imic_gallery_audio_display.hide();
            imic_gallery_audio_uploaded.hide();
            imic_gallery_slider_all.hide();
            imic_gallery_audio.hide();
            imic_gallery_video_url.show();
            imic_gallery_meta_box.find('#imic_gallery_slider_image_description').closest('.rwmb-field').show();
        }
        else if (jQuery.trim(radio_val) == 'link') {
            imic_gallery_meta_box.show();
            imic_gallery_link_url.show();
            imic_gallery_slider_images.hide();
            imic_gallery_audio.hide();
            imic_gallery_audio_display.hide();
            imic_gallery_slider_all.hide();
            imic_gallery_audio_uploaded.hide();
            imic_gallery_video_url.hide();
            imic_gallery_meta_box.find('#imic_gallery_slider_image_description').closest('.rwmb-field').show();
        }
        else if (jQuery.trim(radio_val) == 'gallery') {
            imic_gallery_meta_box.show();
            imic_gallery_link_url.hide();
            imic_gallery_slider_images.show();
            imic_gallery_audio.hide();
            imic_gallery_audio_display.hide();
            imic_gallery_audio_uploaded.hide();
            imic_gallery_slider_all.show();
            imic_gallery_video_url.hide();
            imic_gallery_meta_box.find('#imic_gallery_slider_image_description').closest('.rwmb-field').hide();
        }
         else if (jQuery.trim(radio_val) == 'audio') {
            imic_gallery_meta_box.show();
            imic_gallery_link_url.hide();
            imic_gallery_slider_images.hide();
            imic_gallery_video_url.hide();
            imic_gallery_slider_all.hide();
            imic_gallery_audio.show();
            imic_gallery_audio_display.show();
            imic_gallery_audio_uploaded.show();
            imic_gallery_meta_box.find('#imic_gallery_slider_image_description').closest('.rwmb-field').show();
            audio_display();
        }
        else {
            imic_gallery_meta_box.hide();
            
        }
    }
    jQuery('.post-type-gallery .post-format,.post-type-post .post-format').click(function() {
        if (jQuery(this).is(':checked'))
        {
            var radio_val = jQuery(this).val();
            checkPostFormat(radio_val)
        }
    })
    jQuery('.post-type-gallery,.post-type-post').find('.post-format').each(function() {
        if (jQuery(this).is(':checked'))
        {
            var radio_val = jQuery(this).val();
            checkPostFormat(radio_val);
            
        }
    })
    // Audio Display Post
    var $imic_audio_display_display = jQuery('#imic_gallery_audio_display');
    function audio_display() {
      $imic_audio_display_display = jQuery('#imic_gallery_audio_display');
          var imic_gallery_audio = jQuery('#imic_gallery_audio').parent().parent();
          var imic_gallery_audio_uploaded = jQuery('#imic_gallery_uploaded_audio_description').parent().parent();
             if ($imic_audio_display_display.val() == "1") {
            imic_gallery_audio.show();
            imic_gallery_audio_uploaded.hide();
        }
 if ($imic_audio_display_display.val() =="2") {
            imic_gallery_audio.hide();
            imic_gallery_audio_uploaded.show();
        }
    }
     $imic_audio_display_display.change(function() {
        audio_display();
    });
    //Megamenu
     var megamenu = jQuery('.megamenu');
    megamenu.each(function() {
        checkCheckbox(jQuery(this));
    });
    megamenu.click(function() {
        checkCheckbox(jQuery(this));
    })
    function checkCheckbox(mega_check) {
        if (mega_check.is(':checked')) {
            mega_check.parents('.custom_menu_data').find('.enabled_mega_data').show();
        }
        else {
            mega_check.parents('.custom_menu_data').find('.enabled_mega_data').hide();
        }
    }
    var menu_post_type = jQuery('.enabled_mega_data .menu-post-type');
    function show_hide_post() {
        menu_post_type.each(function() {
            if (jQuery(this).val() == '') {
                jQuery(this).parents('.enabled_mega_data').find('.menu-post-id-comma').parent().parent().show();
                jQuery(this).parents('.enabled_mega_data').find('.menu-post').parent().parent().hide();
            }
            else {
                jQuery(this).parents('.enabled_mega_data').find('.menu-post-id-comma').parent().parent().hide();
                jQuery(this).parents('.enabled_mega_data').find('.menu-post').parent().parent().show();
            }
        })
    }
    show_hide_post();
    menu_post_type.on('change', function() {
        show_hide_post();
    });
    
// Sermon pdf Display
    var $imic_sermons_pdf_upload_option = jQuery('#imic_sermons_pdf_upload_option');
    function sermon_pdf_display() {
      var $pdf =jQuery('#imic_sermons_Pdf_description').closest('.rwmb-file_advanced-wrapper');
      var $pdf_url =jQuery('#imic_sermons_pdf_by_url').closest('.rwmb-url-wrapper');
        if ($imic_sermons_pdf_upload_option.val() ==2) {
            $pdf.hide();
            $pdf_url.show();
        }
        else {
            $pdf.show();
            $pdf_url.hide();
        }
    }
    sermon_pdf_display();
    $imic_sermons_pdf_upload_option.change(function() {
        sermon_pdf_display();
    });
    // Sermon Audio Display
    var $imic_sermons_audio_upload = jQuery('#imic_sermons_audio_upload');
    function sermon_audio_display() {
      var $audio =jQuery('#imic_sermons_audio_description').closest('.rwmb-file_advanced-wrapper');
      var $audio_url =jQuery('#imic_sermons_url_audio').closest('.rwmb-url-wrapper');
        if ($imic_sermons_audio_upload.val() ==2) {
            $audio.hide();
            $audio_url.show();
        }
        else {
            $audio.show();
            $audio_url.hide();
        }
    }
    sermon_audio_display();
    $imic_sermons_audio_upload.change(function() {
        sermon_audio_display();
    });
    jQuery("#staff_meta_box").on('click','#Social',function(){
	var text_name = jQuery(this).find('input[type=text]').attr('name');
        jQuery( "body" ).data("text_name", text_name );
        jQuery("label#Social input").removeClass("fb");
	jQuery("label#Social").addClass("sfb");
	name = jQuery("label.sfb input").addClass("fb");
	var label = jQuery('label[for="'+jQuery(this).attr('id')+'"]');
	if(jQuery("#socialicons").length == 0) {
	jQuery("#staff_meta_box").append("<div id=\"socialicons\"><div class=\"inside\"><div class=\"rwmb-meta-box\"><div class=\"rwmb-field rwmb-select-wrapper\"><div class=\"rwmb-label\"><label for=\"select_social_icons\">Select Social Icons</label></div><div class=\"rwmb-input\"><select class=\"rwmb-select\" id=\"social\"><option value\"select\">Select</option><option value=\"facebook\">facebook</option><option value=\"bitbucket\">bitbucket</option><option value=\"dribbble\">dribbble</option><option value=\"dropbox\">dropbox</option><option value=\"flickr\">flickr</option><option value=\"foursquare\">foursquare</option><option value=\"github\">github</option><option value=\"gittip\">gittip</option><option value=\"google-plus\">google-plus</option><option value=\"instagram\">instagram</option><option value=\"linkedin\">linkedin</option><option value=\"pagelines\">pagelines</option><option value=\"pinterest\">pinterest</option><option value=\"skype\">skype</option><option value=\"tumblr\">tumblr</option><option value=\"twitter\">twitter</option><option value=\"vimeo-square\">vimeo-square</option><option value=\"youtube\">youtube</option></select></div></div></div></div></div></div>");
	}
});
jQuery("#staff_meta_box").on('change','div#socialicons select#social',function(text_id){
		text_name=jQuery( "body" ).data( "text_name" );
                jQuery("#socialicons").remove();
                jQuery("label[id='Social']").find('input[name$="'+text_name+'"]').val(this.value);
//		jQuery( 'input[name$="'+text_name+'"]').val(this.value);
		jQuery("input").removeClass("fb");
	});
        jQuery("label[for='imic_social_icon_list']").click(function(e){
            e.preventDefault();
        });
});
jQuery('input#imic_cause_amount_received').attr('disabled','disabled');