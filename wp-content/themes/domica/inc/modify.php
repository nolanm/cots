<?php
vc_map( array(
			'name'     => esc_html__( 'Blog News', 'domica' ),
			'description' => esc_html__( 'Add a Blog News', 'domica' ),
			'base'     => 'news',
			'icon' => get_template_directory_uri() . '/images/vc/news.png',
			'category' => esc_html__( 'Bridge Theme', 'domica' ),
			'params'   => array(
				/*blog style*/
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'domica' ),
					'param_name' => 'blog_style',
					'value'      => array(
						esc_html__('Style 1', 'domica') => 'consult-blog-style-1',
						esc_html__('Style 2', 'domica') => 'consult-blog-style-2',
						esc_html__('Style 3', 'domica') => 'consult-blog-style-3',
						esc_html__('Style 4', 'domica') => 'consult-blog-style-4',
						esc_html__('Style 5', 'domica') => 'consult-blog-style-5',
					),
					'std'        => 'consult-blog-style-1',
					'admin_label' => true,
				),
				/*count*/
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Count', 'domica' ),
					'description' => esc_html__('Enter post count', 'domica'),
					'param_name' => 'post_count',
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
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Posts Per Row', 'domica' ),
					'param_name' => 'blog_ppr',
					'value'      => array(1, 2, 3, 4),
					'std'        => 3,
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
			)
		) );
 ?>