<?php 
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.0
 * 
 * Timetable Admin Settings
 * Created by CMSMasters
 * 
 */


/* Single Settings */
// Settings Names
function salvation_timetable_option_name($cmsmasters_option_name, $tab) {
	if ($tab == 'tt_event') {
		$cmsmasters_option_name = 'cmsmasters_options_' . 'salvation' . CMSMASTERS_THEME_STYLE . '_single_tt_event';
	}
	
	
	return $cmsmasters_option_name;
}

add_filter('cmsmasters_option_name_filter', 'salvation_timetable_option_name', 10, 2);


// Add Settings
function salvation_timetable_add_global_options($cmsmasters_option_names) {
	$cmsmasters_option_names[] = array( 
		'cmsmasters_options_' . 'salvation' . CMSMASTERS_THEME_STYLE . '_single_tt_event', 
		salvation_options_single_fields('tt_event') 
	);
	
	
	return $cmsmasters_option_names;
}

add_filter('cmsmasters_add_global_options_filter', 'salvation_timetable_add_global_options');


// Get Settings
function salvation_timetable_get_global_options($cmsmasters_option_names) {
	array_push($cmsmasters_option_names, 'cmsmasters_options_' . 'salvation' . CMSMASTERS_THEME_STYLE . '_single_tt_event');
	
	
	return $cmsmasters_option_names;
}

add_filter('cmsmasters_get_global_options_filter', 'salvation_timetable_get_global_options');
add_filter('cmsmasters_settings_export_filter', 'salvation_timetable_get_global_options');


// Single Posts Settings
function salvation_timetable_options_single_tabs($tabs) {
	$tabs['tt_event'] = esc_attr__('Timetable Event', 'salvation');
	
	
	return $tabs;
}

add_filter('cmsmasters_options_single_tabs_filter', 'salvation_timetable_options_single_tabs');


function salvation_timetable_options_single_sections($sections, $tab) {
	if ($tab == 'tt_event') {
		$sections = array();
		
		$sections['tt_event_section'] = esc_attr__('Timetable Event Options', 'salvation');
	}
	
	
	return $sections;
}

add_filter('cmsmasters_options_single_sections_filter', 'salvation_timetable_options_single_sections', 10, 2);


function salvation_timetable_options_single_fields($options, $tab) {
	if ($tab == 'tt_event') {
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => 'salvation' . '_tt_event_hours', 
			'title' => esc_html__('Event Hours', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => 'salvation' . '_tt_event_hours_title', 
			'title' => esc_html__('Event Hours Title', 'salvation'), 
			'desc' => esc_html__('Enter a event hours block title', 'salvation'), 
			'type' => 'text', 
			'std' => 'Event Hours', 
			'class' => ''
		);
		
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => 'salvation' . '_tt_event_details_title', 
			'title' => esc_html__('Event Details Title', 'salvation'), 
			'desc' => esc_html__('Enter a event details block title', 'salvation'), 
			'type' => 'text', 
			'std' => 'Event Details', 
			'class' => ''
		);
		
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => 'salvation' . '_tt_event_cat', 
			'title' => esc_html__('Event Categories', 'salvation'), 
			'desc' => esc_html__('show', 'salvation'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
	}
	
	
	return $options;
}

add_filter('cmsmasters_options_single_fields_filter', 'salvation_timetable_options_single_fields', 10, 2);

