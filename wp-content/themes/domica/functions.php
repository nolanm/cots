<?php

/**
 * Theme Includes
 */
require_once get_template_directory() .'/inc/init.php';

/**
 * TGM Plugin Activation
 */
{
	require_once get_template_directory() . '/TGM-Plugin-Activation/class-tgm-plugin-activation.php';
	require_once get_template_directory() . '/TGM-Plugin-Activation/recommend_plugins.php';
}

/**
 * Load the Kirki Fallback class
 */
require get_template_directory() . '/inc/kirki-fallback.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
