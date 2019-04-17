<?php 
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version		1.0.0
 * 
 * Theme Settings Defaults
 * Created by CMSMasters
 * 
 */


/* Theme Settings General Default Values */
if (!function_exists('salvation_settings_general_defaults')) {

function salvation_settings_general_defaults($id = false) {
	$settings = array( 
		'general' => array( 
			'salvation' . '_theme_layout' => 		'liquid', 
			'salvation' . '_logo_type' => 			'image', 
			'salvation' . '_logo_url' => 			'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo.png', 
			'salvation' . '_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_retina.png', 
			'salvation' . '_logo_title' => 			get_bloginfo('name') ? get_bloginfo('name') : 'Salvation', 
			'salvation' . '_logo_subtitle' => 		'', 
			'salvation' . '_logo_custom_color' => 	0, 
			'salvation' . '_logo_title_color' => 	'', 
			'salvation' . '_logo_subtitle_color' => 	'' 
		), 
		'bg' => array( 
			'salvation' . '_bg_col' => 			'#ffffff', 
			'salvation' . '_bg_img_enable' => 	0, 
			'salvation' . '_bg_img' => 			'', 
			'salvation' . '_bg_rep' => 			'no-repeat', 
			'salvation' . '_bg_pos' => 			'top center', 
			'salvation' . '_bg_att' => 			'scroll', 
			'salvation' . '_bg_size' => 			'cover' 
		), 
		'header' => array( 
			'salvation' . '_fixed_header' => 				1, 
			'salvation' . '_header_overlaps' => 				1, 
			'salvation' . '_header_top_line' => 				0, 
			'salvation' . '_header_top_height' => 			'32', 
			'salvation' . '_header_top_line_short_info' => 	'', 
			'salvation' . '_header_top_line_add_cont' => 	'social', 
			'salvation' . '_header_styles' => 				'fullwidth', 
			'salvation' . '_header_mid_height' => 			'100', 
			'salvation' . '_header_bot_height' => 			'60', 
			'salvation' . '_header_search' => 				0, 
			'salvation' . '_header_add_cont' => 				'social', 
			'salvation' . '_header_add_cont_cust_html' => 	'' 
		), 
		'content' => array( 
			'salvation' . '_layout' => 					'fullwidth', 
			'salvation' . '_archives_layout' => 		'fullwidth', 
			'salvation' . '_search_layout' => 			'fullwidth', 
			'salvation' . '_other_layout' => 			'fullwidth', 
			'salvation' . '_heading_alignment' => 		'center', 
			'salvation' . '_heading_scheme' => 			'default', 
			'salvation' . '_heading_bg_image_enable' => 	0, 
			'salvation' . '_heading_bg_image' => 		'', 
			'salvation' . '_heading_bg_repeat' => 		'no-repeat', 
			'salvation' . '_heading_bg_attachment' => 	'scroll', 
			'salvation' . '_heading_bg_size' => 			'cover', 
			'salvation' . '_heading_bg_color' => 		'#f7f3e6', 
			'salvation' . '_heading_height' => 			'220', 
			'salvation' . '_breadcrumbs' => 				1, 
			'salvation' . '_bottom_scheme' => 			'footer', 
			'salvation' . '_bottom_sidebar' => 			0, 
			'salvation' . '_bottom_sidebar_layout' => 	'131313' 
		), 
		'footer' => array( 
			'salvation' . '_footer_scheme' => 				'footer', 
			'salvation' . '_footer_type' => 					'default', 
			'salvation' . '_footer_additional_content' => 	'social', 
			'salvation' . '_footer_logo' => 					1, 
			'salvation' . '_footer_logo_url' => 				'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer.png', 
			'salvation' . '_footer_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer_retina.png', 
			'salvation' . '_footer_nav' => 					1, 
			'salvation' . '_footer_social' => 				1, 
			'salvation' . '_footer_html' => 					'', 
			'salvation' . '_footer_copyright' => 			'Salvation' . ' &copy; ' . date('Y') . ' / ' . esc_html__('All Rights Reserved', 'salvation') 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Add Google Font */
if (!function_exists('salvation_add_google_font')) {

function salvation_add_google_font($fonts) {
	
	$fonts['Libre+Baskerville:400,400i,700'] = 'Libre Baskerville';
	
	
	return $fonts;
}

}

add_filter('salvation_google_fonts_list_filter', 'salvation_add_google_font');



/* Theme Settings Fonts Default Values */
if (!function_exists('salvation_settings_font_defaults')) {

function salvation_settings_font_defaults($id = false) {
	$settings = array( 
		'content' => array( 
			'salvation' . '_content_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Libre+Baskerville:400,400i,700', 
				'font_size' => 			'15', 
				'line_height' => 		'26', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			) 
		), 
		'link' => array( 
			'salvation' . '_link_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Libre+Baskerville:400,400i,700', 
				'font_size' => 			'15', 
				'line_height' => 		'26', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'salvation' . '_link_hover_decoration' => 	'none' 
		), 
		'nav' => array( 
			'salvation' . '_nav_title_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Libre+Baskerville:400,400i,700', 
				'font_size' => 			'16', 
				'line_height' => 		'26', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'salvation' . '_nav_dropdown_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Libre+Baskerville:400,400i,700', 
				'font_size' => 			'13', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			) 
		), 
		'heading' => array( 
			'salvation' . '_h1_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Libre+Baskerville:400,400i,700', 
				'font_size' => 			'42', 
				'line_height' => 		'60', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'salvation' . '_h2_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Libre+Baskerville:400,400i,700', 
				'font_size' => 			'30', 
				'line_height' => 		'44', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'salvation' . '_h3_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Libre+Baskerville:400,400i,700', 
				'font_size' => 			'24', 
				'line_height' => 		'34', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'salvation' . '_h4_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Libre+Baskerville:400,400i,700', 
				'font_size' => 			'18', 
				'line_height' => 		'34', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'salvation' . '_h5_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Libre+Baskerville:400,400i,700', 
				'font_size' => 			'16', 
				'line_height' => 		'30', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'salvation' . '_h6_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Libre+Baskerville:400,400i,700', 
				'font_size' => 			'14', 
				'line_height' => 		'30', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			) 
		), 
		'other' => array( 
			'salvation' . '_button_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'PT+Sans:400,400italic,700,700italic', 
				'font_size' => 			'13', 
				'line_height' => 		'46', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'salvation' . '_small_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'PT+Sans:400,400italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'22', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'salvation' . '_input_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Libre+Baskerville:400,400i,700', 
				'font_size' => 			'15', 
				'line_height' => 		'26', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			), 
			'salvation' . '_quote_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Libre+Baskerville:400,400i,700', 
				'font_size' => 			'30', 
				'line_height' => 		'52', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal' 
			) 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// WP Color Picker Palettes
if (!function_exists('cmsmasters_color_picker_palettes')) {

function cmsmasters_color_picker_palettes() {
	$palettes = array( 
		'#6a7a83', 
		'#e6c068', 
		'#ac9052', 
		'#1c2647', 
		'#ffffff', 
		'#f7f3e6', 
		'#e9e5de'
	);
	
	
	return $palettes;
}

}



// Theme Settings Color Schemes Default Colors
if (!function_exists('salvation_color_schemes_defaults')) {

function salvation_color_schemes_defaults($id = false) {
	$settings = array( 
		'default' => array( // content default color scheme
			'color' => 		'#6a7a83', 
			'link' => 		'#e6c068', 
			'hover' => 		'#ac9052', 
			'heading' => 	'#1c2647', 
			'bg' => 		'#ffffff', 
			'alternate' => 	'#f7f3e6', 
			'border' => 	'#e9e5de' 
		), 
		'header' => array( // Header color scheme
			'mid_color' => 		'#6a7a83', 
			'mid_link' => 		'#1c2647', 
			'mid_hover' => 		'#ac9052', 
			'mid_bg' => 		'#ffffff', 
			'mid_bg_scroll' => 	'#ffffff', 
			'mid_border' => 	'#e9e5de', 
			'bot_color' => 		'#6a7a83', 
			'bot_link' => 		'#1c2647', 
			'bot_hover' => 		'#ac9052', 
			'bot_bg' => 		'#ffffff', 
			'bot_bg_scroll' => 	'#ffffff', 
			'bot_border' => 	'#e9e5de' 
		), 
		'navigation' => array( // Navigation color scheme
			'title_link' => 			'#1c2647', 
			'title_link_hover' => 		'#ac9052', 
			'title_link_current' => 	'#868996', 
			'title_link_subtitle' => 	'#6a7a83', 
			'title_link_bg' => 			'rgba(255,255,255,0)', 
			'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
			'title_link_bg_current' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'#e9e5de', 
			'dropdown_text' => 			'#6a7a83', 
			'dropdown_bg' => 			'#ffffff', 
			'dropdown_border' => 		'#efebe3', 
			'dropdown_link' => 			'#1c2647', 
			'dropdown_link_hover' => 	'#ac9052', 
			'dropdown_link_subtitle' => '#6a7a83', 
			'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
			'dropdown_link_border' => 	'rgba(255,255,255,0)' 
		), 
		'header_top' => array( // Header Top color scheme
			'color' => 					'#ffffff', 
			'link' => 					'#ffffff', 
			'hover' => 					'rgba(255,255,255,0.5)', 
			'bg' => 					'rgba(49,51,59,0.15)', 
			'border' => 				'rgba(255,255,255,0.2)', 
			'title_link' => 			'#ffffff', 
			'title_link_hover' => 		'rgba(255,255,255,0.5)', 
			'title_link_bg' => 			'rgba(255,255,255,0)', 
			'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'rgba(255,255,255,0)', 
			'dropdown_bg' => 			'#31333b', 
			'dropdown_border' => 		'rgba(255,255,255,0)', 
			'dropdown_link' => 			'#8a8a8e', 
			'dropdown_link_hover' => 	'#ffffff', 
			'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
			'dropdown_link_border' => 	'rgba(255,255,255,0)' 
		), 
		'footer' => array( // Footer color scheme
			'color' => 		'rgba(255,255,255,0.5)', 
			'link' => 		'rgba(255,255,255,0.8)', 
			'hover' => 		'#e6c068', 
			'heading' => 	'rgba(255,255,255,0.7)', 
			'bg' => 		'#192531', 
			'alternate' => 	'rgba(255,255,255,0.05)', 
			'border' => 	'rgba(255,255,255,0)' 
		), 
		'first' => array( // custom color scheme 1
			'color' => 		'rgba(255,255,255,0.6)', 
			'link' => 		'#e6c068', 
			'hover' => 		'rgba(255,255,255,0.6)', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#ffffff', 
			'alternate' => 	'#f7f3e6', 
			'border' => 	'#ffffff' 
		), 
		'second' => array( // custom color scheme 2
			'color' => 		'rgba(255,255,255,0.5)', 
			'link' => 		'rgba(255,255,255,0.5)', 
			'hover' => 		'#ffffff', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#ffffff', 
			'alternate' => 	'#f7f3e6', 
			'border' => 	'rgba(255,255,255,0.3)' 
		), 
		'third' => array( // custom color scheme 3
			'color' => 		'#6a7a83', 
			'link' => 		'#1c2647', 
			'hover' => 		'#ac9052', 
			'heading' => 	'#1c2647', 
			'bg' => 		'#ffffff', 
			'alternate' => 	'#f7f3e6', 
			'border' => 	'#e9e5de' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Elements Default Values
if (!function_exists('salvation_settings_element_defaults')) {

function salvation_settings_element_defaults($id = false) {
	$settings = array( 
		'sidebar' => array( 
			'salvation' . '_sidebar' => 	'' 
		), 
		'icon' => array( 
			'salvation' . '_social_icons' => array( 
				'cmsmasters-icon-facebook-1|#|' . esc_html__('Facebook', 'salvation') . '|true||',
				'cmsmasters-icon-twitter-1|#|' . esc_html__('Twitter', 'salvation') . '|true||',
				'cmsmasters-icon-instagram-1|#|' . esc_html__('Instagram', 'salvation') . '|true||', 				 
				'cmsmasters-icon-vimeo|#|' . esc_html__('Vimeo', 'salvation') . '|true||'
			) 
		), 
		'lightbox' => array( 
			'salvation' . '_ilightbox_skin' => 					'dark', 
			'salvation' . '_ilightbox_path' => 					'vertical', 
			'salvation' . '_ilightbox_infinite' => 				0, 
			'salvation' . '_ilightbox_aspect_ratio' => 			1, 
			'salvation' . '_ilightbox_mobile_optimizer' => 		1, 
			'salvation' . '_ilightbox_max_scale' => 				1, 
			'salvation' . '_ilightbox_min_scale' => 				0.2, 
			'salvation' . '_ilightbox_inner_toolbar' => 			0, 
			'salvation' . '_ilightbox_smart_recognition' => 		0, 
			'salvation' . '_ilightbox_fullscreen_one_slide' => 	0, 
			'salvation' . '_ilightbox_fullscreen_viewport' => 	'center', 
			'salvation' . '_ilightbox_controls_toolbar' => 		1, 
			'salvation' . '_ilightbox_controls_arrows' => 		0, 
			'salvation' . '_ilightbox_controls_fullscreen' => 	1, 
			'salvation' . '_ilightbox_controls_thumbnail' => 	1, 
			'salvation' . '_ilightbox_controls_keyboard' => 		1, 
			'salvation' . '_ilightbox_controls_mousewheel' => 	1, 
			'salvation' . '_ilightbox_controls_swipe' => 		1, 
			'salvation' . '_ilightbox_controls_slideshow' => 	0 
		), 
		'sitemap' => array( 
			'salvation' . '_sitemap_nav' => 			1, 
			'salvation' . '_sitemap_categs' => 		1, 
			'salvation' . '_sitemap_tags' => 		1, 
			'salvation' . '_sitemap_month' => 		1, 
			'salvation' . '_sitemap_pj_categs' => 	1, 
			'salvation' . '_sitemap_pj_tags' => 		1 
		), 
		'error' => array( 
			'salvation' . '_error_color' => 				'#292929', 
			'salvation' . '_error_bg_color' => 			'#fcfcfc', 
			'salvation' . '_error_bg_img_enable' => 		0, 
			'salvation' . '_error_bg_image' => 			'', 
			'salvation' . '_error_bg_rep' => 			'no-repeat', 
			'salvation' . '_error_bg_pos' => 			'top center', 
			'salvation' . '_error_bg_att' => 			'scroll', 
			'salvation' . '_error_bg_size' => 			'cover', 
			'salvation' . '_error_search' => 			1, 
			'salvation' . '_error_sitemap_button' => 	1, 
			'salvation' . '_error_sitemap_link' => 		'' 
		), 
		'code' => array( 
			'salvation' . '_custom_css' => 			'', 
			'salvation' . '_custom_js' => 			'', 
			'salvation' . '_gmap_api_key' => 		'', 
			'salvation' . '_api_key' => 				'', 
			'salvation' . '_api_secret' => 			'', 
			'salvation' . '_access_token' => 		'', 
			'salvation' . '_access_token_secret' => 	'' 
		), 
		'recaptcha' => array( 
			'salvation' . '_recaptcha_public_key' => 	'', 
			'salvation' . '_recaptcha_private_key' => 	'' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Single Posts Default Values
if (!function_exists('salvation_settings_single_defaults')) {

function salvation_settings_single_defaults($id = false) {
	$settings = array( 
		'post' => array( 
			'salvation' . '_blog_post_layout' => 		'r_sidebar', 
			'salvation' . '_blog_post_title' => 			1, 
			'salvation' . '_blog_post_date' => 			1, 
			'salvation' . '_blog_post_cat' => 			1, 
			'salvation' . '_blog_post_author' => 		1, 
			'salvation' . '_blog_post_comment' => 		1, 
			'salvation' . '_blog_post_tag' => 			1, 
			'salvation' . '_blog_post_like' => 			1, 
			'salvation' . '_blog_post_nav_box' => 		1, 
			'salvation' . '_blog_post_nav_order_cat' => 	0, 
			'salvation' . '_blog_post_share_box' => 		1, 
			'salvation' . '_blog_post_author_box' => 	1, 
			'salvation' . '_blog_more_posts_box' => 		'popular', 
			'salvation' . '_blog_more_posts_count' => 	'3', 
			'salvation' . '_blog_more_posts_pause' => 	'5' 
		), 
		'project' => array( 
			'salvation' . '_portfolio_project_title' => 			1, 
			'salvation' . '_portfolio_project_details_title' => 	esc_html__('Project details', 'salvation'), 
			'salvation' . '_portfolio_project_date' => 			1, 
			'salvation' . '_portfolio_project_cat' => 			1, 
			'salvation' . '_portfolio_project_author' => 		1, 
			'salvation' . '_portfolio_project_comment' => 		1, 
			'salvation' . '_portfolio_project_tag' => 			0, 
			'salvation' . '_portfolio_project_like' => 			1, 
			'salvation' . '_portfolio_project_link' => 			0, 
			'salvation' . '_portfolio_project_share_box' => 		1, 
			'salvation' . '_portfolio_project_nav_box' => 		1, 
			'salvation' . '_portfolio_project_nav_order_cat' => 	0, 
			'salvation' . '_portfolio_project_author_box' => 	0, 
			'salvation' . '_portfolio_more_projects_box' => 		'popular', 
			'salvation' . '_portfolio_more_projects_count' => 	'4', 
			'salvation' . '_portfolio_more_projects_pause' => 	'5', 
			'salvation' . '_portfolio_project_slug' => 			'project', 
			'salvation' . '_portfolio_pj_categs_slug' => 		'pj-categs', 
			'salvation' . '_portfolio_pj_tags_slug' => 			'pj-tags' 
		), 
		'profile' => array( 
			'salvation' . '_profile_post_title' => 			1, 
			'salvation' . '_profile_post_details_title' => 	esc_html__('Profile details', 'salvation'), 
			'salvation' . '_profile_post_cat' => 			1, 
			'salvation' . '_profile_post_comment' => 		1, 
			'salvation' . '_profile_post_like' => 			1, 
			'salvation' . '_profile_post_nav_box' => 		1, 
			'salvation' . '_profile_post_nav_order_cat' => 	0, 
			'salvation' . '_profile_post_share_box' => 		0, 
			'salvation' . '_profile_post_slug' => 			'profile', 
			'salvation' . '_profile_pl_categs_slug' => 		'pl-categs' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Project Puzzle Proportion */
if (!function_exists('salvation_project_puzzle_proportion')) {

function salvation_project_puzzle_proportion() {
	return 1;
}

}



/* Theme Image Thumbnails Size */
if (!function_exists('salvation_get_image_thumbnail_list')) {

function salvation_get_image_thumbnail_list() {
	$list = array( 
		'cmsmasters-small-thumb' => array( 
			'width' => 		70, 
			'height' => 	70, 
			'crop' => 		true 
		), 
		'cmsmasters-square-thumb' => array( 
			'width' => 		300, 
			'height' => 	300, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Square', 'salvation') 
		), 
		'cmsmasters-blog-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	420, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Masonry Blog', 'salvation') 
		), 
		'cmsmasters-project-grid-thumb' => array( 
			'width' => 		360, 
			'height' => 	360, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project Grid', 'salvation') 
		), 
		'cmsmasters-project-thumb' => array( 
			'width' => 		580, 
			'height' => 	580, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project', 'salvation') 
		), 
		'cmsmasters-project-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Project', 'salvation') 
		), 
		'post-thumbnail' => array( 
			'width' => 		860, 
			'height' => 	500, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Featured', 'salvation') 
		), 
		'cmsmasters-masonry-thumb' => array( 
			'width' => 		860, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry', 'salvation') 
		), 
		'cmsmasters-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	650, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Full', 'salvation') 
		), 
		'cmsmasters-project-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	700, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project Full', 'salvation') 
		), 
		'cmsmasters-full-masonry-thumb' => array( 
			'width' => 		1160, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Full', 'salvation') 
		) 
	);
	
	
	return $list;
}

}



/* Project Post Type Registration Rename */
if (!function_exists('salvation_project_labels')) {

function salvation_project_labels() {
	return array( 
		'name' => 					esc_html__('Projects', 'salvation'), 
		'singular_name' => 			esc_html__('Project', 'salvation'), 
		'menu_name' => 				esc_html__('Projects', 'salvation'), 
		'all_items' => 				esc_html__('All Projects', 'salvation'), 
		'add_new' => 				esc_html__('Add New', 'salvation'), 
		'add_new_item' => 			esc_html__('Add New Project', 'salvation'), 
		'edit_item' => 				esc_html__('Edit Project', 'salvation'), 
		'new_item' => 				esc_html__('New Project', 'salvation'), 
		'view_item' => 				esc_html__('View Project', 'salvation'), 
		'search_items' => 			esc_html__('Search Projects', 'salvation'), 
		'not_found' => 				esc_html__('No projects found', 'salvation'), 
		'not_found_in_trash' => 	esc_html__('No projects found in Trash', 'salvation') 
	);
}

}

// add_filter('cmsmasters_project_labels_filter', 'salvation_project_labels');


if (!function_exists('salvation_pj_categs_labels')) {

function salvation_pj_categs_labels() {
	return array( 
		'name' => 					esc_html__('Project Categories', 'salvation'), 
		'singular_name' => 			esc_html__('Project Category', 'salvation') 
	);
}

}

// add_filter('cmsmasters_pj_categs_labels_filter', 'salvation_pj_categs_labels');


if (!function_exists('salvation_pj_tags_labels')) {

function salvation_pj_tags_labels() {
	return array( 
		'name' => 					esc_html__('Project Tags', 'salvation'), 
		'singular_name' => 			esc_html__('Project Tag', 'salvation') 
	);
}

}

// add_filter('cmsmasters_pj_tags_labels_filter', 'salvation_pj_tags_labels');



/* Profile Post Type Registration Rename */
if (!function_exists('salvation_profile_labels')) {

function salvation_profile_labels() {
	return array( 
		'name' => 					esc_html__('Profiles', 'salvation'), 
		'singular_name' => 			esc_html__('Profiles', 'salvation'), 
		'menu_name' => 				esc_html__('Profiles', 'salvation'), 
		'all_items' => 				esc_html__('All Profiles', 'salvation'), 
		'add_new' => 				esc_html__('Add New', 'salvation'), 
		'add_new_item' => 			esc_html__('Add New Profile', 'salvation'), 
		'edit_item' => 				esc_html__('Edit Profile', 'salvation'), 
		'new_item' => 				esc_html__('New Profile', 'salvation'), 
		'view_item' => 				esc_html__('View Profile', 'salvation'), 
		'search_items' => 			esc_html__('Search Profiles', 'salvation'), 
		'not_found' => 				esc_html__('No Profiles found', 'salvation'), 
		'not_found_in_trash' => 	esc_html__('No Profiles found in Trash', 'salvation') 
	);
}

}

// add_filter('cmsmasters_profile_labels_filter', 'salvation_profile_labels');


if (!function_exists('salvation_pl_categs_labels')) {

function salvation_pl_categs_labels() {
	return array( 
		'name' => 					esc_html__('Profile Categories', 'salvation'), 
		'singular_name' => 			esc_html__('Profile Category', 'salvation') 
	);
}

}

// add_filter('cmsmasters_pl_categs_labels_filter', 'salvation_pl_categs_labels');

