<?php
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.0
 * 
 * Theme Content Composer Functions
 * Created by CMSMasters
 * 
 */


/* Register JS Scripts */
function salvation_theme_register_c_c_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('salvation-composer-shortcodes-extend', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/js/cmsmasters-c-c-theme-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('salvation-composer-shortcodes-extend', 'cmsmasters_theme_shortcodes', array( 
			'blog_field_layout_mode_puzzle' => 			esc_attr__('Puzzle', 'salvation'), 
			'quotes_field_slider_type_title' => 		esc_attr__('Slider Type', 'salvation'), 
			'quotes_field_slider_type_descr' => 		esc_attr__('Choose your quotes slider style type', 'salvation'), 
			'quotes_field_type_choice_box' => 			esc_attr__('Boxed', 'salvation'), 
			'quotes_field_type_choice_center' => 		esc_attr__('Centered', 'salvation'), 
			'quotes_field_item_color_title' => 			esc_attr__('Color', 'salvation'), 
			'quotes_field_item_color_descr' => 			esc_attr__('Enter this quote custom color', 'salvation') 
		));
	}
}

add_action('admin_enqueue_scripts', 'salvation_theme_register_c_c_scripts');



// Quotes Shortcode Attributes Filter
add_filter('cmsmasters_quotes_atts_filter', 'cmsmasters_quotes_atts');

function cmsmasters_quotes_atts() {
	return array( 
		'shortcode_id' => 		'', 
		'mode' => 				'grid', 
		'type' => 				'boxed', 
		'columns' => 			'3', 
		'speed' => 				'10', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	);
}

