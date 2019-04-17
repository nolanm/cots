<?php 
/*
Plugin Name: CMSMasters Sermons
Plugin URI: http://cmsmasters.net/
Description: CMSMasters Sermons created by <a href="http://cmsmasters.net/" title="CMSMasters">CMSMasters</a> team. Sermons plugin create custom post type that allow you to create sermons for new <a href="http://themeforest.net/user/cmsmasters/portfolio" title="cmsmasters">cmsmasters</a> WordPress themes.
Version: 1.0.5
Author: cmsmasters
Author URI: http://cmsmasters.net/
*/

/*  Copyright 2016 CMSMasters (email : cmsmstrs@gmail.com). All Rights Reserved.
	
	This software is distributed exclusively as appendant 
	to Wordpress themes, created by CMSMasters studio and 
	should be used in strict compliance to the terms, 
	listed in the License Terms & Conditions included 
	in software archive.
	
	If your archive does not include this file, 
	you may find the license text by url 
	http://cmsmasters.net/files/license/cmsmasters-sermons/license.txt 
	or contact CMSMasters Studio at email 
	copyright.cmsmasters@gmail.com 
	about this.
	
	Please note, that any usage of this software, that 
	contradicts the license terms is a subject to legal pursue 
	and will result copyright reclaim and damage withdrawal.
*/


