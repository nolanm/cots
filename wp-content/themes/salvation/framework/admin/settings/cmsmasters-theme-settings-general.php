<?php 
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.0
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function salvation_options_general_tabs() {
	$cmsmasters_option = salvation_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'salvation');
	
	if ($cmsmasters_option['salvation' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'salvation');
	}
	
	if (CMSMASTERS_THEME_STYLE_COMPATIBILITY) {
		$tabs['theme_style'] = esc_attr__('Theme Style', 'salvation');
	}
	
	$tabs['header'] = esc_attr__('Header', 'salvation');
	$tabs['content'] = esc_attr__('Content', 'salvation');
	$tabs['footer'] = esc_attr__('Footer', 'salvation');
	
	return apply_filters('cmsmasters_options_general_tabs_filter', $tabs);
}


function salvation_options_general_sections() {
	$tab = salvation_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'salvation');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'salvation');
		
		break;
	case 'theme_style':
		$sections = array();
		
		$sections['theme_style_section'] = esc_attr__('Theme Design Style', 'salvation');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'salvation');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'salvation');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'salvation');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_sections_filter', $sections, $tab);
} 


function salvation_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = salvation_get_the_tab();
	}
	
	$options = array();
	
	
	$defaults = salvation_settings_general_defaults();
	
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'salvation' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_theme_layout'], 
			'choices' => array( 
				esc_html__('Liquid', 'salvation') . '|liquid', 
				esc_html__('Boxed', 'salvation') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'salvation' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_logo_type'], 
			'choices' => array( 
				esc_html__('Image', 'salvation') . '|image', 
				esc_html__('Text', 'salvation') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'salvation' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'salvation'), 
			'desc' => esc_html__('Choose your website logo image.', 'salvation'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['salvation' . '_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'salvation' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'salvation'), 
			'desc' => esc_html__('Choose logo image for retina displays. Logo for Retina displays should be twice the size of the default one.', 'salvation'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['salvation' . '_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'salvation' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'salvation'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['salvation' . '_logo_title'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'salvation' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'salvation'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['salvation' . '_logo_subtitle'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'salvation' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'salvation'), 
			'desc' => esc_html__('enable', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_logo_custom_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'salvation' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'salvation'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['salvation' . '_logo_title_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'salvation' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'salvation'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['salvation' . '_logo_subtitle_color'] 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'salvation' . '_bg_col', 
			'title' => esc_html__('Background Color', 'salvation'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => $defaults[$tab]['salvation' . '_bg_col'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'salvation' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'salvation' . '_bg_img', 
			'title' => esc_html__('Background Image', 'salvation'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'salvation'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['salvation' . '_bg_img'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'salvation' . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'salvation') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'salvation') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'salvation') . '|repeat-y', 
				esc_html__('Repeat', 'salvation') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'salvation' . '_bg_pos', 
			'title' => esc_html__('Background Position', 'salvation'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['salvation' . '_bg_pos'], 
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
			'section' => 'bg_section', 
			'id' => 'salvation' . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'salvation') . '|scroll', 
				esc_html__('Fixed', 'salvation') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'salvation' . '_bg_size', 
			'title' => esc_html__('Background Size', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'salvation') . '|auto', 
				esc_html__('Cover', 'salvation') . '|cover', 
				esc_html__('Contain', 'salvation') . '|contain' 
			) 
		);
		
		break;
	case 'theme_style':
		$options[] = array( 
			'section' => 'theme_style_section', 
			'id' => 'salvation' . '_theme_style', 
			'title' => esc_html__('Choose Theme Style', 'salvation'), 
			'desc' => '', 
			'type' => 'select_theme_style', 
			'std' => '', 
			'choices' => salvation_all_theme_styles() 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'salvation' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'salvation'), 
			'desc' => esc_html__('enable', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_fixed_header'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'salvation' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content by Default', 'salvation'), 
			'desc' => esc_html__('enable', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_header_overlaps'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'salvation' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_header_top_line'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'salvation' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'salvation'), 
			'desc' => esc_html__('pixels', 'salvation'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['salvation' . '_header_top_height'], 
			'min' => '10' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'salvation' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'salvation'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'salvation') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['salvation' . '_header_top_line_short_info'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'salvation' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_header_top_line_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'salvation') . '|none', 
				esc_html__('Top Line Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'salvation') . '|social', 
				esc_html__('Top Line Navigation', 'salvation') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'salvation' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_header_styles'], 
			'choices' => array( 
				esc_html__('Default Style', 'salvation') . '|default', 
				esc_html__('Compact Style Left Navigation', 'salvation') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'salvation') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'salvation') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'salvation' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'salvation'), 
			'desc' => esc_html__('pixels', 'salvation'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['salvation' . '_header_mid_height'], 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'salvation' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'salvation'), 
			'desc' => esc_html__('pixels', 'salvation'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['salvation' . '_header_bot_height'], 
			'min' => '20' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'salvation' . '_header_search', 
			'title' => esc_html__('Header Search', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_header_search'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'salvation' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_header_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'salvation') . '|none', 
				esc_html__('Header Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'salvation') . '|social', 
				esc_html__('Header Custom HTML', 'salvation') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'salvation' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'salvation'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'salvation') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['salvation' . '_header_add_cont_cust_html'], 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'salvation'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['salvation' . '_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'salvation') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'salvation') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'salvation') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'salvation'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['salvation' . '_archives_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'salvation') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'salvation') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'salvation') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'salvation'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['salvation' . '_search_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'salvation') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'salvation') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'salvation') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'salvation'), 
			'desc' => 'Layout for pages of non-listed types', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['salvation' . '_other_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'salvation') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'salvation') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'salvation') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_heading_alignment'], 
			'choices' => array( 
				esc_html__('Left', 'salvation') . '|left', 
				esc_html__('Right', 'salvation') . '|right', 
				esc_html__('Center', 'salvation') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_heading_scheme', 
			'title' => esc_html__('Heading Custom Color Scheme by Default', 'salvation'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['salvation' . '_heading_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_heading_bg_image_enable'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'salvation'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'salvation'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['salvation' . '_heading_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_heading_bg_repeat'], 
			'choices' => array( 
				esc_html__('No Repeat', 'salvation') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'salvation') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'salvation') . '|repeat-y', 
				esc_html__('Repeat', 'salvation') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_heading_bg_attachment'], 
			'choices' => array( 
				esc_html__('Scroll', 'salvation') . '|scroll', 
				esc_html__('Fixed', 'salvation') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_heading_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'salvation') . '|auto', 
				esc_html__('Cover', 'salvation') . '|cover', 
				esc_html__('Contain', 'salvation') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'salvation'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => $defaults[$tab]['salvation' . '_heading_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'salvation'), 
			'desc' => esc_html__('pixels', 'salvation'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['salvation' . '_heading_height'], 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_breadcrumbs'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Custom Color Scheme', 'salvation'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['salvation' . '_bottom_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_bottom_sidebar'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'salvation' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'salvation'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['salvation' . '_bottom_sidebar_layout'], 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'salvation' . '_footer_scheme', 
			'title' => esc_html__('Footer Custom Color Scheme', 'salvation'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['salvation' . '_footer_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'salvation' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_footer_type'], 
			'choices' => array( 
				esc_html__('Default', 'salvation') . '|default', 
				esc_html__('Small', 'salvation') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'salvation' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'salvation'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['salvation' . '_footer_additional_content'], 
			'choices' => array( 
				esc_html__('None', 'salvation') . '|none', 
				esc_html__('Footer Navigation', 'salvation') . '|nav', 
				esc_html__('Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'salvation') . '|social', 
				esc_html__('Custom HTML', 'salvation') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'salvation' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_footer_logo'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'salvation' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'salvation'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'salvation'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['salvation' . '_footer_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'salvation' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'salvation'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'salvation'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['salvation' . '_footer_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'salvation' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_footer_nav'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'salvation' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['salvation' . '_footer_social'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'salvation' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'salvation'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'salvation') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['salvation' . '_footer_html'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'salvation' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'salvation'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['salvation' . '_footer_copyright'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_fields_filter', $options, $tab);	
}

