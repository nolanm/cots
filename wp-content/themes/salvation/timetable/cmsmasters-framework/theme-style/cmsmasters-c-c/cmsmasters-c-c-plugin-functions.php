<?php
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.0
 * 
 * Timetable Content Composer Functions 
 * Created by CMSMasters
 * 
 */


/* Register JS Scripts */
function salvation_timetable_register_c_c_scripts() {
	global $pagenow;
	
	
	$cmsmasters_option = salvation_get_global_options();
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('salvation-timetable-extend', get_template_directory_uri() . '/timetable/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/js/cmsmasters-c-c-plugin-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('salvation-timetable-extend', 'cmsmasters_timetable_shortcodes', array( 
			'timetable_events' => 								salvation_timetable_events(), 
			'timetable_event_categories' => 					salvation_timetable_event_categories(), 
			'timetable_hour_categories' => 						salvation_timetable_hour_categories(), 
			'timetable_columns' => 								salvation_timetable_columns(), 
			'timetable_title' =>								esc_html__('Timetable', 'salvation'), 
			'timetable_field_event_title' =>					esc_html__('Events', 'salvation'), 
			'timetable_field_event_descr' =>					esc_html__('Select the events that are to be displayed in timetable', 'salvation'), 
			'timetable_field_event_descr_note' =>				esc_html__('Hold the CTRL key to select multiple items', 'salvation'), 
			'timetable_field_event_category_title' =>			esc_html__('Event categories', 'salvation'), 
			'timetable_field_event_category_descr' =>			esc_html__('Select the events categories that are to be displayed in timetable', 'salvation'), 
			'timetable_field_event_category_descr_note' =>		esc_html__('Hold the CTRL key to select multiple items', 'salvation'), 
			'timetable_field_hour_category_title' =>			esc_html__('Hour categories', 'salvation'), 
			'timetable_field_hour_category_descr' =>			esc_html__('Select the hour categories (if defined for existing event hours) for events that are to be displayed in timetable', 'salvation'), 
			'timetable_field_hour_category_descr_note' =>		esc_html__('Hold the CTRL key to select multiple items', 'salvation'), 
			'timetable_field_columns_title' =>					esc_html__('Columns', 'salvation'), 
			'timetable_field_columns_descr' =>					esc_html__('Select the columns that are to be displayed in timetable', 'salvation'), 
			'timetable_field_columns_descr_note' =>				esc_html__('Hold the CTRL key to select multiple items', 'salvation'), 
			'timetable_field_measure_title' =>					esc_html__('Hour measure', 'salvation'), 
			'timetable_field_measure_descr' =>					esc_html__('Choose hour measure for event hours', 'salvation'), 
			'timetable_field_measure_choice_hour' =>			esc_html__('Hour (1h)', 'salvation'), 
			'timetable_field_measure_choice_half_hour' =>		esc_html__('Half hour (30min)', 'salvation'), 
			'timetable_field_measure_choice_quarter_hour' =>	esc_html__('Quarter hour (15min)', 'salvation'), 
			'timetable_field_filter_style_title' =>				esc_html__('Filter style', 'salvation'), 
			'timetable_field_filter_style_descr' =>				esc_html__('Choose between dropdown menu and tabs for event filtering', 'salvation'), 
			'timetable_field_filter_style_choice_dropdown_list' =>	esc_html__('Dropdown list', 'salvation'), 
			'timetable_field_filter_style_choice_tabs' =>		esc_html__('Tabs', 'salvation'), 
			'timetable_field_filter_kind_title' =>				esc_html__('Filter kind', 'salvation'), 
			'timetable_field_filter_kind_descr' =>				esc_html__('Choose between filtering by events or events categories', 'salvation'), 
			'timetable_field_filter_kind_choice_event' =>		esc_html__('By event', 'salvation'), 
			'timetable_field_filter_kind_choice_event_category' =>	esc_html__('By event category', 'salvation'), 
			'timetable_field_filter_label_title' =>				esc_html__('Filter label', 'salvation'), 
			'timetable_field_filter_label_descr' =>				esc_html__('Specify text label for all events', 'salvation'), 
			'timetable_field_filter_label_def' =>				esc_html__('All Events', 'salvation'), 
			'timetable_field_time_format_title' =>				esc_html__('Time format', 'salvation'), 
			'timetable_field_time_format_choice_custom' =>		esc_html__('Custom', 'salvation'), 
			'timetable_field_time_format_custom_title' =>		esc_html__('Custom Time Format', 'salvation'), 
			'timetable_field_hide_all_events_view_title' =>		esc_html__('Hide \'All Events\' view', 'salvation'), 
			'timetable_field_hide_hours_column_title' =>		esc_html__('Hide first (hours) column', 'salvation'), 
			'timetable_field_show_end_hour_title' =>			esc_html__('Show end hour in first (hours) column', 'salvation'), 
			'timetable_field_event_layout_title' =>				esc_html__('Event block layout', 'salvation'), 
			'timetable_field_event_layout_descr' =>				esc_html__('Select one of the available event block layouts', 'salvation'), 
			'timetable_field_event_layout_choice_type' =>		esc_html__('Type', 'salvation'), 
			'timetable_field_hide_empty_title' =>				esc_html__('Hide empty rows', 'salvation'), 
			'timetable_field_disable_event_url_title' =>		esc_html__('Disable event url', 'salvation'), 
			'timetable_field_text_align_title' =>				esc_html__('Text align', 'salvation'), 
			'timetable_field_text_align_descr' =>				esc_html__('Specify text align in timetable event block', 'salvation'), 
			'timetable_field_id_title' =>						esc_html__('Id', 'salvation'), 
			'timetable_field_id_descr' =>						esc_html__('Assign a unique identifier to a timetable if you use more than one table on a single page', 'salvation'), 
			'timetable_field_id_descr_note' =>					esc_html__('Otherwise, leave this field blank', 'salvation'), 
			'timetable_field_row_height_title' =>				esc_html__('Row height', 'salvation'), 
			'timetable_field_desktop_list_view_title' =>		esc_html__('Display list view on desktop', 'salvation'), 
			'timetable_field_desktop_list_view_descr' =>		esc_html__('Enable to display list view in desktop mode.', 'salvation'), 
			'timetable_field_event_description_responsive_title' =>	esc_html__('Event description in responsive mode', 'salvation'), 
			'timetable_field_event_description_responsive_descr' =>	esc_html__('Specify if you want to display event description in mobile mode.', 'salvation'), 
			'timetable_field_choice_none' =>					esc_html__('None', 'salvation'), 
			'timetable_field_choice_description_1' =>			esc_html__('Only Description 1', 'salvation'), 
			'timetable_field_choice_description_2' =>			esc_html__('Only Description 2', 'salvation'), 
			'timetable_field_choice_description_1_and_description_2' =>	esc_html__('Description 1 and Description 2', 'salvation'), 
			'timetable_field_collapse_event_hours_responsive_title' =>	esc_html__('Collapse event hours in responsive mode', 'salvation'), 
			'timetable_field_collapse_event_hours_responsive_descr' =>	esc_html__('Enable to collapse event hours in responsive mode, can be expanded on click', 'salvation'), 
			'timetable_field_colors_responsive_mode_title' =>	esc_html__('Use colors in responsive mode', 'salvation'), 
			'timetable_field_colors_responsive_mode_descr' =>	esc_html__('Enable to use colors defined in shortcode and in event settings while in responsive mode.', 'salvation'), 
			'timetable_field_export_to_pdf_button_title' =>		esc_html__('Export to PDF button', 'salvation'), 
			'timetable_field_export_to_pdf_button_descr' =>		esc_html__('Enable to show \'Generate PDF\' button', 'salvation'), 
			'timetable_field_generate_pdf_label_title' =>		esc_html__('Generate PDF label', 'salvation'), 
			'timetable_field_generate_pdf_label_descr' =>		esc_html__('Specify text label for \'Generate PDF\' button', 'salvation'), 
			'timetable_field_generate_pdf_label_def' =>			esc_html__('Generate PDF', 'salvation'), 
			'timetable_field_show_booking_button_title' =>		esc_html__('Show booking button', 'salvation'), 
			'timetable_field_show_booking_button_descr' =>		esc_html__('Specify if the \'Book now\' button should be displayed', 'salvation'), 
			'timetable_field_show_booking_button_choice_no' =>	esc_html__('No', 'salvation'), 
			'timetable_field_show_booking_button_choice_always' =>	esc_html__('Always', 'salvation'), 
			'timetable_field_show_booking_button_choice_on_hover' =>	esc_html__('On hover', 'salvation'), 
			'timetable_field_show_available_slots_title' =>		esc_html__('Show available slots', 'salvation'), 
			'timetable_field_show_available_slots_descr' =>		esc_html__('Specify if the \'available slots\' information should be displayed', 'salvation'), 
			'timetable_field_show_available_slots_choice_no' =>	esc_html__('No', 'salvation'), 
			'timetable_field_show_available_slots_choice_always' =>	esc_html__('Always', 'salvation'), 
			'timetable_field_booking_label_title' =>			esc_html__('Booking label', 'salvation'), 
			'timetable_field_booking_label_descr' =>			esc_html__('Specify text label for booking button', 'salvation'), 
			'timetable_field_booking_label_def' =>				esc_html__('Book now', 'salvation'), 
			'timetable_field_booked_label_title' =>				esc_html__('Booked label', 'salvation'), 
			'timetable_field_booked_label_descr' =>				esc_html__('Specify text label for already booked event', 'salvation'), 
			'timetable_field_booked_label_def' =>				esc_html__('Booked', 'salvation'), 
			'timetable_field_unavailable_label_title' =>		esc_html__('Unavailable label', 'salvation'), 
			'timetable_field_unavailable_label_descr' =>		esc_html__('Specify text label for unavailable event', 'salvation'), 
			'timetable_field_unavailable_label_def' =>			esc_html__('Unavailable', 'salvation'), 
			'timetable_field_booking_popup_label_title' =>		esc_html__('Popup Booking Label', 'salvation'), 
			'timetable_field_booking_popup_label_descr' =>		esc_html__('Specify text label for booking button in the popup window', 'salvation'), 
			'timetable_field_booking_popup_label_def' =>		esc_html__('Book now', 'salvation'), 
			'timetable_field_login_popup_label_title' =>		esc_html__('Popup Login Label', 'salvation'), 
			'timetable_field_login_popup_label_descr' =>		esc_html__('Specify text label for login button in the popup window', 'salvation'), 
			'timetable_field_login_popup_label_def' =>			esc_html__('Log in', 'salvation'), 
			'timetable_field_cancel_popup_label_title' =>		esc_html__('Popup Cancel Label', 'salvation'), 
			'timetable_field_cancel_popup_label_descr' =>		esc_html__('Specify text label for cancel button in the popup window', 'salvation'), 
			'timetable_field_cancel_popup_label_def' =>			esc_html__('Cancel', 'salvation'), 
			'timetable_field_continue_popup_label_title' =>		esc_html__('Popup Continue Label', 'salvation'), 
			'timetable_field_continue_popup_label_descr' =>		esc_html__('Specify text label for continue button in the popup window', 'salvation'), 
			'timetable_field_continue_popup_label_def' =>		esc_html__('Continue', 'salvation'), 
			'timetable_field_booking_popup_message_title' =>	esc_html__('Booking pop-up message', 'salvation'), 
			'timetable_field_booking_popup_message_descr' =>	esc_html__('Specify text that will appear in pop-up window. Available placeholders:', 'salvation'), 
			'timetable_field_booking_popup_thank_you_message_title' =>	esc_html__('Booking pop-up thank you message', 'salvation'), 
			'timetable_field_box_bg_color_title' =>				esc_html__('Timetable box background color', 'salvation'), 
			'timetable_field_box_hover_bg_color_title' =>		esc_html__('Timetable box hover background color', 'salvation'), 
			'timetable_field_box_txt_color_title' =>			esc_html__('Timetable box text color', 'salvation'), 
			'timetable_field_box_bd_color_title' =>				esc_html__('Timetable box border color', 'salvation'), 
			'timetable_field_box_hover_txt_color_title' =>		esc_html__('Timetable box hover text color', 'salvation'), 
			'timetable_field_box_hours_txt_color_title' =>		esc_html__('Timetable box hours text color', 'salvation'), 
			'timetable_field_box_hours_hover_txt_color_title' =>	esc_html__('Timetable box hours hover text color', 'salvation'), 
			'timetable_field_row1_bg_color_title' =>			esc_html__('Row 1 style background color', 'salvation'), 
			'timetable_field_row1_txt_color_title' =>			esc_html__('Row 1 style text color', 'salvation'), 
			'timetable_field_row2_bg_color_title' =>			esc_html__('Row 2 style background color', 'salvation'), 
			'timetable_field_row2_txt_color_title' =>			esc_html__('Row 2 style text color', 'salvation'), 
			'timetable_field_booking_text_color_title' =>		esc_html__('Booking text color', 'salvation'), 
			'timetable_field_booking_bg_color_title' =>			esc_html__('Booking background color', 'salvation'), 
			'timetable_field_booking_hover_text_color_title' =>	esc_html__('Booking hover text color', 'salvation'), 
			'timetable_field_booking_hover_bg_color_title' =>	esc_html__('Booking hover background color', 'salvation'), 
			'timetable_field_booked_text_color_title' =>		esc_html__('Booked text color', 'salvation'), 
			'timetable_field_booked_bg_color_title' =>			esc_html__('Booked background color', 'salvation'), 
			'timetable_field_unavailable_text_color_title' =>	esc_html__('Unavailable text color', 'salvation'), 
			'timetable_field_unavailable_bg_color_title' =>		esc_html__('Unavailable background color', 'salvation'), 
			'timetable_field_available_slots_color_title' =>	esc_html__('Available slots color', 'salvation'), 
			
			
			/* Default Colors */
			'box_bg_color' => 				($cmsmasters_option['salvation' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_bg']), 
			'box_bd_color' => 				($cmsmasters_option['salvation' . '_default' . '_border'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_border']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_border']), 
			'box_hover_bg_color' => 		($cmsmasters_option['salvation' . '_default' . '_link'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_link']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_link']), 
			'box_txt_color' => 				($cmsmasters_option['salvation' . '_default' . '_color'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_color']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_color']), 
			'box_hover_txt_color' => 		($cmsmasters_option['salvation' . '_default' . '_alternate'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_alternate']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_alternate']), 
			'box_hours_txt_color' => 		($cmsmasters_option['salvation' . '_default' . '_link'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_link']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_link']), 
			'box_hours_hover_txt_color' => 	($cmsmasters_option['salvation' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_bg']), 
			'row1_bg_color' => 				($cmsmasters_option['salvation' . '_default' . '_alternate'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_alternate']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_alternate']), 
			'row1_txt_color' => 			($cmsmasters_option['salvation' . '_default' . '_color'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_color']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_color']), 
			'row2_bg_color' => 				($cmsmasters_option['salvation' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_bg']), 
			'row2_txt_color' => 			($cmsmasters_option['salvation' . '_default' . '_color'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_color']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_color']), 
			'booking_text_color' => 		($cmsmasters_option['salvation' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_bg']), 
			'booking_bg_color' => 			($cmsmasters_option['salvation' . '_default' . '_heading'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_heading']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_heading']), 
			'booking_hover_text_color' => 	($cmsmasters_option['salvation' . '_default' . '_link'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_link']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_link']), 
			'booking_hover_bg_color' => 	($cmsmasters_option['salvation' . '_default' . '_heading'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_heading']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_heading']), 
			'booked_text_color' => 			($cmsmasters_option['salvation' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_bg']), 
			'booked_bg_color' => 			($cmsmasters_option['salvation' . '_default' . '_heading'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_heading']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_heading']), 
			'unavailable_text_color' => 	($cmsmasters_option['salvation' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_bg']), 
			'unavailable_bg_color' => 		($cmsmasters_option['salvation' . '_default' . '_heading'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_heading']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_heading']), 
			'available_slots_color' => 		($cmsmasters_option['salvation' . '_default' . '_color'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_default' . '_color']) . ', 0.99)' : $cmsmasters_option['salvation' . '_default' . '_color']) 
		));
	}
}

add_action('admin_enqueue_scripts', 'salvation_timetable_register_c_c_scripts');


/* Events */
function salvation_timetable_events() {
	$timetable_events = get_posts(array(
		'numberposts' => -1, 
		'post_type' => 'events'
	));
	
	
	$out = array();
	
	
	if (!empty($timetable_events)) {
		foreach ($timetable_events as $timetable_event) {
			$out[urldecode($timetable_event->post_name)] = esc_html($timetable_event->post_title);
		}
	}
	
	
	return $out;
}


/* Event Categories */
function salvation_timetable_event_categories() {
	$categories = get_terms('events_category', array( 
		'hide_empty' => 0 
	));
	
	
	$out = array();
	
	
	if (!empty($categories)) {
		foreach ($categories as $category) {
			$out[urldecode(esc_attr($category->slug))] = esc_html($category->name);
		}
	}
	
	
	return $out;
}


/* Hour Categories */
function salvation_timetable_hour_categories() {
	global $wpdb;
	
	
	$query = $wpdb->prepare("SELECT distinct(category) AS category FROM {$wpdb->prefix}event_hours AS t1
		LEFT JOIN {$wpdb->posts} AS t2 ON t1.event_id=t2.ID 
		WHERE 
		t2.post_type='%s'
		AND t2.post_status='publish'
		AND category<>''", 'events');
	
	
	$categories = $wpdb->get_results($query);
	
	
	$out = array();
	
	
	if (!empty($categories)) {
		foreach ($categories as $category) {
			$out[esc_attr($category->category)] = esc_html($category->category);
		}
	}
	
	
	return $out;
}


/* Columns */
function salvation_timetable_columns() {
	$timetable_columns = get_posts(array(
		'numberposts' => -1, 
		'post_type' => 'timetable_weekdays'
	));
	
	
	$out = array();
	
	
	if (!empty($timetable_columns)) {
		foreach ($timetable_columns as $timetable_column) {
			$out[urldecode($timetable_column->post_name)] = esc_html($timetable_column->post_title);
		}
	}
	
	
	return $out;
}

