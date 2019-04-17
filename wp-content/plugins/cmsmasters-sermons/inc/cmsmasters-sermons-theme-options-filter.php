<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Sermons
 * @version		1.0.0
 * 
 * CMSMasters Sermons Options Filter
 * Created by CMSMasters
 * 
 */


function cmsmasters_sermons_meta_fields($custom_all_meta_fields) {
	$custom_all_meta_fields_new = array();
	
	
	if (
		(isset($_GET['post_type']) && $_GET['post_type'] == 'sermon') || 
		(isset($_POST['post_type']) && $_POST['post_type'] == 'sermon') || 
		(isset($_GET['post']) && get_post_type($_GET['post']) == 'sermon') 
	) {
		$cmsmasters_option = array();
		
		$cmsmasters_option_name = 'cmsmasters_options_' . CMSMASTERS_SERMONS_ACTIVE_THEME . '_single_sermon';
		
		
		if (get_option($cmsmasters_option_name) != false) {
			$option = get_option($cmsmasters_option_name);
			
			$cmsmasters_option = array_merge($cmsmasters_option, $option);
		}
		
		
		$cmsmasters_global_sermon_layout = (isset($cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_layout']) && $cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_layout'] !== '') ? $cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_layout'] : 'r_sidebar';
		
		$cmsmasters_global_sermon_title = (isset($cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_title']) && $cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_title'] !== '') ? (($cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_title'] == 1) ? 'true' : 'false') : 'true';
		
		$cmsmasters_global_sermon_share_box = (isset($cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_share_box']) && $cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_share_box'] !== '') ? (($cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_share_box'] == 1) ? 'true' : 'false') : 'true';
		
		$cmsmasters_global_sermon_author_box = (isset($cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_author_box']) && $cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_author_box'] !== '') ? (($cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_author_box'] == 1) ? 'true' : 'false') : 'true';
		
		$cmsmasters_global_sermon_more_posts_box = (isset($cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_more_posts_box'])) ? $cmsmasters_option[CMSMASTERS_SERMONS_ACTIVE_THEME . '_sermon_more_posts_box'] : 'related';
		
		
		foreach ($custom_all_meta_fields as $custom_all_meta_field) {
			if ($custom_all_meta_field['id'] == 'cmsmasters_other_tabs') {
				$custom_all_meta_field['std'] = 'cmsmasters_sermon';
				
				
				$tabs_array = array();
				
				$tabs_array['cmsmasters_sermon'] = array( 
					'label' => esc_html__('Sermon', 'cmsmasters-sermons'), 
					'value' => 'cmsmasters_sermon' 
				);
				
				
				foreach ($custom_all_meta_field['options'] as $key => $val) {
					$tabs_array[$key] = $val;
				}
				
				
				$custom_all_meta_field['options'] = $tabs_array;
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_layout' && 
				$custom_all_meta_field['type'] == 'tab_start'
			) {
				$custom_all_meta_field['std'] = '';
				
				
				$custom_all_meta_fields_new[] = array( 
					'id'	=> 'cmsmasters_sermon', 
					'type'	=> 'tab_start', 
					'std'	=> 'true'
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Embedded Video Link', 'cmsmasters-sermons'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_sermon_video_link', 
					'type'	=> 'text_long', 
					'hide'	=> '', 
					'std'	=> '' 
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Audio Link', 'cmsmasters-sermons'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_sermon_audio_links', 
					'type'	=> 'repeatable', 
					'hide'	=> '', 
					'std'	=> '' 
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Download Link', 'cmsmasters-sermons'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_sermon_download_link', 
					'type'	=> 'text_long', 
					'hide'	=> '', 
					'std'	=> '' 
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('PDF Link', 'cmsmasters-sermons'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_sermon_pdf_link', 
					'type'	=> 'text_long', 
					'hide'	=> '', 
					'std'	=> '' 
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Sermon Title', 'cmsmasters-sermons'), 
					'desc'	=> esc_html__('Show', 'cmsmasters-sermons'), 
					'id'	=> 'cmsmasters_sermon_title', 
					'type'	=> 'checkbox', 
					'hide'	=> '', 
					'std'	=> $cmsmasters_global_sermon_title 
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Sharing Box', 'cmsmasters-sermons'), 
					'desc'	=> esc_html__('Show', 'cmsmasters-sermons'), 
					'id'	=> 'cmsmasters_sermon_sharing_box', 
					'type'	=> 'checkbox', 
					'hide'	=> '', 
					'std'	=> $cmsmasters_global_sermon_share_box 
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('About Author Box', 'cmsmasters-sermons'), 
					'desc'	=> esc_html__('Show', 'cmsmasters-sermons'), 
					'id'	=> 'cmsmasters_sermon_author_box', 
					'type'	=> 'checkbox', 
					'hide'	=> '', 
					'std'	=> $cmsmasters_global_sermon_author_box 
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('More Sermons Box', 'cmsmasters-sermons'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_sermon_more_posts', 
					'type'	=> 'select', 
					'hide'	=> '', 
					'std'	=> $cmsmasters_global_sermon_more_posts_box, 
					'options' => array( 
						'related' => array( 
							'label' => esc_html__('Show Related Tab', 'cmsmasters-sermons'), 
							'value'	=> 'related' 
						), 
						'popular' => array( 
							'label' => esc_html__('Show Popular Tab', 'cmsmasters-sermons'), 
							'value'	=> 'popular' 
						), 
						'recent' => array( 
							'label' => esc_html__('Show Recent Tab', 'cmsmasters-sermons'), 
							'value'	=> 'recent' 
						), 
						'hide' => array( 
							'label' => esc_html__('Hide More Sermons Box', 'cmsmasters-sermons'), 
							'value'	=> 'hide' 
						) 
					) 
				);
				
				$custom_all_meta_fields_new[] = array( 
					'id'	=> 'cmsmasters_sermon', 
					'type'	=> 'tab_finish'
				);
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_layout' && 
				$custom_all_meta_field['type'] != 'tab_start' && 
				$custom_all_meta_field['type'] != 'tab_finish'
			) {
				$custom_all_meta_field['std'] = $cmsmasters_global_sermon_layout;
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else {
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			}
		}
	} else {
		$custom_all_meta_fields_new = $custom_all_meta_fields;
	}
	
	
	return $custom_all_meta_fields_new;
}

add_filter('get_custom_all_meta_fields_filter', 'cmsmasters_sermons_meta_fields');

