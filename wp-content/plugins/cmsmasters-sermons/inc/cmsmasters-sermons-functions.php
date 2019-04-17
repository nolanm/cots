<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Sermons
 * @version		1.0.0
 * 
 * CMSMasters Sermons Composer Functions
 * Created by CMSMasters
 * 
 */


// Shortcodes Init
function cmsmasters_sermons_shortcodes_init() {
	global $pagenow;
	
	
	if ( 
		is_admin() && 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		if (wp_script_is('cmsmasters_content_composer_js', 'queue') && wp_script_is('cmsmasters_composer_lightbox_js', 'queue')) {
			cmsmasters_sermons_srm_categories();
		}
	}
}

add_action('admin_footer', 'cmsmasters_sermons_shortcodes_init');


// Sermons Categories
function cmsmasters_sermons_srm_categories() {
	$categories = get_terms('srm-categs', array( 
		'hide_empty' => 0 
	));
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_sermons_srm_categories() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($categories) && !is_wp_error($categories)) {
		foreach ($categories as $category) {
			$out .= "\t\t\t\"" . $category->slug . "\" : \"" . esc_html($category->name) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_sermons_ob_load_template($template_name, $args = array()) {
	if (locate_template($template_name)) {
		$template = locate_template($template_name);
		
		
		if (is_array($args) && !empty($args)) {
			extract($args);
		}
		
		
		ob_start();
		
		
		include($template);
		
		
		$out = ob_get_contents();
		
		
		ob_end_clean();
		
		
		return $out;
	}
}

