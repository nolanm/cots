<?php

if(function_exists('vc_map')){
	add_action( 'init', 'domica_vc_elements' );
}

/*theme shortcode*/
if(!function_exists('domica_vc_elements')){
    function domica_vc_elements(){
        /*iconbox*/
        vc_map(array(
			'name' => esc_html__( 'Iconbox', 'domica' ),
			'icon' => get_template_directory_uri() . '/images/vc/iconbox.png',
			'base' => 'iconbox',
			'category' => esc_html__( 'Bridge Theme', 'domica' ),
			'content_element' => true,
			'params' => array(
				/*style*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'domica' ),
					'admin_label' => true,
					'param_name' => 'iconbox_style',
					'value' => array(
						esc_html__('Icon above title v1 center align', 'domica') => 'icon-above-title-1',
						esc_html__('Icon above title v2 left align', 'domica') => 'icon-above-title-2',
						esc_html__('Icon above title v3', 'domica') => 'icon-above-title-3',
					),
					'std' => 'icon-above-title-1'
				),
				/*text align with icon-above-title*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Text align', 'domica' ),
					'param_name' => 'align',
					'dependency' => array(
						'element' => 'style',
						'value' => array (
							'icon-above-title-1','icon-above-title-3'
						)
					),
					'value' => array(
						esc_html__('Left', 'domica') => 'text-left',
						esc_html__('Center', 'domica') => 'text-center',
						esc_html__('Right', 'domica') => 'text-right',
					),
					'std' => 'text-center'
				),
				/*direction with icon-inline-title*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Direction', 'domica' ),
					'param_name' => 'direction',
					'dependency' => array(
						'element' => 'style',
						'value' => 'icon-inline-title'
					),
					'value' => array(
						esc_html__('Left', 'domica') => 'direct-left',
						esc_html__('Right', 'domica') => 'direct-right',
					),
					'std' => 'direct-left'
				),
				/*title*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'domica' ),
					'description' => esc_html__( 'Enter your title', 'domica' ),
					'param_name' => 'ht_title',
					'admin_label' => true,
					'value' => 'This is my title',
				),
				/*link of title*/
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Link of Title?', 'domica' ),
					'param_name' => 'title_link',
					'value' => array(
						esc_html__('Yes', 'domica') => 'yes',
					),
					'std' => 'yes'
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__( 'Link', 'domica' ),
					'param_name' => 'link',
					'dependency' => array(
						'element' => 'title_link',
						'value' => 'yes'
					)
				),
				/*color of title*/
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Custom Color?', 'domica' ),
					'param_name' => 'title_color',
					'value'      => array(esc_html__('Yes', 'domica') => 'yes'),
					'std' => 'no',
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Color', 'domica' ),
					'param_name' => 'color',
					'value' => '#333333',
					'dependency' => array(
						'element' => 'title_color',
						'value' => 'yes'
					)
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Hover Color', 'domica' ),
					'param_name' => 'hover_color',
					'dependency' => array(
						'element' => 'title_color',
						'value' => 'yes'
					)
				),
				/*icon*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon', 'domica' ),
					'param_name' => 'icon',
					'value' => array(
						esc_html__('Use Image', 'domica') => 'use-image',
						esc_html__('Use Font Icon', 'domica') => 'use-font-icon',
					),
					'std' => 'use-image'
				),
				/*icon - use font icon*/
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Font Icon', 'domica' ),
					'param_name' => 'font_icon',
					'value' => 'fa-plus-circle',
					'dependency' => array(
						'element' => 'icon',
						'value' => 'use-font-icon'
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Font Size', 'domica' ),
					'param_name' => 'font_size',
					'value' => '48px',
					'description' => esc_html('Enter font size. Ex: "30px", "1.5rem" or "2em"', 'domica'),
					'dependency' => array(
						'element' => 'icon',
						'value' => 'use-font-icon'
					),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Font Color', 'domica' ),
					'param_name' => 'font_color',
					'value' => '#4c4fff',
					'dependency' => array(
						'element' => 'icon',
						'value' => 'use-font-icon'
					),
				),
				/*icon - use image*/
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'domica' ),
					'param_name' => 'image',
					'dependency' => array(
						'element' => 'icon',
						'value' => 'use-image'
					),
				),
				/*content*/
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Content', 'domica' ),
					'param_name' => 'content',
					'value' => 'Nec in adipiscing purus luctus, urna pellentesque fringilla vel, non sed arcu integer, mauris ullamcorper ante ut non torquent. Justo praesent, vivamus.',
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name' => 'class',
				),
				array(
					'type' => 'css_editor',
					'heading'=> esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group' => esc_html__( 'Design Options', 'domica' ),
				),
			),
		));
		/*social activities*/
		 vc_map(array(
			'name' => esc_html__( 'Social Activities', 'domica' ),
			// 'icon' => get_template_directory_uri() . '/images/vc/iconbox.png',
			'base' => 'social_activities',
			'category' => esc_html__( 'Bridge Theme', 'domica' ),
			'content_element' => true,
			'params' => array(
				/*style*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'domica' ),
					'admin_label' => true,
					'param_name' => 'act_style',
					'value' => array(
						esc_html__('Activity Social style', 'domica') => 'act-style-1',
					),
					'std' => 'act-style-1'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Activity Title', 'domica' ),
					'description' => esc_html__( 'Enter your title', 'domica' ),
					'param_name' => 'act_title',
					'admin_label' => true,
					'value' => 'This is my title',
				),
				/*link of title*/
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Link of Title?', 'domica' ),
					'param_name' => 'title_link',
					'value' => array(
						esc_html__('Yes', 'domica') => 'yes',
					),
					'std' => 'yes'
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__( 'Link', 'domica' ),
					'param_name' => 'link',
					'dependency' => array(
						'element' => 'title_link',
						'value' => 'yes'
					)
				),
				/*color of title*/
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Custom Color?', 'domica' ),
					'param_name' => 'title_color',
					'value'      => array(esc_html__('Yes', 'domica') => 'yes'),
					'std' => 'no',
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Color', 'domica' ),
					'param_name' => 'color',
					'value' => '#333333',
					'dependency' => array(
						'element' => 'title_color',
						'value' => 'yes'
					)
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Hover Color', 'domica' ),
					'param_name' => 'hover_color',
					'dependency' => array(
						'element' => 'title_color',
						'value' => 'yes'
					)
				),
				/*icon*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon', 'domica' ),
					'param_name' => 'icon',
					'value' => array(
						esc_html__('Use Image', 'domica') => 'use-image',
						esc_html__('Use Font Icon', 'domica') => 'use-font-icon',
					),
					'std' => 'use-image'
				),
				/*icon - use font icon*/
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Font Icon', 'domica' ),
					'param_name' => 'font_icon',
					'value' => 'fa-plus-circle',
					'dependency' => array(
						'element' => 'icon',
						'value' => 'use-font-icon'
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Font Size', 'domica' ),
					'param_name' => 'font_size',
					'value' => '48px',
					'description' => esc_html('Enter font size. Ex: "30px", "1.5rem" or "2em"', 'domica'),
					'dependency' => array(
						'element' => 'icon',
						'value' => 'use-font-icon'
					),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Font Color', 'domica' ),
					'param_name' => 'font_color',
					'value' => '#4c4fff',
					'dependency' => array(
						'element' => 'icon',
						'value' => 'use-font-icon'
					),
				),
				/*icon - use image*/
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'domica' ),
					'param_name' => 'image',
					'dependency' => array(
						'element' => 'icon',
						'value' => 'use-image'
					),
				),
				/*content*/
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Content', 'domica' ),
					'param_name' => 'content',
					'value' => '',
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name' => 'class',
				),
				array(
					'type' => 'css_editor',
					'heading'=> esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group' => esc_html__( 'Design Options', 'domica' ),
				),
			),
		));
		/*feature*/
		vc_map(array(
			'name' => esc_html__( 'Feature', 'domica' ),
			// 'icon' => get_template_directory_uri() . '/images/vc/iconbox.png',
			'base' => 'feature',
			'category' => esc_html__( 'Bridge Theme', 'domica' ),
			'content_element' => true,
			'params' => array(
				/*style*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'domica' ),
					'admin_label' => true,
					'param_name' => 'feature_style',
					'value' => array(
						esc_html__('Style center align', 'domica') => 'feature-style-1',
					),
					'std' => 'feature-style-1'
				),
				/*title*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'domica' ),
					'description' => esc_html__( 'Enter your title', 'domica' ),
					'param_name' => 'feature_title',
					'admin_label' => true,
					'value' => 'This is my title',
				),
				/*link of title*/
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Link of Title?', 'domica' ),
					'param_name' => 'title_link',
					'value' => array(
						esc_html__('Yes', 'domica') => 'yes',
					),
					'std' => 'yes'
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__( 'Link', 'domica' ),
					'param_name' => 'link',
					'dependency' => array(
						'element' => 'title_link',
						'value' => 'yes'
					)
				),
				/*color of title*/
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Custom Color?', 'domica' ),
					'param_name' => 'title_color',
					'value'      => array(esc_html__('Yes', 'domica') => 'yes'),
					'std' => 'no',
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Color', 'domica' ),
					'param_name' => 'color',
					'value' => '#333333',
					'dependency' => array(
						'element' => 'title_color',
						'value' => 'yes'
					)
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Hover Color', 'domica' ),
					'param_name' => 'hover_color',
					'dependency' => array(
						'element' => 'title_color',
						'value' => 'yes'
					)
				),
				/*feature image*/
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Feature image', 'domica' ),
					'param_name' => 'feature_image',
					'description' => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'domica' ),
				),
				/*content*/
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Content', 'domica' ),
					'param_name' => 'content',
					'value' => 'Nec in adipiscing purus luctus, urna pellentesque fringilla vel, non sed arcu integer, mauris ullamcorper ante ut non torquent. Justo praesent, vivamus.',
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name' => 'class',
				),
				array(
					'type' => 'css_editor',
					'heading'=> esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group' => esc_html__( 'Design Options', 'domica' ),
				),
			),
		));
		/*featurebox with number*/
		vc_map(array(
			'name' => esc_html__( 'Featurebox', 'domica' ),
			// 'icon' => get_template_directory_uri() . '/images/vc/iconbox.png',
			'base' => 'featurebox',
			'category' => esc_html__( 'Bridge Theme', 'domica' ),
			'content_element' => true,
			'params' => array(
				/*style*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'domica' ),
					'admin_label' => true,
					'param_name' => 'featurebox_style',
					'value' => array(
						esc_html__('Style left align', 'domica') => 'featurebox-style-1',
						esc_html__('Style right align', 'domica') => 'featurebox-style-2',
						esc_html__('Style left align without featurebox number', 'domica') => 'featurebox-style-3',
					),
					'std' => 'featurebox-style-1'
				),
				/*title*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Featurebox title', 'domica' ),
					'description' => esc_html__( 'Enter your title', 'domica' ),
					'param_name' => 'featurebox_title',
					'admin_label' => true,
					'value' => 'This is my title',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Featurebox number', 'domica' ),
					'description' => esc_html__( 'Enter featurebox number', 'domica' ),
					'param_name' => 'featurebox_number',
					'admin_label' => true,
					'value' => '01',
				),
				/*link of title*/
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Link of Title?', 'domica' ),
					'param_name' => 'title_link',
					'value' => array(
						esc_html__('Yes', 'domica') => 'yes',
					),
					'std' => 'yes'
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__( 'Link', 'domica' ),
					'param_name' => 'link',
					'dependency' => array(
						'element' => 'title_link',
						'value' => 'yes'
					)
				),
				/*color of title*/
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Custom Color?', 'domica' ),
					'param_name' => 'title_color',
					'value'      => array(esc_html__('Yes', 'domica') => 'yes'),
					'std' => 'no',
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Color', 'domica' ),
					'param_name' => 'color',
					'value' => '#333333',
					'dependency' => array(
						'element' => 'title_color',
						'value' => 'yes'
					)
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Hover Color', 'domica' ),
					'param_name' => 'hover_color',
					'dependency' => array(
						'element' => 'title_color',
						'value' => 'yes'
					)
				),
				/*content*/
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Content', 'domica' ),
					'param_name' => 'content',
					'value' => 'Nec in adipiscing purus luctus, urna pellentesque fringilla vel, non sed arcu integer, mauris ullamcorper ante ut non torquent. Justo praesent, vivamus.',
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name' => 'class',
				),
				array(
					'type' => 'css_editor',
					'heading'=> esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group' => esc_html__( 'Design Options', 'domica' ),
				),
			),
		));
		/*ministries*/
		vc_map(array(
			'name' => esc_html__( 'Ministries', 'domica' ),
			// 'icon' => get_template_directory_uri() . '/images/vc/iconbox.png',
			'base' => 'ministries',
			'category' => esc_html__( 'Bridge Theme', 'domica' ),
			'content_element' => true,
			'params' => array(
				/*style*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'domica' ),
					'admin_label' => true,
					'param_name' => 'minis_style',
					'value' => array(
						esc_html__('Style center align', 'domica') => 'ministries-style-1',
					),
					'std' => 'ministries-style-1'
				),
				/*title*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'domica' ),
					'description' => esc_html__( 'Enter ministries title', 'domica' ),
					'param_name' => 'minis_title',
					'admin_label' => true,
					'value' => 'This is my title',
				),
				/*link of title*/
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Link of Title?', 'domica' ),
					'param_name' => 'title_link',
					'value' => array(
						esc_html__('Yes', 'domica') => 'yes',
					),
					'std' => 'yes'
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__( 'Link', 'domica' ),
					'param_name' => 'link',
					'dependency' => array(
						'element' => 'title_link',
						'value' => 'yes'
					)
				),
				/*color of title*/
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Custom Color?', 'domica' ),
					'param_name' => 'title_color',
					'value'      => array(esc_html__('Yes', 'domica') => 'yes'),
					'std' => 'no',
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Color', 'domica' ),
					'param_name' => 'color',
					'value' => '#333333',
					'dependency' => array(
						'element' => 'title_color',
						'value' => 'yes'
					)
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Hover Color', 'domica' ),
					'param_name' => 'hover_color',
					'dependency' => array(
						'element' => 'title_color',
						'value' => 'yes'
					)
				),
				/*feature image*/
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Ministries image', 'domica' ),
					'param_name' => 'minis_image',
					'description' => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'domica' ),
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name' => 'class',
				),
				array(
					'type' => 'css_editor',
					'heading'=> esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group' => esc_html__( 'Design Options', 'domica' ),
				),
			),
		));
		/*counter*/
		vc_map(array(
			'name' => esc_html__( 'Counter', 'domica' ),
			'icon' => get_template_directory_uri() . '/images/vc/counter.png',
			'base' => 'counter',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'params' => array(
				/*style*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'domica' ),
					'admin_label' => true,
					'param_name' => 'counter_style',
					'value' => array(
						esc_html__('Counters in horizontal align', 'domica') => 'counter-1',
						esc_html__('Counters in vertical align', 'domica') => 'counter-2',
					),
					'std' => 'counter-1'
				),
				/*text color*/
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Text color', 'domica' ),
					'admin_label' => true,
					'param_name' => 'color',
					'value' => '',
				),
				/*number*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number', 'domica' ),
					'admin_label' => true,
					'param_name' => 'number',
					'value' => '99',
				),
				/*unit*/
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Unit?', 'domica' ),
					'param_name' => 'unit',
					'value' => array(
						esc_html__( 'Yes', 'domica' ) => 'yes'
					),
					'std' => 'no'
				),
				array(
					'type' => 'textfield',
					'dependency' => array(
						'element' => 'unit',
						'value' => 'yes'
					),
					'param_name' => 'unit_data',
					'value' => '%',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Unit Position', 'domica' ),
					'param_name' => 'position',
					'dependency' => array(
						'element' => 'unit',
						'value' => 'yes'
					),
					'value' => array(
						esc_html__( 'Left', 'domica' ) => 'unit-left',
						esc_html__( 'Right', 'domica' ) => 'unit-right',
					),
					'std' => 'unit-right'
				),
				/*text*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Text', 'domica' ),
					'admin_label' => true,
					'param_name' => 'text',
					'value' => 'Your text',
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name' => 'class',
				),
				array(
					'type' => 'css_editor',
					'heading'=> esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group' => esc_html__( 'Design Options', 'domica' ),
				),
			)
		));

		/*video control*/
		vc_map(array(
			'name' => esc_html__( 'Video', 'domica' ),
			'icon' => get_template_directory_uri() . '/images/vc/video.png',
			'base' => 'ht_video',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'params' => array(
				/*source*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Source', 'domica' ),
					'admin_label' => true,
					'param_name' => 'source',
					'value' => array(
						esc_html__( 'Youtube', 'domica' ) => 'youtube',
						esc_html__( 'Vimeo', 'domica' ) => 'vimeo',
					),
					'std' => 'youtube'
				),
				/*video id*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Video ID', 'domica' ),
					'description' => esc_html__( 'Enter video ID, Ex: https://www.youtube.com/watch?v=22iu8byk5C8, ID = 22iu8byk5C8; https://vimeo.com/156602623, ID = 156602623', 'domica' ),
					'admin_label' => true,
					'param_name' => 'vid',
					'value' => '22iu8byk5C8'
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name' => 'class',
				),
				array(
					'type' => 'css_editor',
					'heading'=> esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group' => esc_html__( 'Design Options', 'domica' ),
				),
			)
		));

		/*testimonials*/
		vc_map(array(
			'name' => esc_html__( 'Testimonials', 'domica' ),
			'icon' => get_template_directory_uri() . '/images/vc/testi.png',
			'base' => 'testi',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'params' => array(
				/*style*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'domica' ),
					'admin_label' => true,
					'param_name' => 'style',
					'value' => array(
						esc_html__( 'Grid', 'domica' ) => 'grid',
						esc_html__( 'Carousel', 'domica' ) => 'carousel',
					),
					'std' => 'carousel'
				),
				/*grid column - grid*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Post per row', 'domica' ),
					'param_name' => 'column',
					'dependency' => array(
						'element' => 'style',
						'value' => 'grid'
					),
					'value' => array(2, 3, 4),
					'std' => '3'
				),
				/*post count*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Post count', 'domica' ),
					'admin_label' => true,
					'param_name' => 'count',
					'value' => '6'
				),
				/*color*/
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Color 1', 'domica' ),
					'param_name' => 'color1',
					'value' => ''
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Color 2', 'domica' ),
					'param_name' => 'color2',
					'value' => ''
				),
				/*text content*/
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Text Content', 'domica' ),
					'description' => esc_html__('Select text color of content', 'domica'),
					'param_name' => 'text_content',
					'value' => ''
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name' => 'class',
				),
				array(
					'type' => 'css_editor',
					'heading'=> esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group' => esc_html__( 'Design Options', 'domica' ),
				),
			)
		));

		/*services*/
		vc_map(array(
			'name' => esc_html__( 'Services', 'domica' ),
			'icon' => get_template_directory_uri() . '/images/vc/service.png',
			'base' => 'services',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'params' => array(
				/*style*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'domica' ),
					'param_name' => 'service_style',
					'value' => array(
						esc_html__('Style 1', 'domica') => 'consult-service-style-1',
						esc_html__('Style 2', 'domica') => 'consult-service-style-2',
						esc_html__('Style 3 Carousel', 'domica') => 'consult-service-style-3',
						esc_html__('Style 4 Carousel', 'domica') => 'consult-service-style-4',
						esc_html__('Style 5 Carousel', 'domica') => 'consult-service-style-5',
						esc_html__('Style 6', 'domica') => 'consult-service-style-6',
						esc_html__('Style 7', 'domica') => 'consult-service-style-7',
						esc_html__('Style 7 Carousel', 'domica') => 'consult-service-style-7-carousel',
					),
					'std' => 'consult-service-black',
					'admin_label' => true,
					'description' => esc_html__( 'Choose Style', 'domica' ),
				),
				/*column*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Post per row', 'domica' ),
					'param_name' => 'service_per',
					'value' => array(1, 2, 3, 4),
					'std' => '3'
				),
				/*post count*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Post count', 'domica' ),
					'admin_label' => true,
					'param_name' => 'service_count',
					'value' => '6'
				),
				/*text color*/
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Text Color', 'domica' ),
					'admin_label' => true,
					'param_name' => 'color',
					'value' => ''
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name' => 'class',
				),
				array(
					'type' => 'css_editor',
					'heading'=> esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group' => esc_html__( 'Design Options', 'domica' ),
				),
			)
		));
		/*service carousel*/
		vc_map( array(
			'name' => esc_html__( 'Bridge Service Carousel', 'domica' ),
			'base' => 'service_carousel',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'description' => esc_html__( 'Add a Service Carousel', 'domica' ),
			'show_settings_on_create' => false,
			'content_element' => true,
			'is_container' => true,
			'js_view' => 'VcColumnView',
			'as_parent' => array(
				'only' => 'services'
			),
			'params' => array(
				array(
			        'type'        => 'textfield',
			        'heading'     => esc_html__('Class', 'domica' ),
			        'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
			        'admin_label' => true,
			        'param_name'  => 'class',
		        ),
		        array(
			        'type'       => 'css_editor',
			        'heading'    => esc_html__( 'CSS', 'domica' ),
			        'param_name' => 'css',
			        'group'      => esc_html__( 'Design Options', 'domica' ),
		        ),
			),
		));
		/*case studies*/

		vc_map( array(
			'name' => esc_html__( 'Bridge Case Study', 'domica' ),
			'base' => 'case',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'description' => esc_html__( 'Add a Case Study', 'domica' ),
			'params' => array(
				// array(
				// 	'type'       => 'dropdown',
				// 	'heading'    => esc_html__( 'Style', 'domica' ),
				// 	'param_name' => 'case_style',
				// 	'admin_label' => true,
				// 	'value'      => array(
				// 		esc_html__('Style 1', 'domica') => 'case-style-1',
				// 		esc_html__('Style 2', 'domica') => 'case-style-2',
				// 	),
				// 	'std' => 'case-style-1',
				// ),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Text color', 'domica' ),
					'param_name' => 'text_color_2',
					'admin_label' => true,
					'dependency' => array(
						'element' => 'case_style',
						'value' => 'case-style-2'
					),
					'value' => '#FFFFFF'
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Background color', 'domica' ),
					'param_name' => 'bg_color_2',
					'admin_label' => true,
					'dependency' => array(
						'element' => 'case_style',
						'value' => 'case-style-2'
					),
					'value' => 'rgba(6,199,255,0.85)'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Post count', 'domica' ),
					'param_name' => 'case_count',
					'value'      => 9,
					'admin_label' => true,
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Show filter', 'domica' ),
					'description' => esc_html__('Append filter to grid.', 'domica'),
					'param_name' => 'case_filter',
					'value'      => array(esc_html__('Yes', 'domica') => 'yes'),
					'std' => 'yes',
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Grid elements per row', 'domica' ),
					'description' => esc_html__('Select number of single grid elements per row.', 'domica'),
					'param_name' => 'case_col',
					'value'      => array(1, 2, 3, 4),
					'std' => 3,
					'admin_label' => true,
				),
				array(
			        'type'        => 'textfield',
			        'heading'     => esc_html__('Class', 'domica' ),
			        'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
			        'admin_label' => true,
			        'param_name'  => 'class',
		        ),
		        array(
			        'type'       => 'css_editor',
			        'heading'    => esc_html__( 'CSS', 'domica' ),
			        'param_name' => 'css',
			        'group'      => esc_html__( 'Design Options', 'domica' ),
		        ),
			),
		));

		/*table*/
		vc_map( array(
			'name' => esc_html__( 'Pricing Table', 'domica' ),
			'base' => 'table',
			'icon' => get_template_directory_uri() . '/images/vc/table.png',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'content_element' => true,
			'is_container' => true,
			'js_view' => 'VcColumnView',
			'as_parent' => array(
				'only' => 'table_content'
			),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Table Columns', 'domica' ),
					'param_name' => 'col',
					'edit_field_class' => 'vc_col-sm-6',
					'admin_label' => true,
					'value' => array(2,3,4),
					'std' => '4',
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name'  => 'class',
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group'      => esc_html__( 'Design Options', 'domica' ),
				),
			),
		));

		/*table content*/
		vc_map( array(
			'name' => esc_html__( 'Pricing Table Content', 'domica' ),
			'base' => 'table_content',
			'category' => esc_html__('Bridge Theme', 'domica'),
			// 'as_child' => array(
			// 	'only' => 'table'
			// ),
			'content_element' => true,
			'params' => array(
				/*sale*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Sale', 'domica' ),
					'description' => esc_html__('E.g: Save 20% - go annual', 'domica'),
					'param_name' => 'sale',
					'value' => '',
				),
				/*price*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Package Price', 'domica' ),
					'description' => esc_html__('Enter the price for this package. e.g. $99', 'domica'),
					'param_name' => 'price',
					'value' => '$15',
					'admin_label' => true,
				),
				/*name*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Package Name', 'domica' ),
					'description' => esc_html__('Enter the package name', 'domica'),
					'param_name' => 'name',
					'admin_label' => true,
					'value' => 'REGULAR',
				),
				/*unit*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Price Unit', 'domica' ),
					'description' => esc_html__('Enter the price unit for this package. e.g. per month', 'domica'),
					'param_name' => 'unit',
					'admin_label' => true,
					'value' => '/MONTH',
				),
				/*button*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button text', 'domica' ),
					'description' => esc_html__('Enter call to action button text', 'domica'),
					'param_name' => 'btn',
					'admin_label' => true,
					'value' => 'PURCHASE',
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'Button link', 'domica' ),
					'description' => esc_html__('Select / enter the link for call to action button', 'domica'),
					'param_name' => 'link',
				),
				/*content*/
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Features', 'domica' ),
					'description' => esc_html__('Create the features list using un-ordered list elements.', 'domica'),
					'param_name' => 'content',
				),
				/*feature*/
				array(
					'type' => 'checkbox',
					'param_name' => 'feature',
					'value' => array(
						esc_html__('Featured Price Box', 'domica') => 'yes',
					),
					'std' => 'no',
				),
				/*color*/
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Color 1', 'domica' ),
					'edit_field_class' => 'vc_col-sm-6',
					'description' => esc_html__('Select main color for Table style', 'domica'),
					'param_name' => 'color1',
					'dependency' => array(
						'element' => 'feature',
						'value' => 'yes'
					),
					'value' => ''
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Color 2', 'domica' ),
					'edit_field_class' => 'vc_col-sm-6',
					'description' => esc_html__('Select sub color for Table style', 'domica'),
					'param_name' => 'color2',
					'dependency' => array(
						'element' => 'feature',
						'value' => 'yes'
					),
					'value' => ''
				),
				/*INCLIDE BY DEFAULT*/
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name'  => 'class',
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group'      => esc_html__( 'Design Options', 'domica' ),
				),
			),
		));

		/*blog news*/
		vc_map( array(
			'name' => esc_html__( 'Blog News', 'domica' ),
			'description' => esc_html__( 'Add a Blog News', 'domica' ),
			'base' => 'news',
			'icon' => get_template_directory_uri() . '/images/vc/news.png',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'params' => array(
				/*blog style*/
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'domica' ),
					'param_name' => 'blog_style',
					'value'      => array(
						esc_html__('Blog Post Style 1', 'domica') => 'consult-blog-style-1',
						esc_html__('Blog Post Carousel', 'domica') => 'consult-blog-carousel-style',
					),
					'std'        => 'consult-blog-style-1',
					'admin_label' => true,
				),
				/*count*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Count', 'domica' ),
					'description' => esc_html__('Enter post count', 'domica'),
					'param_name' => 'count',
					'admin_label' => true,
					'value' => 3
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Ignore sticky posts?', 'domica' ),
					'param_name' => 'ignore_sticky_posts',
					'value'      => array(esc_html__('Yes', 'domica') => 'yes'),
					'std' => 'yes',
				),
				/*thumbnail*/
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Display Thumbnail Image?', 'domica' ),
					'param_name' => 'thumb',
					'value' => array(
						esc_html__('Yes','domica') => 'yes'
					),
					'std' => 'yes'
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Order by', 'domica' ),
					'param_name' => 'order_by',
					'value'      => array(
						esc_html__('Default', 'domica') => 'none',
						esc_html__('Date', 'domica') => 'date',
						esc_html__('ID', 'domica') => 'ID',
						esc_html__('Name', 'domica') => 'name',
						esc_html__('Author', 'domica') => 'author',
						esc_html__('Title', 'domica') => 'title',
						esc_html__('Modified', 'domica') => 'modified',
						esc_html__('Random', 'domica') => 'rand',
						esc_html__('Comment count', 'domica') => 'comment_count',
						esc_html__('Menu order', 'domica') => 'menu_order',
					),
					'std'        => 'none',
					'admin_label' => true,
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Sort order', 'domica' ),
					'param_name' => 'sort_order',
					'value'      => array(
						esc_html__('Default', 'domica') => '',
						esc_html__('Ascending', 'domica') => 'ASC',
						esc_html__('Descending', 'domica') => 'DESC',
					),
					'std'        => '',
					'admin_label' => true,
				),
				/*columns*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Columns', 'domica' ),
					'description' => esc_html__('Select post per row', 'domica'),
					'param_name' => 'blog_ppr',
					'admin_label' => true,
					'value' => array(1, 2,3,4),
					'std' => 3
				),	
				// /*color1*/
				// array(
				// 	'type' => 'colorpicker',
				// 	'heading' => esc_html__( 'Custom color 1', 'domica' ),
				// 	'param_name' => 'color1',
				// 	'dependency' => array(
				// 		'element' => 'thumb',
				// 		'value' => 'yes'
				// 	),
				// 	'value' => ''
				// ),
				// /*color2*/
				// array(
				// 	'type' => 'colorpicker',
				// 	'heading' => esc_html__( 'Custom color 2', 'domica' ),
				// 	'param_name' => 'color2',
				// 	'dependency' => array(
				// 		'element' => 'thumb',
				// 		'value' => 'yes'
				// 	),
				// 	'value' => ''
				// ),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name'  => 'class',
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group'      => esc_html__( 'Design Options', 'domica' ),
				),
			),
		));

		/*brand logo*/
		vc_map( array(
			'name'     => esc_html__( 'Brand Logo', 'domica' ),
			'icon' => get_template_directory_uri() . '/images/vc/brand.png',
			'base'     => 'brand',
			'category' => esc_html__( 'Bridge Theme', 'domica' ),
			'params'   => array(
				/*style*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'domica' ),
					'admin_label' => true,
					'param_name' => 'brand_logo_style',
					'value' => array(
						esc_html__('Style 1', 'domica') => 'brand-logo-1',
						esc_html__('Style 2', 'domica') => 'brand-logo-2',
					),
					'std' => 'brand-logo-1'
				),
				/*title*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'domica' ),
					'description' => esc_html__( 'Enter Logo Brand title', 'domica' ),
					'param_name' => 'brand_logo_title',
					'admin_label' => true,
					'value' => 'This is my title',
				),
				/*image attach*/
				array(
					'type'        => 'attach_images',
					'heading'     => esc_html__('Images', 'domica' ),
					'description' => esc_html__('Choose your images', 'domica'),
					'param_name'  => 'imgs',
				),
				/*INCLIDE BY DEFAULT*/
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name'  => 'class',
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group'      => esc_html__( 'Design Options', 'domica' ),
				),
			)
		));

		/*progress bar*/
		vc_map( array(
			'name'     => esc_html__( 'Progress Bar', 'domica' ),
			'icon' => get_template_directory_uri() . '/images/vc/bar.png',
			'base'     => 'progress_bar',
			'category' => esc_html__( 'Bridge Theme', 'domica' ),
			'params'   => array(
				/*value options*/
				array(
					'type' => 'param_group',
					'heading' => esc_html__( 'Values', 'domica' ),
					'param_name' => 'values',
					'description' => esc_html__( 'Enter values for graph - value, title and color.', 'domica' ),
					'value' => urlencode( json_encode( array(
						array(
							'label' => esc_html__( 'Development', 'domica' ),
							'value' => '90',
						),
						array(
							'label' => esc_html__( 'Design', 'domica' ),
							'value' => '80',
						),
						array(
							'label' => esc_html__( 'Marketing', 'domica' ),
							'value' => '70',
						),
					) ) ),
					'params' => array(
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Label', 'domica' ),
							'param_name' => 'label',
							'description' => esc_html__( 'Enter text used as title of bar.', 'domica' ),
							'admin_label' => true,
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Value', 'domica' ),
							'param_name' => 'value',
							'description' => esc_html__( 'Enter value of bar. (Note: value range from 0 to 100)', 'domica' ),
							'admin_label' => true,
						),
						/*enable style custom*/
						array(
							'type' => 'checkbox',
							'heading' => esc_html__( 'Custom color?', 'domica' ),
							'param_name' => 'custom_color',
							'description' => esc_html__( 'Select custom single bar background color.', 'domica' ),
							'value' => array(
								esc_html__('Yes', 'domica') => 'yes'
							),
							'std' => 'no'
						),
						/*background*/
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Custom progress bar color 1', 'domica' ),
							'param_name' => 'bg1',
							'description' => esc_html__( 'Select custom single bar background color.', 'domica' ),
							'dependency' => array(
								'element' => 'custom_color',
								'value' => 'yes',
							),
							'value' => ''
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Custom progress bar color 2', 'domica' ),
							'param_name' => 'bg2',
							'description' => esc_html__( 'Select custom single bar background color.', 'domica' ),
							'dependency' => array(
								'element' => 'custom_color',
								'value' => 'yes',
							),
							'value' => ''
						),
						/*color*/
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Custom text color', 'domica' ),
							'param_name' => 'c_txt',
							'description' => esc_html__( 'Select custom single bar text color.', 'domica' ),
							'dependency' => array(
								'element' => 'custom_color',
								'value' => 'yes',
							),
							'value' => '#ffffff'
						),
					),
				),
				/*unit*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Units', 'domica' ),
					'param_name' => 'unit',
					'description' => esc_html__( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'domica' ),
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name'  => 'class',
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group'      => esc_html__( 'Design Options', 'domica' ),
				),
			)
		));

		/*team member*/
		vc_map( array(
			'name'     => esc_html__( 'Team member', 'domica' ),
			'icon' => get_template_directory_uri() . '/images/vc/team.png',
			'base'     => 'team',
			'category' => esc_html__( 'Bridge Theme', 'domica' ),
			'params'   => array(
				/*align*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Text Align', 'domica' ),
					'param_name' => 'align',
					'admin_label' => true,
					'edit_field_class' => 'vc_col-sm-6',
					'value' => array(
						esc_html__('Left', 'domica') => 'text-left',
						esc_html__('Center', 'domica') => 'text-center',
						esc_html__('Right', 'domica') => 'text-right',
					),
					'std' => 'text-center'
				),
				/*image*/
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Member image', 'domica' ),
					'param_name' => 'img',
					'description' => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'domica' ),
				),
				/*name*/
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__( 'Member Name', 'domica' ),
					'param_name' => 'name',
					'description' => esc_html__( 'Name of the person', 'domica' ),
				),
				/*job*/
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__( 'Member Job', 'domica' ),
					'param_name' => 'job',
					'description' => esc_html__( 'Job title of the person', 'domica' ),
				),
				/*description*/
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Member Description', 'domica' ),
					'param_name' => 'content',
					'description' => esc_html__( 'Enter a few words that describe the person', 'domica' ),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Member social profiles', 'domica' ),
					'param_name' => 'social',
					'admin_label' => true,
					'value' => array(
						esc_html__('Yes', 'domica') => 'yes'
					),
					'std' => 'yes'
				),
				array(
					'type' => 'param_group',
					'heading' => esc_html__( 'Social profile list', 'domica' ),
					'param_name' => 'list',
					'dependency' => array(
						'element' => 'social',
						'value' => 'yes'
					),
					'description' => esc_html__( 'Enter social media links such as Facebook, Twitter, Google Plus...', 'domica' ),
					'value' => urlencode( json_encode( array(
						array(
							'link' => 'http://facebook.com/haintheme',
						),
						array(
							'link' => 'http://twitter.com/haintheme',
						),
						array(
							'link' => 'http://plus.google.com/haintheme',
						),
					) ) ),
					'params' => array(
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Link', 'domica' ),
							'param_name' => 'link',
							'admin_label' => true,
							'description' => esc_html__( 'Enter social media links', 'domica' ),
						),
					),
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name'  => 'class',
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group'      => esc_html__( 'Design Options', 'domica' ),
				)
			)
		));

		/*tabs*/
		vc_map( array(
			'name'     => esc_html__( 'Tabs', 'domica' ),
			'icon' => get_template_directory_uri() . '/images/vc/tabs.png',
			'base'     => 'tabs',
			'category' => esc_html__( 'Bridge Theme', 'domica' ),
			'params'   => array(
				array(
					'type' => 'param_group',
					'heading' => esc_html__( 'Tabs content', 'domica' ),
					'param_name' => 'list',
					'value' => urlencode( json_encode( array(
						array(
							'nav' => 'JAVASCRIPT',
							'title' => 'Javascript',
							'content' => 'Lorem ipsum dolor sit amet, nec in adipiscing purus luctus, urna pell en tesque fringilla vel, non sed arcu integer, mauris ullamcorper ante ut non torquent. Justo praesent, vivamus eleifend torquent, nec in adipiscing purus luctus, urna pellentesque mauris ullamcorper ante ut non torquent fringilla suspendisse.',
						),
						array(
							'nav' => 'HTML5',
							'title' => 'HTML5',
							'content' => 'Lorem ipsum dolor sit amet, nec in adipiscing purus luctus, urna pell en tesque fringilla vel, non sed arcu integer, mauris ullamcorper ante ut non torquent. Justo praesent, vivamus eleifend torquent, nec in adipiscing purus luctus, urna pellentesque mauris ullamcorper ante ut non torquent fringilla suspendisse.',
						),
						array(
							'nav' => 'CSS3',
							'title' => 'CSS3',
							'content' => 'Lorem ipsum dolor sit amet, nec in adipiscing purus luctus, urna pell en tesque fringilla vel, non sed arcu integer, mauris ullamcorper ante ut non torquent. Justo praesent, vivamus eleifend torquent, nec in adipiscing purus luctus, urna pellentesque mauris ullamcorper ante ut non torquent fringilla suspendisse.',
						),
						array(
							'nav' => 'PHP',
							'title' => 'PHP',
							'content' => 'Lorem ipsum dolor sit amet, nec in adipiscing purus luctus, urna pell en tesque fringilla vel, non sed arcu integer, mauris ullamcorper ante ut non torquent. Justo praesent, vivamus eleifend torquent, nec in adipiscing purus luctus, urna pellentesque mauris ullamcorper ante ut non torquent fringilla suspendisse.',
						),
						array(
							'nav' => 'MYSQL',
							'title' => 'MYSQL',
							'content' => 'Lorem ipsum dolor sit amet, nec in adipiscing purus luctus, urna pell en tesque fringilla vel, non sed arcu integer, mauris ullamcorper ante ut non torquent. Justo praesent, vivamus eleifend torquent, nec in adipiscing purus luctus, urna pellentesque mauris ullamcorper ante ut non torquent fringilla suspendisse.',
						),
					))),
					'params' => array(
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Nav', 'domica' ),
							'param_name' => 'nav',
							'edit_field_class' => 'vc_col-sm-6',
							'admin_label' => true,
						),
						array(
							'type' => 'checkbox',
							'heading' => esc_html__( 'Custom Nav', 'domica' ),
							'param_name' => 'nav_cus',
							'value' => array(
								esc_html__( 'Yes', 'domica' ) => 'yes'
							),
							'std' => 'no'
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Text Color', 'domica' ),
							'param_name' => 'txt_color',
							'dependency' => array(
								'element' => 'nav_cus',
								'value' => 'yes'
							),
							'value' => '',
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Background Color', 'domica' ),
							'param_name' => 'bg_color',
							'dependency' => array(
								'element' => 'nav_cus',
								'value' => 'yes'
							),
							'value' => '',
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Title Content', 'domica' ),
							'param_name' => 'title',
							'edit_field_class' => 'vc_col-sm-6',
							'admin_label' => true,
						),
						array(
							'type' => 'textarea',
							'heading' => esc_html__( 'Content', 'domica' ),
							'param_name' => 'content',
						),
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name'  => 'class',
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group'      => esc_html__( 'Design Options', 'domica' ),
				)
			)
		));
		/*map*/
		vc_map( array(
			'name' => esc_html__( 'Map', 'domica' ),
			'base' => 'map',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'description' => esc_html__( 'Add a Custom Map', 'domica' ),
			'params' => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Address or Coordinate', 'domica' ),
					'admin_label' => true,
					'param_name'  => 'address',
					'value'       => '40.713789,-74.010944',
					'description' => wp_kses(esc_html__( 'Enter address or coordinate. (Note: separate values with "," )<br><a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank" >Here is a tool</a> where you can find Latitude &amp; Longitude of your location.', 'domica' ),
						array( 
							'br' => array(), 
							'a' => array( 
								'href' => array(), 
								'target' => array()
								)
							)
						)
				),
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Marker icon', 'domica' ),
					'param_name'  => 'marker_icon',
					'description' => esc_html__( 'Choose a image for marker address', 'domica' ),
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__( 'Marker Information', 'domica' ),
					'param_name'  => 'maker_info',
					'description' => esc_html__( 'Content for info window', 'domica' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Height', 'domica' ),
					'param_name'  => 'map_height',
					'value'       => '500',
					'description' => esc_html__( 'Enter map height. Ex: 450', 'domica' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Width', 'domica' ),
					'param_name'  => 'map_width',
					'value'       => '100%',
					'description' => esc_html__( 'Enter map width (in pixels or percentage)', 'domica' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Zoom level', 'domica' ),
					'param_name'  => 'zoom',
					'value'       => '13',
					'description' => esc_html__( 'Map zoom level', 'domica' ),
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Enable Map zoom', 'domica' ),
					'param_name' => 'zoom_enable',
					'value'      => array(
						esc_html__( 'Enable', 'domica' ) => 'enable'
					),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Map type', 'domica' ),
					'admin_label' => true,
					'param_name'  => 'map_type',
					'description' => esc_html__( 'Choose a map type', 'domica' ),
					'value'       => array(
						esc_html__( 'Roadmap', 'domica' )   => 'roadmap',
						esc_html__( 'Satellite', 'domica' ) => 'satellite',
						esc_html__( 'Hybrid', 'domica' )    => 'hybrid',
						esc_html__( 'Terrain', 'domica' )   => 'terrain',
					),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Map style', 'domica' ),
					'admin_label' => true,
					'param_name'  => 'map_style',
					'description' => esc_html__( 'Choose a map style. This approach changes the style of the Roadmap types (base imagery in terrain and satellite views is not affected, but roads, labels, etc. respect styling rules', 'domica' ),
					'value'       => array(
						esc_html__( 'Default', 'domica' )          => 'default',
						esc_html__( 'Grayscale', 'domica' )        => 'style1',
						esc_html__( 'Subtle Grayscale', 'domica' ) => 'style2',
						esc_html__( 'Apple Maps-esque', 'domica' ) => 'style3',
						esc_html__( 'Pale Dawn', 'domica' )        => 'style4',
						esc_html__( 'Muted Blue', 'domica' )       => 'style5',
						esc_html__( 'Paper', 'domica' )            => 'style6',
						esc_html__( 'Light Dream', 'domica' )      => 'style7',
						esc_html__( 'Retro', 'domica' )            => 'style8',
						esc_html__( 'Avocado World', 'domica' )    => 'style9',
						esc_html__( 'Shades of Grey', 'domica' )   => 'style10',
						esc_html__( 'Blue water', 'domica' )       => 'style11',
						esc_html__( 'Custom', 'domica' )           => 'custom'
					),
					'std' => 'style11'
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'Map style snippet', 'domica' ),
					'param_name' => 'map_custom',
					'dependency' => array(
						'element' => 'map_style',
						'value'   => 'custom',
					),
					'value' => '',
					'description' => wp_kses(esc_html__( 'You can visit <a href="https://snazzymaps.com/" target="_blank">https://snazzymaps.com/</a> to get Google Map styles', 'domica' ),
						array( 
							'a' => array( 
								'href' => array(), 
								'target' => array()
								)
							)
						),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Contact Map', 'domica' ),
					'description' => esc_html__( 'Select position of Contact Map.', 'domica' ),
					'param_name' => 'contact_map',
					'admin_label' => true,
					'value' => array(
						esc_html__( 'Left', 'domica' ) => 'left',
						esc_html__( 'Right', 'domica' ) => 'right',
						esc_html__( 'None', 'domica' ) => 'none',
					),
					'std' => 'right',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Contact Map Title', 'domica' ),
					'param_name' => 'contact_map_title',
					'value' => 'New York City, USA',
					'dependency' => array(
						'element' => 'contact_map',
						'value' => array( 'right', 'left' ),
					),
					'description' => esc_html__( 'Enter Title of Contact Map', 'domica' ),
				),
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Contact Map Info', 'domica' ),
					'param_name' => 'content',
					'dependency' => array(
						'element' => 'contact_map',
						'value' => array( 'right', 'left' ),
					),
					'description' => esc_html__( 'Write some text', 'domica' ),
					'value' =>
					'<ul class="consult-contact-map">
					<li><i class="ion-ios-location"></i>148 Commercity Isola Road, M1 R43 NYC, USA</li>
					<li><i class="ion-android-phone-portrait"></i>+3 864-784-4848</li>
					<li><i class="ion-ios-email"></i>YourName@Domain.com</li>
					</ul>',
				),
				array(
			        'type'        => 'textfield',
			        'heading'     => esc_html__('Class', 'domica' ),
			        'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
			        'admin_label' => true,
			        'param_name'  => 'el_class',
		        ),
		        array(
			        'type'       => 'css_editor',
			        'heading'    => esc_html__( 'CSS', 'domica' ),
			        'param_name' => 'css',
			        'group'      => esc_html__( 'Design Options', 'domica' ),
		        ),
			),
		));
		/*lading page*/
		vc_map( array(
			'name'     => esc_html__( 'Landing', 'domica' ),
			'icon' => get_template_directory_uri() . '/images/vc/landing.png',
			'base'     => 'landing',
			'category' => esc_html__( 'Bridge Theme', 'domica' ),
			'params'   => array(
				/*image attach*/
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__('Images', 'domica' ),
					'description' => esc_html__('Choose your images', 'domica'),
					'param_name'  => 'img',
				),
				/*link*/
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Url', 'domica' ),
					'description' => esc_html__('Enter your url', 'domica'),
					'param_name'  => 'url',
					'admin_label' => true,
					'value' => '#'
				),
				/*title*/
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'domica' ),
					'description' => esc_html__('Enter the title', 'domica'),
					'param_name'  => 'title',
					'admin_label' => true,
					'value' => 'Layout'
				),
				/*desc*/
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Description', 'domica' ),
					'description' => esc_html__('Write some text', 'domica'),
					'param_name'  => 'desc',
					'admin_label' => true,
					'value' => 'LAUNCH NOW'
				),
				/*color 1*/
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__('Custom hover color 1', 'domica' ),
					'param_name'  => 'color1',
					'value' => ''
				),
				/*color 2*/
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__('Custom hover color 2', 'domica' ),
					'param_name'  => 'color2',
					'value' => ''
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name'  => 'class',
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group'      => esc_html__( 'Design Options', 'domica' ),
				),
			)
		));

		/*iconbox carousel container*/
		vc_map( array(
			'name' => esc_html__( 'Iconbox Carousel', 'domica' ),
			'base' => 'iconbox_carousel',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'description' => esc_html__( 'Add a Carousel of Iconbox', 'domica' ),
			'show_settings_on_create' => false,
			'content_element' => true,
			'is_container' => true,
			'js_view' => 'VcColumnView',
			'as_parent' => array(
				'only' => 'iconbox',
			),
			'params' => array(
				array(
			        'type'        => 'textfield',
			        'heading'     => esc_html__('Class', 'domica' ),
			        'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
			        'admin_label' => true,
			        'param_name'  => 'class',
		        ),
		        array(
			        'type'       => 'css_editor',
			        'heading'    => esc_html__( 'CSS', 'domica' ),
			        'param_name' => 'css',
			        'group'      => esc_html__( 'Design Options', 'domica' ),
		        ),
			),
		));

		/*lightbox-video*/

		vc_map( array(
			'name' => esc_html__( 'Video Lightbox', 'domica' ),
			'base' => 'lightbox_video',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'description' => esc_html__( 'Add a Video Lightbox', 'domica' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Video Url', 'domica' ),
					'param_name' => 'light_url',
					'description' => esc_html__( 'Enter video url here. This options support Vimeo and Youtube. Ex: https://vimeo.com/137213101', 'domica' ),
					'value' => 'https://www.youtube.com/watch?v=RH3OxVFvTeg',
					'admin_label' => true
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Left heading', 'domica' ),
					'param_name' => 'left_heading',
					'description' => esc_html__( '', 'domica' ),
					'value' => 'Create a',
					'admin_label' => true
				),
				/*heading*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Right heading', 'domica' ),
					'param_name' => 'right_heading',
					'description' => esc_html__( '', 'domica' ),
					'value' => 'new Life',
					'admin_label' => true
				),
				/*heading color*/
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Color', 'domica' ),
					'param_name' => 'color',
					'value' => '#ffffff',
				),
				/*heading font size*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Font Size', 'domica' ),
					'param_name' => 'font_size',
					'value' => '72px',
					'description' => esc_html('Enter font size. Ex: "30px", "1.5rem" or "2em"', 'domica'),
				),
				/*icon*/
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon play', 'domica' ),
					'param_name' => 'light_icon',
					'value' => 'fa fa-play',
					'description' => esc_html__( 'Select icon from library.', 'domica' ),
				),
				array(
			        'type'        => 'textfield',
			        'heading'     => esc_html__('Class', 'domica' ),
			        'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
			        'admin_label' => true,
			        'param_name'  => 'class',
		        ),
		        array(
			        'type'       => 'css_editor',
			        'heading'    => esc_html__( 'CSS', 'domica' ),
			        'param_name' => 'css',
			        'group'      => esc_html__( 'Design Options', 'domica' ),
		        ),
			),
		));

		/*stories*/

		vc_map(array(
			'name' => esc_html__( 'Stories', 'domica' ),
			'base' => 'stories',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'params' => array(
				/*column*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Post per row', 'domica' ),
					'param_name' => 'stories_per',
					'value' => array(1, 2, 3, 4),
					'std' => '3'
				),
				/*post count*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Post count', 'domica' ),
					'admin_label' => true,
					'param_name' => 'stories_count',
					'value' => '6'
				),
				/*text color*/
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Text Color', 'domica' ),
					'admin_label' => true,
					'param_name' => 'text_color',
					'value' => '#333333'
				),
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name' => 'class',
				),
				array(
					'type' => 'css_editor',
					'heading'=> esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group' => esc_html__( 'Design Options', 'domica' ),
				),
			)
		));

		vc_map(array(
			'name' => esc_html__( 'Portfolio Title', 'domica' ),
			'base' => 'portfolio_title',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'params' => array(
				/*INCLIDE BY DEFAULT*/
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Class', 'domica' ),
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
					'admin_label' => true,
					'param_name' => 'class',
				),
				array(
					'type' => 'css_editor',
					'heading'=> esc_html__( 'CSS', 'domica' ),
					'param_name' => 'inline_css',
					'group' => esc_html__( 'Design Options', 'domica' ),
				),
			)
		));
		/*countdown*/
        vc_map( array(
            'name' => esc_html__( 'Countdown Time', 'domica' ),
            'base' => 'countdown',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'description' => esc_html__( 'Add a Countdown Time', 'domica' ),
            'content_element' => true,
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Time', 'domica' ),
                    'param_name' => 'time',
                    'value' => '10/27/2017 14:30:00',
                    'description' => esc_html__( 'Enter datetime. For example: 10/20/2020 17:30:00', 'domica' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'time_color',
                    'value' => '#000',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Day text', 'domica' ),
                    'param_name' => 'days',
                    'value' => 'Days',
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'day_color',
                    'value' => '#000',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Hours text', 'domica' ),
                    'param_name' => 'hours',
                    'value' => 'Hours',
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'hours_color',
                    'value' => '#000',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Minute text', 'domica' ),
                    'param_name' => 'minutes',
                    'value' => 'Minutes',
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'minute_color',
                    'value' => '#000',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Second text', 'domica' ),
                    'param_name' => 'seconds',
                    'value' => 'Seconds',
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'second_color',
                    'value' => '#000',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'URL', 'domica' ),
                    'param_name' => 'url',
                    'description' => esc_html__('Go to the URL when end countdown (Optional)', 'domica'),
                    'value' => '',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Class', 'domica' ),
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
                    'admin_label' => true,
                    'param_name'  => 'class',
                ),
                array(
                    'type'       => 'css_editor',
                    'heading'    => esc_html__( 'CSS', 'domica' ),
                    'param_name' => 'css',
                    'group'      => esc_html__( 'Design Options', 'domica' ),
                ),
            ),
        ));
        /*events*/
        vc_map(array(
            'name' => esc_html__( 'Events', 'domica' ),
            // 'icon' => get_template_directory_uri() . '/images/vc/event.png',
            'base' => 'events',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
            	/*event style*/
            	array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'domica' ),
					'param_name' => 'event_style',
					'value'      => array(
						esc_html__('Style 1 Grid v1', 'domica') => 'event-style-1',
						esc_html__('Style 2 Grid v2 ', 'domica') => 'event-style-2',
						esc_html__('Style 3 List v1', 'domica') => 'event-style-3',
						esc_html__('Style 4 List v2 ', 'domica') => 'event-style-4',
					),
					'std'        => 'event-style-1',
					'admin_label' => true,
				),
                /*column*/
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Post per row', 'domica' ),
                    'param_name' => 'event_per',
                    'value' => array(1, 2, 3),
                    'std' => '3'
                ),
                /*post count*/
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Post count', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'event_count',
                    'value' => '3'
                ),
                /*text color*/
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Text Color', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'color',
                    'value' => ''
                ),
                /*INCLIDE BY DEFAULT*/
                vc_map_add_css_animation(),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Class', 'domica' ),
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
                    'admin_label' => true,
                    'param_name' => 'class',
                ),
                array(
                    'type' => 'css_editor',
                    'heading'=> esc_html__( 'CSS', 'domica' ),
                    'param_name' => 'inline_css',
                    'group' => esc_html__( 'Design Options', 'domica' ),
                ),
            )
        ));
        /*event organizer*/
        vc_map(array(
            'name' => esc_html__( 'Event Organizers', 'domica' ),
            // 'icon' => get_template_directory_uri() . '/images/vc/event.png',
            'base' => 'event_organizer',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
            	/*event style*/
            	array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'domica' ),
					'param_name' => 'event_style',
					'value'      => array(
						esc_html__('Event Organizer', 'domica') => 'event-organizer',
					),
					'std'        => 'event-organizer',
					'admin_label' => true,
				),
                /*column*/
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Post per row', 'domica' ),
                    'param_name' => 'event_per',
                    'value' => array(1),
                    'std' => '1'
                ),
                /*post count*/
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Post count', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'event_count',
                    'value' => '1'
                ),
                /*text color*/
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Text Color', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'color',
                    'value' => ''
                ),
                /*INCLIDE BY DEFAULT*/
                vc_map_add_css_animation(),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Class', 'domica' ),
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
                    'admin_label' => true,
                    'param_name' => 'class',
                ),
                array(
                    'type' => 'css_editor',
                    'heading'=> esc_html__( 'CSS', 'domica' ),
                    'param_name' => 'inline_css',
                    'group' => esc_html__( 'Design Options', 'domica' ),
                ),
            )
        ));
        /*event current item for event single page*/
        vc_map(array(
            'name' => esc_html__( 'Event Current Item', 'domica' ),
            // 'icon' => get_template_directory_uri() . '/images/vc/event.png',
            'base' => 'event_current_item',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
            	/*event style*/
            	array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'domica' ),
					'param_name' => 'event_style',
					'value'      => array(
						esc_html__('Event Current Item Style 1', 'domica') => 'event-current-item-style-1',
						esc_html__('Event Current Item Style 2', 'domica') => 'event-current-item-style-2',
					),
					'std'        => 'event-current-item-style-1',
					'admin_label' => true,
				),
                /*column*/
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Post per row', 'domica' ),
                    'param_name' => 'event_per',
                    'value' => array(1),
                    'std' => '1'
                ),
                /*post count*/
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Post count', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'event_count',
                    'value' => '1'
                ),
                /*text color*/
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Text Color', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'color',
                    'value' => ''
                ),
                /*INCLIDE BY DEFAULT*/
                vc_map_add_css_animation(),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Class', 'domica' ),
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
                    'admin_label' => true,
                    'param_name' => 'class',
                ),
                array(
                    'type' => 'css_editor',
                    'heading'=> esc_html__( 'CSS', 'domica' ),
                    'param_name' => 'inline_css',
                    'group' => esc_html__( 'Design Options', 'domica' ),
                ),
            )
        ));
        /*event map*/
		vc_map( array(
			'name' => esc_html__( 'Event Map', 'domica' ),
			'base' => 'event_map',
			'category' => esc_html__('Bridge Theme', 'domica'),
			'description' => esc_html__( 'Add a Custom Map Event', 'domica' ),
			'params' => array(
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Marker icon', 'domica' ),
					'param_name'  => 'marker_icon',
					'description' => esc_html__( 'Choose a image for marker address', 'domica' ),
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__( 'Marker Information', 'domica' ),
					'param_name'  => 'maker_info',
					'description' => esc_html__( 'Content for info window', 'domica' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Height', 'domica' ),
					'param_name'  => 'map_height',
					'value'       => '200',
					'description' => esc_html__( 'Enter map height. Ex: 450', 'domica' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Width', 'domica' ),
					'param_name'  => 'map_width',
					'value'       => '100%',
					'description' => esc_html__( 'Enter map width (in pixels or percentage)', 'domica' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Zoom level', 'domica' ),
					'param_name'  => 'zoom',
					'value'       => '13',
					'description' => esc_html__( 'Map zoom level', 'domica' ),
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Enable Map zoom', 'domica' ),
					'param_name' => 'zoom_enable',
					'value'      => array(
						esc_html__( 'Enable', 'domica' ) => 'enable'
					),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Map type', 'domica' ),
					'admin_label' => true,
					'param_name'  => 'map_type',
					'description' => esc_html__( 'Choose a map type', 'domica' ),
					'value'       => array(
						esc_html__( 'Roadmap', 'domica' )   => 'roadmap',
						esc_html__( 'Satellite', 'domica' ) => 'satellite',
						esc_html__( 'Hybrid', 'domica' )    => 'hybrid',
						esc_html__( 'Terrain', 'domica' )   => 'terrain',
					),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Map style', 'domica' ),
					'admin_label' => true,
					'param_name'  => 'map_style',
					'description' => esc_html__( 'Choose a map style. This approach changes the style of the Roadmap types (base imagery in terrain and satellite views is not affected, but roads, labels, etc. respect styling rules', 'domica' ),
					'value'       => array(
						esc_html__( 'Default', 'domica' )          => 'default',
						esc_html__( 'Grayscale', 'domica' )        => 'style1',
						esc_html__( 'Subtle Grayscale', 'domica' ) => 'style2',
						esc_html__( 'Apple Maps-esque', 'domica' ) => 'style3',
						esc_html__( 'Pale Dawn', 'domica' )        => 'style4',
						esc_html__( 'Muted Blue', 'domica' )       => 'style5',
						esc_html__( 'Paper', 'domica' )            => 'style6',
						esc_html__( 'Light Dream', 'domica' )      => 'style7',
						esc_html__( 'Retro', 'domica' )            => 'style8',
						esc_html__( 'Avocado World', 'domica' )    => 'style9',
						esc_html__( 'Shades of Grey', 'domica' )   => 'style10',
						esc_html__( 'Blue water', 'domica' )       => 'style11',
						esc_html__( 'Custom', 'domica' )           => 'custom'
					),
					'std' => 'style11'
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'Map style snippet', 'domica' ),
					'param_name' => 'map_custom',
					'dependency' => array(
						'element' => 'map_style',
						'value'   => 'custom',
					),
					'value' => '',
					'description' => wp_kses(esc_html__( 'You can visit <a href="https://snazzymaps.com/" target="_blank">https://snazzymaps.com/</a> to get Google Map styles', 'domica' ),
						array( 
							'a' => array( 
								'href' => array(), 
								'target' => array()
								)
							)
						),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Contact Map', 'domica' ),
					'description' => esc_html__( 'Select position of Contact Map.', 'domica' ),
					'param_name' => 'contact_map',
					'admin_label' => true,
					'value' => array(
						esc_html__( 'Left', 'domica' ) => 'left',
						esc_html__( 'Right', 'domica' ) => 'right',
						esc_html__( 'None', 'domica' ) => 'none',
					),
					'std' => 'right',
				),
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Contact Map Info', 'domica' ),
					'param_name' => 'content',
					'dependency' => array(
						'element' => 'contact_map',
						'value' => array( 'right', 'left' ),
					),
					'description' => esc_html__( 'Write some text', 'domica' ),
					'value' =>
					'<ul class="consult-contact-map">
					<li><i class="ion-ios-location"></i>148 Commercity Isola Road, M1 R43 NYC, USA</li>
					<li><i class="ion-android-phone-portrait"></i>+3 864-784-4848</li>
					<li><i class="ion-ios-email"></i>YourName@Domain.com</li>
					</ul>',
				),
				array(
			        'type'        => 'textfield',
			        'heading'     => esc_html__('Class', 'domica' ),
			        'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
			        'admin_label' => true,
			        'param_name'  => 'el_class',
		        ),
		        array(
			        'type'       => 'css_editor',
			        'heading'    => esc_html__( 'CSS', 'domica' ),
			        'param_name' => 'css',
			        'group'      => esc_html__( 'Design Options', 'domica' ),
		        ),
			),
		));
        /*staff*/
        vc_map(array(
            'name' => esc_html__( 'Staff', 'domica' ),
            'icon' => get_template_directory_uri() . '/images/vc/team.png',
            'base' => 'staff',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
            	/*event style*/
            	array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'domica' ),
					'param_name' => 'staff_style',
					'value'      => array(
						esc_html__('Style 1', 'domica') => 'staff-style-1',
						esc_html__('Style Carousel', 'domica') => 'staff-carousel-style',
					),
					'std'        => 'staff-style-1',
					'admin_label' => true,
				),
                /*column*/
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Post per row', 'domica' ),
                    'param_name' => 'staff_per',
                    'value' => array(3, 4),
                    'std' => '3'
                ),
                /*post count*/
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Post count', 'domica'),
                    'admin_label' => true,
                    'param_name' => 'staff_count',
                    'value' => '6'
                ),
                /*text color*/
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Text Color', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'color',
                    'value' => ''
                ),
                /*INCLIDE BY DEFAULT*/
                vc_map_add_css_animation(),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Class', 'domica' ),
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
                    'admin_label' => true,
                    'param_name' => 'class',
                ),
                array(
                    'type' => 'css_editor',
                    'heading'=> esc_html__( 'CSS', 'domica' ),
                    'param_name' => 'inline_css',
                    'group' => esc_html__( 'Design Options', 'domica' ),
                ),
            )
		));
		/*staff current images*/
		vc_map(array(
            'name' => esc_html__( 'Staff Current Image', 'domica' ),
          	'icon' => get_template_directory_uri() . '/images/vc/team.png',
            'base' => 'staff_current_image',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
            	/*event style*/
            	array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'domica' ),
					'param_name' => 'staff_style',
					'value'      => array(
						esc_html__('Staff Current Image', 'domica') => 'staff-current-image',
					),
					'std'        => 'staff-current-image',
					'admin_label' => true,
				),
                /*column*/
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Post per row', 'domica' ),
                    'param_name' => 'staff_per',
                    'value' => array(1),
                    'std' => '1'
                ),
                /*post count*/
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Post count', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'staff_count',
                    'value' => '1'
                ),
            )
		));
		/*staff current infor*/
		vc_map(array(
            'name' => esc_html__( 'Staff Current Infor', 'domica' ),
          	'icon' => get_template_directory_uri() . '/images/vc/team.png',
            'base' => 'staff_current_infor',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
            	/*event style*/
            	array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'domica' ),
					'param_name' => 'staff_style',
					'value'      => array(
						esc_html__('Staff Current Infor', 'domica') => 'staff-current-infor',
					),
					'std'        => 'staff-current-infor',
					'admin_label' => true,
				),
                /*column*/
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Post per row', 'domica' ),
                    'param_name' => 'staff_per',
                    'value' => array(1),
                    'std' => '1'
                ),
                /*post count*/
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Post count', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'staff_count',
                    'value' => '1'
                ),
            )
		));
		/*staff social links*/
		vc_map(array(
            'name' => esc_html__( 'Staff Social Links', 'domica' ),
          	'icon' => get_template_directory_uri() . '/images/vc/team.png',
            'base' => 'staff_socials',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
            	/*event style*/
            	array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'domica' ),
					'param_name' => 'staff_style',
					'value'      => array(
						esc_html__('Staff Social Links', 'domica') => 'staff-socials',
					),
					'std'        => 'staff-socials',
					'admin_label' => true,
				),
                /*column*/
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Post per row', 'domica' ),
                    'param_name' => 'staff_per',
                    'value' => array(1),
                    'std' => '1'
                ),
                /*post count*/
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Post count', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'staff_count',
                    'value' => '1'
                ),
            )
		));
        /*sermon*/
        vc_map(array(
            'name' => esc_html__( 'Sermon', 'domica' ),
            // 'icon' => get_template_directory_uri() . '/images/vc/team.png',
            'base' => 'sermon',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
            	/*sermon style*/
            	array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'domica' ),
					'param_name' => 'sermon_style',
					'value'      => array(
						esc_html__('Sermon style 1', 'domica') => 'sermon-style-1',
						esc_html__('Sermon style 2', 'domica') => 'sermon-style-2',
						esc_html__('Sermon style 3 without sermon image', 'domica') => 'sermon-style-3',
						esc_html__('Sermon Style Carousel', 'domica') => 'sermon-carousel-style',
						esc_html__('Sermon style 4', 'domica') => 'sermon-style-4',
						esc_html__('Sermon style 5', 'domica') => 'sermon-style-5',
					),
					'std'        => 'sermon-style-1',
					'admin_label' => true,
				),
                /*column*/
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Post per row', 'domica' ),
                    'param_name' => 'sermon_per',
                    'value' => array(1, 2, 3, 4),
                    'std' => '3'
                ),
                /*post count*/
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Post count', 'domica'),
                    'admin_label' => true,
                    'param_name' => 'sermon_count',
                    'value' => '6'
                ),
                /*text color*/
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Text Color', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'color',
                    'value' => ''
                ),
                /*INCLIDE BY DEFAULT*/
                vc_map_add_css_animation(),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Class', 'domica' ),
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
                    'admin_label' => true,
                    'param_name' => 'class',
                ),
                array(
                    'type' => 'css_editor',
                    'heading'=> esc_html__( 'CSS', 'domica' ),
                    'param_name' => 'inline_css',
                    'group' => esc_html__( 'Design Options', 'domica' ),
                ),
            )
        ));
        /*gallery*/
        vc_map( array(
			'name'     => esc_html__( 'Gallery', 'domica' ),
			// 'icon' => get_template_directory_uri() . '/images/vc/brand.png',
			'base'     => 'gallery_img',
			'category' => esc_html__( 'Bridge Theme', 'domica' ),
			'params'   => array(
				/*style*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'domica' ),
					'admin_label' => true,
					'param_name' => 'gallery_style',
					'value' => array(
						esc_html__('Style Full width', 'domica') => 'gallery-style-1',
						esc_html__('Style Standard', 'domica') => 'gallery-style-2',
						esc_html__('Style 3', 'domica') => 'gallery-style-3',
					),
					'std' => 'gallery-style-1'
				),
				
				/*subtitle*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Sub title', 'domica' ),
					'description' => esc_html__( 'Enter Gallery subtitle', 'domica' ),
					'param_name' => 'gallery_subtitle',
					'admin_label' => true,
					'value' => 'This is my sub title',
				),
				/*title*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'domica' ),
					'description' => esc_html__( 'Enter Gallery title', 'domica' ),
					'param_name' => 'gallery_title',
					'admin_label' => true,
					'value' => 'This is my title',
				),
				/*image attach*/
				array(
					'type'        => 'attach_images',
					'heading'     => esc_html__('Images', 'domica' ),
					'description' => esc_html__('Choose your images', 'domica'),
					'param_name'  => 'gallery_img',
				),
				/*image size custom*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image size', 'domica' ),
					'param_name' => 'image_size',
					'value' => 'thumbnail',
					'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'domica' ),
				),

			)
		));

		/* cause */
        vc_map(array(
            'name' => esc_html__( 'Cause', 'domica' ),
            'base' => 'cause',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
            	/*cause style*/
            	array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'domica' ),
					'param_name' => 'cause_style',
					'value'      => array(
						esc_html__('Cause Standard', 'domica') => 'cause-standard',
						esc_html__('Cause List', 'domica') => 'cause-list',
						esc_html__('Cause Grid', 'domica') => 'cause-grid',
					),
					'std'        => 'cause-standard',
					'admin_label' => true,
				),
                /*column*/
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Post per row', 'domica' ),
                    'param_name' => 'cause_per',
                    'value' => array(1,3,4),
                    'std' => '1'
                ),
                /*post count*/
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Post count', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'cause_count',
                    'value' => array(6, 9, 12),
                    'value' => '5'
                ),
                /*text color*/
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Text Color', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'color',
                    'value' => '#333333'
                ),
                /*INCLIDE BY DEFAULT*/
                vc_map_add_css_animation(),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Class', 'domica' ),
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
                    'admin_label' => true,
                    'param_name' => 'class',
                ),
                array(
                    'type' => 'css_editor',
                    'heading'=> esc_html__( 'CSS', 'domica' ),
                    'param_name' => 'inline_css',
                    'group' => esc_html__( 'Design Options', 'domica' ),
                ),
            )
        ));

                /* sharing */
        vc_map(array(
            'name' => esc_html__( 'Social Sharing', 'domica' ),
            'base' => 'social_sharing',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
            	/*title*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'domica' ),
					'description' => esc_html__( 'Enter social sharing title', 'domica' ),
					'param_name' => 'social_sharing_title',
					'admin_label' => true,
					'value' => 'Share this cause',
				),
                /*INCLIDE BY DEFAULT*/
                vc_map_add_css_animation(),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Class', 'domica' ),
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
                    'admin_label' => true,
                    'param_name' => 'class',
                ),
                array(
                    'type' => 'css_editor',
                    'heading'=> esc_html__( 'CSS', 'domica' ),
                    'param_name' => 'inline_css',
                    'group' => esc_html__( 'Design Options', 'domica' ),
                ),
            )
        ));

        /* campaign info */
        vc_map(array(
            'name' => esc_html__( 'Campaign Information', 'domica' ),
            'base' => 'campaign_info',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
                /*INCLIDE BY DEFAULT*/
                vc_map_add_css_animation(),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Class', 'domica' ),
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
                    'admin_label' => true,
                    'param_name' => 'class',
                ),
                array(
                    'type' => 'css_editor',
                    'heading'=> esc_html__( 'CSS', 'domica' ),
                    'param_name' => 'inline_css',
                    'group' => esc_html__( 'Design Options', 'domica' ),
                ),
            )
        ));
        
        /* related causes */
        vc_map(array(
            'name' => esc_html__( 'Related Causes', 'domica' ),
            'base' => 'related_campaigns',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
            	/*title*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'domica' ),
					'description' => esc_html__( 'Enter title', 'domica' ),
					'param_name' => 'related_causes_title',
					'admin_label' => true,
					'value' => 'Related causes',
				),
                /*post count*/
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Post count', 'domica' ),
                    'admin_label' => true,
                    'param_name' => 'campaign_count',
                    'value' => '3'
                ),
                /*INCLIDE BY DEFAULT*/
                vc_map_add_css_animation(),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Class', 'domica' ),
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
                    'admin_label' => true,
                    'param_name' => 'class',
                ),
                array(
                    'type' => 'css_editor',
                    'heading'=> esc_html__( 'CSS', 'domica' ),
                    'param_name' => 'inline_css',
                    'group' => esc_html__( 'Design Options', 'domica' ),
                ),
            )
        ));

        /* campaign info */
        vc_map(array(
            'name' => esc_html__( 'Search for causes', 'domica' ),
            'base' => 'search_causes',
            'category' => esc_html__('Bridge Theme', 'domica'),
            'params' => array(
            	/*title*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'domica' ),
					'description' => esc_html__( 'Enter title', 'domica' ),
					'param_name' => 'search_causes_title',
					'admin_label' => true,
					'value'
				),
                /*INCLIDE BY DEFAULT*/
                vc_map_add_css_animation(),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Class', 'domica' ),
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'domica'),
                    'admin_label' => true,
                    'param_name' => 'class',
                ),
                array(
                    'type' => 'css_editor',
                    'heading'=> esc_html__( 'CSS', 'domica' ),
                    'param_name' => 'inline_css',
                    'group' => esc_html__( 'Design Options', 'domica' ),
                ),
            )
        ));
    }
}