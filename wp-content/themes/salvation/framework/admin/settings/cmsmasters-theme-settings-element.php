<?php 
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.0
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function salvation_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'salvation');
	
	if (class_exists('Cmsmasters_Content_Composer')) {
		$tabs['icon'] = esc_attr__('Social Icons', 'salvation');
	}
	
	$tabs['lightbox'] = esc_attr__('Lightbox', 'salvation');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'salvation');
	$tabs['error'] = esc_attr__('404', 'salvation');
	$tabs['code'] = esc_attr__('Custom Codes', 'salvation');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'salvation');
	}
	
	return apply_filters('cmsmasters_options_element_tabs_filter', $tabs);
}


function salvation_options_element_sections() {
	$tab = salvation_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'salvation');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'salvation');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'salvation');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'salvation');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'salvation');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'salvation');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'salvation');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_sections_filter', $sections, $tab);	
} 


function salvation_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = salvation_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = salvation_settings_element_defaults();
	
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'salvation' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'salvation'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => $defaults[$tab]['salvation' . '_sidebar'] 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'salvation' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'salvation'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => $defaults[$tab]['salvation' . '_social_icons'] 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'salvation'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_skin'], 
			'choices' => array( 
				esc_html__('Dark', 'salvation') . '|dark', 
				esc_html__('Light', 'salvation') . '|light', 
				esc_html__('Mac', 'salvation') . '|mac', 
				esc_html__('Metro Black', 'salvation') . '|metro-black', 
				esc_html__('Metro White', 'salvation') . '|metro-white', 
				esc_html__('Parade', 'salvation') . '|parade', 
				esc_html__('Smooth', 'salvation') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'salvation'), 
			'desc' => esc_html__('Sets path for switching windows', 'salvation'), 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_path'], 
			'choices' => array( 
				esc_html__('Vertical', 'salvation') . '|vertical', 
				esc_html__('Horizontal', 'salvation') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'salvation'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_infinite'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'salvation'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_aspect_ratio'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'salvation'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_mobile_optimizer'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'salvation'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'salvation'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_max_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'salvation'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'salvation'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_min_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'salvation'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_inner_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'salvation'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_smart_recognition'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'salvation'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_fullscreen_one_slide'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'salvation'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'salvation'), 
			'type' => 'select', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_fullscreen_viewport'], 
			'choices' => array( 
				esc_html__('Center', 'salvation') . '|center', 
				esc_html__('Fit', 'salvation') . '|fit', 
				esc_html__('Fill', 'salvation') . '|fill', 
				esc_html__('Stretch', 'salvation') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'salvation'), 
			'desc' => esc_html__('Sets buttons be available or not', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_controls_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'salvation'), 
			'desc' => esc_html__('Enable the arrow buttons', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_controls_arrows'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'salvation'), 
			'desc' => esc_html__('Sets the fullscreen button', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_controls_fullscreen'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'salvation'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_controls_thumbnail'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'salvation'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_controls_keyboard'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'salvation'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_controls_mousewheel'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'salvation'), 
			'desc' => esc_html__('Sets the swipe navigation', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_controls_swipe'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'salvation' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'salvation'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_ilightbox_controls_slideshow'] 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'salvation' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_sitemap_nav'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'salvation' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_sitemap_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'salvation' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_sitemap_tags'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'salvation' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_sitemap_month'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'salvation' . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_sitemap_pj_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'salvation' . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_sitemap_pj_tags'] 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'salvation' . '_error_color', 
			'title' => esc_html__('Text Color', 'salvation'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['salvation' . '_error_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'salvation' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'salvation'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['salvation' . '_error_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'salvation' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_error_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'salvation' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'salvation'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'salvation'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['salvation' . '_error_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'salvation' . '_error_bg_rep', 
			'title' => esc_html__('Background Repeat', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_error_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'salvation') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'salvation') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'salvation') . '|repeat-y', 
				esc_html__('Repeat', 'salvation') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'salvation' . '_error_bg_pos', 
			'title' => esc_html__('Background Position', 'salvation'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['salvation' . '_error_bg_pos'], 
			'choices' => array( 
				esc_html__('Top Left', 'salvation') . '|top left', 
				esc_html__('Top Center', 'salvation') . '|top center', 
				esc_html__('Top Right', 'salvation') . '|top right', 
				esc_html__('Center Left', 'salvation') . '|center left', 
				esc_html__('Center Center', 'salvation') . '|center center', 
				esc_html__('Center Right', 'salvation') . '|center right', 
				esc_html__('Bottom Left', 'salvation') . '|bottom left', 
				esc_html__('Bottom Center', 'salvation') . '|bottom center', 
				esc_html__('Bottom Right', 'salvation') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'salvation' . '_error_bg_att', 
			'title' => esc_html__('Background Attachment', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_error_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'salvation') . '|scroll', 
				esc_html__('Fixed', 'salvation') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'salvation' . '_error_bg_size', 
			'title' => esc_html__('Background Size', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_error_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'salvation') . '|auto', 
				esc_html__('Cover', 'salvation') . '|cover', 
				esc_html__('Contain', 'salvation') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'salvation' . '_error_search', 
			'title' => esc_html__('Search Line', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_error_search'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'salvation' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_error_sitemap_button'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'salvation' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'salvation'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['salvation' . '_error_sitemap_link'], 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'salvation' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'salvation'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['salvation' . '_custom_css'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'salvation' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'salvation'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['salvation' . '_custom_js'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'salvation' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'salvation'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['salvation' . '_gmap_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'salvation' . '_api_key', 
			'title' => esc_html__('Twitter API key', 'salvation'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['salvation' . '_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'salvation' . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'salvation'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['salvation' . '_api_secret'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'salvation' . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'salvation'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['salvation' . '_access_token'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'salvation' . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'salvation'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['salvation' . '_access_token_secret'], 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'salvation' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'salvation'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['salvation' . '_recaptcha_public_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'salvation' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'salvation'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['salvation' . '_recaptcha_private_key'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_fields_filter', $options, $tab);	
}

