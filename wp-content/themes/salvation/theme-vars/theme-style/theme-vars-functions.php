<?php
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.0
 * 
 * Theme Vars Functions
 * Created by CMSMasters
 * 
 */


/* Register CSS Styles */
function salvation_vars_register_css_styles() {
	wp_enqueue_style('salvation-theme-vars-style', get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/css/vars-style.css', array('salvation-retina'), '1.0.0', 'screen, print');
}

add_action('wp_enqueue_scripts', 'salvation_vars_register_css_styles');

