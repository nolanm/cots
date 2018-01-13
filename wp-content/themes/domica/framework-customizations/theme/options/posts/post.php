<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' );}

$post_options = array(
	// custom post title
	'p_custom_title' => array(
		'type' => 'box',
		'title' => false,
		'options' => array(
			'spc_opt' => array(
				'label' => false,
				'desc'  => false,
				'type'  => 'multi-picker',
				'picker' => array(
					'gadget' => array(
						'label'   => esc_html__('Custom Page Title', 'domica'),
			            'type'    => 'switch',
			            'left-choice' => array(
			            	'label' => esc_html__('No', 'domica'),
			            	'value' => 'no'
		            	),
		            	'right-choice' => array(
			            	'label' => esc_html__('Yes', 'domica'),
			            	'value' => 'yes'
		            	),
		            	'value' => 'no',
					),
				),
				'choices' => array(
					'yes' => array(
						'spc_title' => array(
							'label' => esc_html__( 'Alternative Title', 'domica'),
							'desc'  => esc_html__( 'This will replace heading post title', 'domica'),
							'type'  => 'text',
						),
						'textarea_header' => array(
							'label' => esc_html__('Custom Text Header', 'domica'),
							'desc'  => esc_html__( 'White some text (optional)', 'domica' ),
							'type'  => 'textarea',
							'value' => ''
						),
					),
				)
			),
		)
	),

	'p_image' => array(
		'title'   => esc_html__('Image', 'domica'),
		'type'    => 'tab',
		'options' => array(
			'data_image' => array(
				'label'   => esc_html__('Image upload', 'domica'),
				'desc'   => esc_html__('Choose image', 'domica'),
				'type'    => 'upload',
			),
		),
	),
	'p_galley' => array(
		'title'   => esc_html__('Gallery', 'domica'),
		'type'    => 'tab',
		'options' => array(
			'data_gallery' => array(
				'label'   => esc_html__('Image upload', 'domica'),
				'desc'   => esc_html__('Choose image(s)', 'domica'),
				'type'    => 'multi-upload',
			),
		),
	),
	'p_video' => array(
		'title'   => esc_html__('Video', 'domica'),
		'type'    => 'tab',
		'options' => array(
			'data_video_type' => array(
				'label'   => esc_html__('Video type', 'domica'),
				'desc'   => esc_html__('Support Youtube and Vimeo', 'domica'),
				'type'    => 'short-select',
				'choices' => array(
					'youtube' => esc_html__('Youtube', 'domica'),
					'vimeo' => esc_html__('Vimeo', 'domica'),
				),
				'value' => 'vimeo'
			),
			'data_video' => array(
				'label'   => esc_html__('Video url', 'domica'),
				'desc'   => wp_kses_post('Enter url of video.<br>Ex: https://vimeo.com/<b>139450138</b><br>https://www.youtube.com/watch?v=<b>f0halO_QpGQ</b>', 'domica'),
				'type'    => 'text',
				'value' => '139450138'
			),
		),
	),
	'p_link' => array(
		'title'   => esc_html__('Link', 'domica'),
		'type'    => 'tab',
		'options' => array(
			'data_title' => array(
				'label'   => esc_html__('Title', 'domica'),
				'desc'   => esc_html__('Enter your title', 'domica'),
				'type'    => 'text',
			),
			'data_icon' => array(
				'label'   => esc_html__('Icon', 'domica'),
				'desc'   => esc_html__('Choose icon', 'domica'),
				'type'    => 'icon-v2',
			),
			'data_link' => array(
				'label'   => esc_html__('Link', 'domica'),
				'desc'   => esc_html__('Enter your url here', 'domica'),
				'type'    => 'text',
			),
			'data_background' => array(
				'label'   => esc_html__('Background image', 'domica'),
				'desc'   => esc_html__('Choose image', 'domica'),
				'type'    => 'upload',
			),
		),
	),
	'p_audio' => array(
		'title'   => esc_html__('Audio', 'domica'),
		'type'    => 'tab',
		'options' => array(
			'data_audio' => array(
				'label'   => esc_html__('Audio', 'domica'),
				'desc'   => esc_html__('Enter audio url', 'domica'),
				'type'    => 'text',
			),
		),
	),
	'p_quote' => array(
		'title'   => esc_html__('Quote', 'domica'),
		'type'    => 'tab',
		'options' => array(
			'data_quote_bg' => array(
				'label'   => esc_html__('Quote background image', 'domica'),
				'desc'   => esc_html__('Choose image', 'domica'),
				'type'    => 'upload',
			),
			'subtitle_quote' => array(
				'label'   => esc_html__('Sub title', 'domica'),
				'desc'   => esc_html__('Enter your subtitle here', 'domica'),
				'type'    => 'text',
			),
			'data_quote' => array(
				'label'   => esc_html__('Quote', 'domica'),
				'desc'   => esc_html__('Enter your quote here', 'domica'),
				'type'    => 'text',
			),
			'author_quote' => array(
				'label'   => esc_html__('Author', 'domica'),
				'desc'   => esc_html__('Enter your author here', 'domica'),
				'type'    => 'text',
			),
		),
	),
	'stories_id' => array(
	    'type' => 'box',
	    'options' => array(
	        'option_id'  => array( 'type' => 'text' ),
	    ),
	    'title' => esc_html__('Sub Title', 'domica'),
	    'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),

	    //'context' => 'normal|advanced|side',
	    //'priority' => 'default|high|core|low',
	),
);

$options = array(
	'post_layout_box' => array(
		'title'   => esc_html__( 'Post Customizing', 'domica'),
		'type'    => 'box',
		'options' => $post_options
	),
);

