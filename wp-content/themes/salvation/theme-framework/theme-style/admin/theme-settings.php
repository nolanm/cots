<?php 
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version		1.0.0
 * 
 * Theme Admin Settings
 * Created by CMSMasters
 * 
 */


/* General Settings */
function salvation_theme_options_general_fields($options, $tab) {
	if ($tab == 'header') {
		$new_options = array();
		
		foreach ($options as $option) {
			if ($option['id'] == 'salvation_header_styles') {
				$option['choices'][] = esc_html__('Fullwidth Header Style', 'salvation') . '|fullwidth';
				
				$new_options[] = $option;
			} else {
				$new_options[] = $option;
			}
		}
		
		$options = $new_options;
	}
	
	
	return $options;
}

add_filter('cmsmasters_options_general_fields_filter', 'salvation_theme_options_general_fields', 10, 2);