class Cmsmasters_Sermons { 
	function __construct() { 
		define('CMSMASTERS_SERMONS_VERSION', '1.0.5');
		
		define('CMSMASTERS_SERMONS_FILE', __FILE__);
		
		$cmsmasters_active_theme = get_option('cmsmasters_active_theme') ? get_option('cmsmasters_active_theme') : '';
		
		define('CMSMASTERS_SERMONS_THEME_STYLE', (get_option('cmsmasters_' . $cmsmasters_active_theme . '_theme_style') ? get_option('cmsmasters_' . $cmsmasters_active_theme . '_theme_style') : ''));
		
		define('CMSMASTERS_SERMONS_NAME', plugin_basename(CMSMASTERS_SERMONS_FILE));
		
		define('CMSMASTERS_SERMONS_PATH', plugin_dir_path(CMSMASTERS_SERMONS_FILE));
		
		define('CMSMASTERS_SERMONS_URL', plugin_dir_url(CMSMASTERS_SERMONS_FILE));
		
		define('CMSMASTERS_SERMONS_ACTIVE_THEME', get_option('cmsmasters_active_theme'));
		
		define('CMSMASTERS_SERMONS_THEME_SHORTCODES_DIR', 'cmsmasters-sermons/cmsmasters-framework/theme-style' . CMSMASTERS_SERMONS_THEME_STYLE . '/cmsmasters-c-c/shortcodes');
		
		define('CMSMASTERS_SERMONS_THEME_TEMPLATES_DIR', 'cmsmasters-sermons/cmsmasters-framework/theme-style' . CMSMASTERS_SERMONS_THEME_STYLE . '/templates');
		
		
		require_once(CMSMASTERS_SERMONS_PATH . 'inc/cmsmasters-sermons-theme-settings-filter.php');
		
		require_once(CMSMASTERS_SERMONS_PATH . 'inc/cmsmasters-sermons-theme-options-filter.php');
		
		
		require_once(CMSMASTERS_SERMONS_PATH . 'inc/sermons-posttype.php');
		
		require_once(CMSMASTERS_SERMONS_PATH . 'inc/cmsmasters-sermons-functions.php');
		
		require_once(CMSMASTERS_SERMONS_PATH . 'inc/cmsmasters-sermons-shortcodes.php');
		
		
		add_action('admin_enqueue_scripts', array($this, 'cmsmasters_sermons_admin_scripts'));
		
		add_action('admin_init', array($this, 'cmsmasters_sermons_compatibility'));
		
		
		register_activation_hook(CMSMASTERS_SERMONS_FILE, array($this, 'cmsmasters_sermons_activate'));
		
		register_deactivation_hook(CMSMASTERS_SERMONS_FILE, array($this, 'cmsmasters_sermons_deactivate'));
		
		
		// Load Plugin Local File
		load_plugin_textdomain('cmsmasters-sermons', false, dirname(plugin_basename(CMSMASTERS_SERMONS_FILE)) . '/languages/');
	}
	
	
	function cmsmasters_sermons_admin_scripts() {
		global $pagenow;
		
		
		if ( 
			$pagenow == 'post-new.php' || 
			($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
		) {
			wp_enqueue_script('cmsmasters-sermons-c-c-shortcodes-extend', CMSMASTERS_SERMONS_URL . 'js/cmsmastersSermons-c-c-shortcodes-extend.js', array('cmsmasters_composer_shortcodes_js'), CMSMASTERS_SERMONS_VERSION, true);
			
			wp_localize_script('cmsmasters-sermons-c-c-shortcodes-extend', 'cmsmasters_sermons_shortcodes', array( 
				'title' =>											__('Sermons', 'cmsmasters-sermons'), 
				'orderby_descr' =>									__('Choose what parameter your sermons will be ordered by', 'cmsmasters-sermons'), 
				'number_title' =>									__('Sermons Number', 'cmsmasters-sermons'), 
				'number_subtitle' =>								__('Enter the number of sermons to be shown per page', 'cmsmasters-sermons'), 
				'number_descr_note' =>								__('number, if empty - show all sermons', 'cmsmasters-sermons'), 
				'metadata_descr' =>									__('Choose sermons metadata you want to be shown', 'cmsmasters-sermons'), 
				'categories_descr' =>								__('Show sermons associated with certain categories', 'cmsmasters-sermons'), 
				'categories_descr_note' =>							__('If you don\'t choose any sermon categories, all your sermons will be shown', 'cmsmasters-sermons'), 
				'col_count_descr' =>								__('Choose number of sermons per row', 'cmsmasters-sermons'), 
				'pagination_descr' =>								__('Choose your method of viewing additional sermons', 'cmsmasters-sermons'), 
				'pagination_choice_disabled' =>						__('Disable additional sermons', 'cmsmasters-sermons')  
			));
		}
	}
	
	
	public function cmsmasters_sermons_activate() {
		$this->cmsmasters_sermons_activation_compatibility();
		
		
		if (get_option('cmsmasters_active_sermons') != CMSMASTERS_SERMONS_VERSION) {
			add_option('cmsmasters_active_sermons', CMSMASTERS_SERMONS_VERSION, '', 'yes');
		}
		
		
		flush_rewrite_rules();
	}
	
	
	public function cmsmasters_sermons_deactivate() {
		flush_rewrite_rules();
	}
	
	
	public function cmsmasters_sermons_activation_compatibility() {
		if ( 
			!defined('CMSMASTERS_SERMONS') || 
			(defined('CMSMASTERS_SERMONS') && !CMSMASTERS_SERMONS) 
		) {
			deactivate_plugins(CMSMASTERS_SERMONS_NAME);
			
			
			wp_die( 
				__("Your theme doesn't support CMSMasters Sermons plugin. Please use appropriate CMSMasters theme.", 'cmsmasters-sermons'), 
				__("Error!", 'cmsmasters-sermons'), 
				array( 
					'back_link' => 	true 
				) 
			);
		}
	}
	
	
	public function cmsmasters_sermons_compatibility() {
		if ( 
			!defined('CMSMASTERS_SERMONS') || 
			(defined('CMSMASTERS_SERMONS') && !CMSMASTERS_SERMONS) 
		) {
			if (is_plugin_active(CMSMASTERS_SERMONS_NAME)) {
				deactivate_plugins(CMSMASTERS_SERMONS_NAME);
				
				
				add_action('admin_notices', array($this, 'cmsmasters_sermons_compatibility_warning'));
			}
		}
	}
	
	
	public function cmsmasters_sermons_compatibility_warning() {
		echo "<div class=\"notice notice-warning is-dismissible\">
			<p><strong>" . __("CMSMasters Sermons plugin was deactivated, because your theme doesn't support it. Please use appropriate CMSMasters theme.", 'cmsmasters-sermons') . "</strong></p>
		</div>";
	}
}


new Cmsmasters_Sermons();

