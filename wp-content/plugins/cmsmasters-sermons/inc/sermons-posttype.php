<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Sermons
 * @version		1.0.1
 * 
 * CMSMasters Sermons Post Type
 * Created by CMSMasters
 * 
 */


class Cmsmasters_Sermons_Post_Type {
	public function __construct() {
		$current_theme = get_option('template');
		
		$sermon_post_settings_array = get_option('cmsmasters_options_' . $current_theme . '_single_sermon');
		
		$sermon_post_slug = $sermon_post_settings_array[$current_theme . '_sermon_post_slug'];
		
		$sermon_srm_categs_slug = $sermon_post_settings_array[$current_theme . '_sermon_srm_categs_slug'];
		
		
		$sermon_labels = apply_filters('cmsmasters_sermon_labels_filter', array( 
			'name' => 					__('Sermons', 'cmsmasters-sermons'), 
			'singular_name' => 			__('Sermons', 'cmsmasters-sermons'), 
			'menu_name' => 				__('Sermons', 'cmsmasters-sermons'), 
			'all_items' => 				__('All Sermons', 'cmsmasters-sermons'), 
			'add_new' => 				__('Add New', 'cmsmasters-sermons'), 
			'add_new_item' => 			__('Add New Sermon', 'cmsmasters-sermons'), 
			'edit_item' => 				__('Edit Sermon', 'cmsmasters-sermons'), 
			'new_item' => 				__('New Sermon', 'cmsmasters-sermons'), 
			'view_item' => 				__('View Sermon', 'cmsmasters-sermons'), 
			'search_items' => 			__('Search Sermons', 'cmsmasters-sermons'), 
			'not_found' => 				__('No Sermons found', 'cmsmasters-sermons'), 
			'not_found_in_trash' => 	__('No Sermons found in Trash', 'cmsmasters-sermons') 
		) );
		
		
		$sermon_args = array( 
			'labels' => 			$sermon_labels, 
			'query_var' => 			'sermon', 
			'capability_type' => 	'post', 
			'menu_position' => 		50, 
			'menu_icon' => 			'dashicons-groups', 
			'public' => 			true, 
			'show_ui' => 			true, 
			'hierarchical' => 		false, 
			'has_archive' => 		true, 
			'supports' => array( 
				'title', 
				'editor', 
				'author', 
				'thumbnail', 
				'excerpt', 
				'trackbacks', 
				'custom-fields', 
				'comments', 
				'revisions', 
				'page-attributes' 
			), 
			'rewrite' => array( 
				'slug' => 			(isset($sermon_post_slug) && $sermon_post_slug != '') ? $sermon_post_slug : 'sermon', 
				'with_front' => 	true 
			) 
		);
		
		
		register_post_type('sermon', $sermon_args);
		
		
		add_filter('manage_edit-sermon_columns', array(&$this, 'edit_columns'));
		
		add_filter('manage_edit-sermon_sortable_columns', array(&$this, 'edit_sortable_columns'));
		
		
		$srm_categs_labels = apply_filters('cmsmasters_srm_categs_labels_filter', array( 
			'name' => 					__('Sermon Categories', 'cmsmasters-sermons'), 
			'singular_name' => 			__('Sermon Category', 'cmsmasters-sermons') 
		) );
		
		
		$srm_categs_args = array (
			'hierarchical' => 		true, 
			'labels' => 			$srm_categs_labels, 
			'rewrite' => array( 
				'slug' => 			(isset($sermon_srm_categs_slug) && $sermon_srm_categs_slug != '') ? $sermon_srm_categs_slug : 'srm-categs', 
				'with_front' => 	true 
			) 
		);
		
		register_taxonomy('srm-categs', array('sermon'), $srm_categs_args);
		
		
		$srm_tags_labels = apply_filters('cmsmasters_srm_tags_labels_filter', array( 
			'name' => 					__('Sermon Tags', 'cmsmasters-sermons'), 
			'singular_name' => 			__('Sermon Tag', 'cmsmasters-sermons') 
		) );
		
		
		$srm_tags_args = array (
			'hierarchical' => 		false, 
			'labels' => 			$srm_tags_labels, 
			'rewrite' => array( 
				'slug' => 			(isset($sermon_srm_tags_slug) && $sermon_srm_tags_slug != '') ? $sermon_srm_tags_slug : 'srm-tags', 
				'with_front' => 	true 
			) 
		);
		
		
		register_taxonomy('srm-tags', array('sermon'), $srm_tags_args);
		
		
		add_action('manage_posts_custom_column', array(&$this, 'custom_columns'));
	}
	
	
	public function edit_columns($columns) {
		unset($columns['author']);
		
		unset($columns['comments']);
		
		unset($columns['date']);
		
		
		$new_columns = array( 
			'cb' => 			'<input type="checkbox" />', 
			'title' => 			__('Title', 'cmsmasters-sermons'), 
			'srm_thumb' => 		__('Thumbnail', 'cmsmasters-sermons'), 
			'srm_categs' => 		__('Categories', 'cmsmasters-sermons'), 
			'srm_tags' => 		__('Tags', 'cmsmasters-sermons'), 
			'comments' => 		'<span class="vers"><div title="' . __('Comments', 'cmsmasters-sermons') . '" class="comment-grey-bubble"></div></span>', 
			'menu_order' => 	'<span class="vers"><div class="dashicons dashicons-sort" title="' . __('Order', 'cmsmasters-sermons') . '"></div></span>' 
		);
		
		
		$result_columns = array_merge($columns, $new_columns);
		
		
		return $result_columns;
	}
	
	
	public function edit_sortable_columns($columns) {
		$columns['menu_order'] = 'menu_order';
		
		
		return $columns;
	}
	
	
	public function custom_columns($column) {
		switch ($column) {
			case 'srm_thumb':
				if (has_post_thumbnail() != '') {
					echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array( 
						'alt' => cmsmasters_title(get_the_ID(), false), 
						'title' => cmsmasters_title(get_the_ID(), false), 
						'style' => 'width:75px; height:75px;' 
					));
				} else {
					echo '<em>' . __('No Thumbnail', 'cmsmasters-sermons') . '</em>';
				}
				
				
				break;
			case 'srm_categs':
				if (get_the_terms(0, 'srm-categs') != '') {
					$srm_categs = get_the_terms(0, 'srm-categs');
					
					$srm_categs_html = array();
					
					
					foreach ($srm_categs as $srm_categ) {
						array_push($srm_categs_html, '<a href="' . get_term_link($srm_categ->slug, 'srm-categs') . '">' . $srm_categ->name . '</a>');
					}
					
					
					echo implode($srm_categs_html, ', ');
				} else {
					echo '<em>' . __('Uncategorized', 'cmsmasters-sermons') . '</em>';
				}
				
				
				break;
			case 'srm_tags':
				if (get_the_terms(0, 'srm-tags') != '') {
					$srm_tags = get_the_terms(0, 'srm-tags');
					
					$srm_tag_html = array();
					
					
					foreach ($srm_tags as $srm_tag) {
						array_push($srm_tag_html, '<a href="' . get_term_link($srm_tag->slug, 'srm-tags') . '">' . $srm_tag->name . '</a>');
					}
					
					
					echo implode($srm_tag_html, ', ');
				} else {
					echo '<em>' . __('No Tags', 'cmsmasters-sermons') . '</em>';
				}
				
				
				break;
			case 'menu_order':
				$custom_srm_post = get_post(get_the_ID());
				
				$custom_srm_ord = $custom_srm_post->menu_order;
				
				
				echo $custom_srm_ord;
				
				
				break;
		}
	}
}


function cmsmasters_sermons_init() {
	global $srm;
	
	$srm = new Cmsmasters_Sermons_Post_Type();
}

add_action('init', 'cmsmasters_sermons_init');

