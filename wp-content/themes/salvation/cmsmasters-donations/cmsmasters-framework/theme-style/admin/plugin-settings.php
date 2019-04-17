<?php 
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.1
 * 
 * CMSMasters Donations Admin Settings
 * Created by CMSMasters
 * 
 */


/* Single Settings */
function salvation_donations_options_general_fields($options, $tab) {
	$new_options = array();
	
	if ($tab == 'header') {
		foreach($options as $option) {
			if ($option['id'] == 'salvation_header_top_line_donations_but') {
				// remove field
			} elseif ($option['id'] == 'salvation_header_top_line_donations_but_text') {
				// remove field
			}  elseif ($option['id'] == 'salvation_header_top_line_donations_but_link') {
				// remove field
			} elseif ($option['id'] == 'salvation_header_donations_but_text') {
				$option['std'] = esc_html__('Donate!', 'salvation');
				
				$new_options[] = $option;
			} elseif ($option['id'] == 'salvation_header_donations_but') {
				$option['std'] = 0;
				
				$new_options[] = $option;
			} 			
			else {
				$new_options[] = $option;
			}
		}
	} else {
		$new_options = $options;
	}
	
	
	return $new_options;
}

add_filter('cmsmasters_options_general_fields_filter', 'salvation_donations_options_general_fields', 10, 2);

