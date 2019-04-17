<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Sermons
 * @version		1.0.5
 * 
 * CMSMasters Sermons Settings Filter
 * Created by CMSMasters
 * 
 */


/* Single Settings */
// Settings Names
function cmsmasters_sermons_option_name($cmsmasters_option_name, $tab) {
	if ($tab == 'sermon') {
		$cmsmasters_option_name = 'cmsmasters_options_' . CMSMASTERS_SERMONS_ACTIVE_THEME . '_single_sermon';
	}
	
	
	return $cmsmasters_option_name;
}

add_filter('cmsmasters_option_name_filter', 'cmsmasters_sermons_option_name', 10, 2);


// Add Settings
function cmsmasters_sermons_add_global_options($cmsmasters_option_names) {
	$cmsmasters_option_names[] = array( 
		'cmsmasters_options_' . CMSMASTERS_SERMONS_ACTIVE_THEME . '_single_sermon', 
		cmsmasters_sermons_options_single_fields('', 'sermon') 
	);
	
	
	return $cmsmasters_option_names;
}

add_filter('cmsmasters_add_global_options_filter', 'cmsmasters_sermons_add_global_options');


// Get Settings
function cmsmasters_sermons_get_global_options($cmsmasters_option_names) {
	array_push($cmsmasters_option_names, 'cmsmasters_options_' . CMSMASTERS_SERMONS_ACTIVE_THEME . '_single_sermon');
	
	
	return $cmsmasters_option_names;
}

add_filter('cmsmasters_get_global_options_filter', 'cmsmasters_sermons_get_global_options');
add_filter('cmsmasters_settings_export_filter', 'cmsmasters_sermons_get_global_options');


// Single Posts Settings
function cmsmasters_sermons_options_single_tabs($tabs) {
	$tabs['sermon'] = esc_html__('Sermon', 'cmsmasters-sermons');
	
	
	return $tabs;
}

add_filter('cmsmasters_options_single_tabs_filter', 'cmsmasters_sermons_options_single_tabs');


function cmsmasters_sermons_options_single_sections($sections, $tab) {
	if ($tab == 'sermon') {
		$sections = array();
		
		$sections['sermon_section'] = esc_attr__('Sermons Options', 'cmsmasters-sermons');
	}
	
	
	return $sections;
}

add_filter('cmsmasters_options_single_sections_filter', 'cmsmasters_sermons_options_single_sections', 10, 2);


function cmsmasters_sermons_options_single_fields($options, $tab) {
	if (!is_array($options)) {
		$options = array();
	}
	
	
	if ($tab == 'sermon') {
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_layout', 
			'title' => esc_html__('Sermon Layout Type', 'cmsmasters-sermons'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'cmsmasters-sermons') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'cmsmasters-sermons') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'cmsmasters-sermons') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_title', 
			'title' => esc_html__('Sermon Title', 'cmsmasters-sermons'), 
			'desc' => esc_html__('show', 'cmsmasters-sermons'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_date', 
			'title' => esc_html__('Sermon Date', 'cmsmasters-sermons'), 
			'desc' => esc_html__('show', 'cmsmasters-sermons'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_cat', 
			'title' => esc_html__('Sermon Categories', 'cmsmasters-sermons'), 
			'desc' => esc_html__('show', 'cmsmasters-sermons'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_tag', 
			'title' => esc_html__('Sermon Tags', 'cmsmasters-sermons'), 
			'desc' => esc_html__('show', 'cmsmasters-sermons'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_author', 
			'title' => esc_html__('Sermon Author', 'cmsmasters-sermons'), 
			'desc' => esc_html__('show', 'cmsmasters-sermons'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_comment', 
			'title' => esc_html__('Sermon Comments', 'cmsmasters-sermons'), 
			'desc' => esc_html__('show', 'cmsmasters-sermons'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_like', 
			'title' => esc_html__('Sermon Likes', 'cmsmasters-sermons'), 
			'desc' => esc_html__('show', 'cmsmasters-sermons'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_nav_box', 
			'title' => esc_html__('Sermon Navigation Box', 'cmsmasters-sermons'), 
			'desc' => esc_html__('show', 'cmsmasters-sermons'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_share_box', 
			'title' => esc_html__('Sharing Box', 'cmsmasters-sermons'), 
			'desc' => esc_html__('show', 'cmsmasters-sermons'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_author_box', 
			'title' => esc_html__('About Author Box', 'cmsmasters-sermons'), 
			'desc' => esc_html__('show', 'cmsmasters-sermons'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_more_posts_box', 
			'title' => esc_html__('More Sermons Box', 'cmsmasters-sermons'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'popular', 
			'choices' => array( 
				esc_html__('Show Related Sermons', 'cmsmasters-sermons') . '|related', 
				esc_html__('Show Popular Sermons', 'cmsmasters-sermons') . '|popular', 
				esc_html__('Show Recent Sermons', 'cmsmasters-sermons') . '|recent', 
				esc_html__('Hide More Sermons Box', 'cmsmasters-sermons') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_more_posts_count', 
			'title' => esc_html__('More Sermons Box Items Number', 'cmsmasters-sermons'), 
			'desc' => esc_html__('sermons', 'cmsmasters-sermons'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_more_posts_pause', 
			'title' => esc_html__('More Sermons Slider Pause Time', 'cmsmasters-sermons'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'cmsmasters-sermons'), 
			'type' => 'number', 
			'std' => '1', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_post_slug', 
			'title' => esc_html__('Sermon Slug', 'cmsmasters-sermons'), 
			'desc' => esc_html__('Enter a page slug that should be used for your sermons single item', 'cmsmasters-sermons'), 
			'type' => 'text', 
			'std' => 'sermon', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_srm_categs_slug', 
			'title' => esc_html__('Sermon Categories Slug', 'cmsmasters-sermons'), 
			'desc' => esc_html__('Enter page slug that should be used on sermons categories archive page', 'cmsmasters-sermons'), 
			'type' => 'text', 
			'std' => 'srm-categs', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_srm_tags_slug', 
			'title' => esc_html__('Sermon Tags Slug', 'cmsmasters-sermons'), 
			'desc' => esc_html__('Enter page slug that should be used on sermons tags archive page', 'cmsmasters-sermons'), 
			'type' => 'text', 
			'std' => 'srm-tags', 
			'class' => '' 
		);
	}
	
	
	return $options;
}

add_filter('cmsmasters_options_single_fields_filter', 'cmsmasters_sermons_options_single_fields', 10, 2);

