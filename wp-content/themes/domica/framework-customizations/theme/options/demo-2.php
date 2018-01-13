<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'demo_text_2'                      => array(
		'label' => esc_html__( 'Text', 'domica' ),
		'type'  => 'text',
		'value' => 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_short_text_2'                => array(
		'label' => esc_html__( 'Short Text', 'domica' ),
		'type'  => 'short-text',
		'value' => '7',
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_password_2'                  => array(
		'label' => esc_html__( 'Password', 'domica' ),
		'type'  => 'password',
		'value' => 'Dotted text',
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_hidden_2'                    => array(
		'label' => false,
		'type'  => 'hidden',
		'value' => '{some: "json"}',
		'desc'  => false,
	),
	'demo_textarea_2'                  => array(
		'label' => esc_html__( 'Textarea', 'domica' ),
		'type'  => 'textarea',
		'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'  => array(
			'icon' => 'video',
			'html' => '<iframe width="420" height="236" src="https://player.vimeo.com/video/101070863" frameborder="0" allowfullscreen></iframe>'
		),
	),
	'demo_wp_editor_2'                 => array(
		'label' => esc_html__( 'Rich Text Editor', 'domica' ),
		'type'  => 'wp-editor',
		'value' => 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
		'reinit' => true,
	),
	'demo_html_2'                      => array(
		'label' => esc_html__( 'HTML', 'domica' ),
		'type'  => 'html',
		'value' => '{some: "json"}',
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'html'  => '<em>Lorem</em> <b>ipsum</b> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAADWSURBVDjLlZNNCsIwEEZzKW/jyoVbD+Aip/AGgmvRldCKNxDBv4LSfSG7kBZix37BQGiapA48ZpjMvIZAGRExwDmnESw7MMvsHnMFTdOQUsqjrmtXsggKEEVReCDseZc/HbOgoCxLDytwUEFBVVUe/fjNDguEEFGSAiml4Xq+DdZJAV78sM1oOpnT/fI0oEYPZ0lBtjuaBWSttcHtRQWvx9sMrlcb7+HQwxlmojfI9ycziGyj34sK3AV8zd7KFSYFCCwO1aMFsQgK8DO1bRsFM0HBP9i9L2ONMKHNZV7xAAAAAElFTkSuQmCC" alt="">',
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_checkbox_2'                  => array(
		'label' => esc_html__( 'Checkbox', 'domica' ),
		'type'  => 'checkbox',
		'value' => true,
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'text'  => esc_html__( 'Custom text', 'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_checkboxes_2'                => array(
		'label'   => esc_html__( 'Checkboxes', 'domica' ),
		'type'    => 'checkboxes',
		'value'   => array(
			'c1' => false,
			'c2' => true,
		),
		'desc'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'choices' => array(
			'c1' => esc_html__( 'Checkbox 1 Custom Text', 'domica' ),
			'c2' => esc_html__( 'Checkbox 2 Custom Text', 'domica' ),
			'c3' => esc_html__( 'Checkbox 3 Custom Text', 'domica' ),
		),
		'help'    => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_switch_2'                    => array(
		'label'        => esc_html__( 'Switch', 'domica' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value' => 'yes',
			'label' => esc_html__( 'Yes', 'domica' )
		),
		'left-choice'  => array(
			'value' => 'no',
			'label' => esc_html__( 'No', 'domica' )
		),
		'value'        => 'yes',
		'desc'         => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'         => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_select_2'                    => array(
		'label'   => esc_html__( 'Select', 'domica' ),
		'type'    => 'select',
		'value'   => 'c',
		'desc'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'choices' => array(
			''  => '---',
			'a' => esc_html__( 'Lorem ipsum', 'domica' ),
			'b' => array(
				'text' => esc_html__( 'Consectetur', 'domica' ),
				'attr' => array(
					'label'         => 'Label overrides text',
					'data-whatever' => 'some data',
				),
			),
			array(
				'attr'    => array(
					'label'         => esc_html__( 'Optgroup Label', 'domica' ),
					'data-whatever' => 'some data',
				),
				'choices' => array(
					'c' => esc_html__( 'Sed ut perspiciatis', 'domica' ),
					'd' => esc_html__( 'Excepteur sint occaecat', 'domica' ),
				),
			),
			1   => esc_html__( 'One', 'domica' ),
			2   => esc_html__( 'Two', 'domica' ),
			3   => esc_html__( 'Three', 'domica' ),
		),
		'help'    => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_short_select_2'              => array(
		'label'   => esc_html__( 'Short Select', 'domica' ),
		'type'    => 'short-select',
		'value'   => '7',
		'desc'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'choices' => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
		),
		'help'    => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_select_multiple_2'           => array(
		'label'   => esc_html__( 'Select Multiple', 'domica' ),
		'type'    => 'select-multiple',
		'value'   => array( 'c', '2' ),
		'desc'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'choices' => array(
			''  => '---',
			'a' => esc_html__( 'Lorem ipsum', 'domica' ),
			'b' => array(
				'text' => esc_html__( 'Consectetur', 'domica' ),
				'attr' => array(
					'label'         => 'Label overrides text',
					'data-whatever' => 'some data',
				),
			),
			array(
				'attr'    => array(
					'label'         => esc_html__( 'Optgroup Label', 'domica' ),
					'data-whatever' => 'some data',
				),
				'choices' => array(
					'c' => esc_html__( 'Sed ut perspiciatis', 'domica' ),
					'd' => esc_html__( 'Excepteur sint occaecat', 'domica' ),
				),
			),
			1   => esc_html__( 'One', 'domica' ),
			2   => esc_html__( 'Two', 'domica' ),
			3   => esc_html__( 'Three', 'domica' ),
		),
		'help'    => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_group_multi_select_2'        => array(
		'type'    => 'group',
		'options' => array(
			'demo_multi_select_posts_2'      => array(
				'type'       => 'multi-select',
				'label'      => esc_html__( 'Multi-Select: Posts', 'domica' ),
				'population' => 'posts',
				'source'     => 'page',
				'desc'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'       => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			),
			'demo_multi_select_taxonomies_2' => array(
				'type'       => 'multi-select',
				'label'      => esc_html__( 'Multi-Select: Taxonomies', 'domica' ),
				'population' => 'taxonomy',
				'source'     => 'category',
				'desc'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'       => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			),
			'demo_multi_select_users_2'      => array(
				'type'       => 'multi-select',
				'label'      => esc_html__( 'Multi-Select: Users', 'domica' ),
				'population' => 'users',
				'source'     => 'administrator',
				'desc'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'       => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			),
			'demo_multi_select_array_2'      => array(
				'type'       => 'multi-select',
				'label'      => esc_html__( 'Multi-Select: Custom Array', 'domica' ),
				'population' => 'array',
				'choices'    => array(
					'hello' => esc_html__( 'Hello', 'domica' ),
					'world' => esc_html__( 'World', 'domica' ),
				),
				'desc'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'       => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			),
		),
	),
	'demo_radio_2'                     => array(
		'label'   => esc_html__( 'Radio', 'domica' ),
		'type'    => 'radio',
		'value'   => 'c2',
		'desc'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'choices' => array(
			'c1' => esc_html__( 'Radio 1 Custom Text', 'domica' ),
			'c2' => esc_html__( 'Radio 2 Custom Text', 'domica' ),
			'c3' => esc_html__( 'Radio 3 Custom Text', 'domica' ),
		),
		'help'    => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_radio_text_2'                => array(
		'label'   => esc_html__( 'Radio Text', 'domica' ),
		'type'    => 'radio-text',
		'value'   => '75',
		'desc'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'choices' => array(
			'25'  => esc_html__( '25%', 'domica' ),
			'50'  => esc_html__( '50%', 'domica' ),
			'100' => esc_html__( '100%', 'domica' ),
		),
		'help'    => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_image_picker_2'              => array(
		'label'   => esc_html__( 'Image Picker', 'domica' ),
		'type'    => 'image-picker',
		'value'   => '',
		'desc'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'choices' => array(
			'choice-1' => array(
				'small' => array(
					'height' => 70,
					'src'    => get_template_directory_uri() . '/images/image-picker-demo/thumb1.jpg'
				),
				'large' => array(
					'height' => 214,
					'src'    => get_template_directory_uri() . '/images/image-picker-demo/tooltip1.jpg'
				),
			),
			'choice-2' => array(
				'small' => array(
					'height' => 70,
					'src'    => get_template_directory_uri() . '/images/image-picker-demo/thumb2.jpg'
				),
				'large' => array(
					'height' => 214,
					'src'    => get_template_directory_uri() . '/images/image-picker-demo/tooltip2.jpg'
				),
			),
		),
		'help'    => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_icon_2'                      => array(
		'label' => esc_html__( 'Icon', 'domica' ),
		'type'  => 'icon',
		'value' => 'fa fa-linux',
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_upload_2'                    => array(
		'label'       => esc_html__( 'Single Upload', 'domica' ),
		'desc'        => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'type'        => 'upload',
		'images_only' => false,
		'help'        => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_upload_images_2'             => array(
		'label' => esc_html__( 'Single Upload (Images Only)', 'domica' ),
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'type'  => 'upload',
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_multi_upload_2'              => array(
		'label'       => esc_html__( 'Multi Upload', 'domica' ),
		'desc'        => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'type'        => 'multi-upload',
		'images_only' => false,
		'help'        => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_multi_upload_images_2'       => array(
		'label' => esc_html__( 'Multi Upload (Images Only)', 'domica' ),
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'type'  => 'multi-upload',
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_color_picker_2'              => array(
		'label' => esc_html__( 'Color Picker', 'domica' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_rgba_color_picker_2' => array(
		'label' => esc_html__( 'RGBA Color Picker', 'domica' ),
		'type'  => 'rgba-color-picker',
		'value' => 'rgba(255, 0, 0, .5)',
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_gradient_2'                  => array(
		'label' => esc_html__( 'Gradient', 'domica' ),
		'type'  => 'gradient',
		'value' => array(
			'primary'   => '#ffffff',
			'secondary' => '#ffffff'
		),
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_rgba_color_picker_2' => array(
		'label' => esc_html__( 'RGBA Color Picker', 'domica' ),
		'type'  => 'rgba-color-picker',
		'value' => '',
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_background_image_2'          => array(
		'label'   => esc_html__( 'Background Image', 'domica' ),
		'type'    => 'background-image',
		'value'   => 'none',
		'choices' => array(
			'none' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/no_pattern.jpg',
				'css'  => array(
					'background-image' => 'none'
				)
			),
			'bg-1' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/diagonal_bottom_to_top_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/diagonal_bottom_to_top_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-2' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/diagonal_top_to_bottom_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/diagonal_top_to_bottom_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-3' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/dots_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/dots_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-4' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/romb_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/romb_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-5' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/square_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/square_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-6' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/noise_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/noise_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-7' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/vertical_lines_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/vertical_lines_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-8' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/waves_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/waves_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
		),
		'desc'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'    => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_typography_2'                => array(
		'label' => esc_html__( 'Typography', 'domica' ),
		'type'  => 'typography',
		'value' => array(
			'size'   => 17,
			'family' => 'Verdana',
			'style'  => '300italic',
			'color'  => '#0000ff'
		),
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_typography-v2_2'                => array(
		'label' => esc_html__( 'Typography V2', 'domica' ),
		'type'  => 'typography-v2',
		'value'      => array(
			'family'    => 'Amarante',
//			For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
//			'style' => 'italic',
//			'weight' => 700,
			'subset'    => 'latin-ext',
			'variation' => 'regular',
			'size'      => 14,
			'line-height' => 13,
			'letter-spacing' => -2,
			'color'     => '#0000ff'
		),
		'components' => array(
			'family'         => true,
			//'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
			'size'           => true,
			'line-height'    => true,
			'letter-spacing' => true,
			'color'          => true
		),
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
	),
	'demo_datetime_range_2'            => array(
		'type'             => 'datetime-range',
		'attr'             => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
		'label'            => esc_html__( 'Demo date range', 'domica' ),
		'desc'             => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'             => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
		'datetime-pickers' => array(
			'from' => array(
				'timepicker' => false,
				'datepicker' => true,
			),
			'to'   => array(
				'timepicker' => false,
				'datepicker' => true,
			)
		),
		'value'            => array(
			'from' => '',
			'to'   => ''
		)
	),
	'demo_datetime_picker_2'           => array(
		'type'            => 'datetime-picker',
		'value'           => '',
		'attr'            => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
		'label'           => esc_html__( 'Date & Time picker', 'domica' ),
		'desc'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'            => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
		'datetime-picker' => array(
			'format'        => 'd-m-Y H:i',
			'extra-formats' => array(),
			'moment-format' => 'DD-MM-YYYY HH:mm',
			'scrollInput'   => false,
			'maxDate'       => false,
			'minDate'       => false,
			'timepicker'    => true,
			'datepicker'    => true,
			'defaultTime'   => '12:00'
		)
	),
	'demo_slider_2' => array(
		'label' => esc_html__( 'Slider', 'domica' ),
		'type'  => 'slider',
		'value' => 10,
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', 'domica' )
		),
	),
	'demo_range_slider_2' => array(
		'label' => esc_html__( 'Range Slider', 'domica' ),
		'type'  => 'range-slider',
		'value' => array(
			'from' => 30,
			'to' => 50
		),
		'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'domica' ),
		'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', 'domica' )
		),
	),
	'demo_addable_popup_2'             => array(
		'label'         => esc_html__( 'Addable Popup', 'domica' ),
		'type'          => 'addable-popup',
		'desc'          => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'template'      => '{{- demo_text }}',
		'popup-options' => array(
			'demo_text'                => array(
				'label' => esc_html__( 'Text', 'domica' ),
				'type'  => 'text',
				'value' => 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			),
			'demo_image_picker'        => array(
				'label'   => esc_html__( 'Image Picker', 'domica' ),
				'type'    => 'image-picker',
				'value'   => '',
				'desc'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'attr'    => array(
					'data-height' => 70
				),
				'choices' => array(
					'choice-1' => array(
						'small' => array(
							'height' => 70,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/thumb1.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/tooltip1.jpg'
						),
					),
					'choice-2' => array(
						'small' => array(
							'height' => 70,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/thumb2.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/tooltip2.jpg'
						),
					),
				),
				'help'    => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			),
			'demo_upload_images'       => array(
				'label' => esc_html__( 'Single Upload (Images Only)', 'domica' ),
				'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'type'  => 'upload',
				'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			),
			'demo_addable_popup_inner' => array(
				'label'         => esc_html__( 'Addable Popup', 'domica' ),
				'type'          => 'addable-popup',
				'desc'          => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'template'      => 'Title color-picker value : {{- demo_color_picker }}',
				'popup-options' => array(
					'demo_multi_upload_images' => array(
						'label' => esc_html__( 'Multi Upload (images only)', 'domica' ),
						'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
							'domica' ),
						'type'  => 'multi-upload',
						'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
							esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
								'domica' ),
							esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
								'domica' )
						),
					),
					'demo_color_picker'        => array(
						'label' => esc_html__( 'Color Picker', 'domica' ),
						'type'  => 'color-picker',
						'value' => '',
						'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
							'domica' ),
						'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
							esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
								'domica' ),
							esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
								'domica' )
						),
					)
				)
			),
		),
	),
	'demo_addable_option_2'            => array(
		'label'  => esc_html__( 'Addable Option', 'domica' ),
		'type'   => 'addable-option',
		'option' => array(
			'type' => 'text',
		),
		'value'  => array( 'Option 1', 'Option 2', 'Option 3' ),
		'desc'   => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'   => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		)
	),
	'demo_addable_box_2'               => array(
		'label'        => esc_html__( 'Addable Box', 'domica' ),
		'type'         => 'addable-box',
		'value'        => array(),
		'desc'         => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'domica' ),
		'help'         => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
			esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'domica' ),
			esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'domica' )
		),
		'box-controls' => array(//'custom' => '<small class="dashicons dashicons-smiley" title="Custom"></small>',
		),
		'box-options'  => array(
			'demo_text'     => array(
				'label' => esc_html__( 'Text', 'domica' ),
				'type'  => 'text',
				'value' => 'Lorem ipsum dolor sit amet',
				'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			),
			'demo_textarea' => array(
				'label' => esc_html__( 'Textarea', 'domica' ),
				'type'  => 'textarea',
				'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'  => array(
					'icon' => 'video',
					'html' => '<iframe width="420" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>'
				),
			),
		),
		'template'     => '{{- demo_text }}',
	),
	'demo_group_2'                     => array(
		'type'    => 'group',
		'options' => array(
			'demo_text_in_group_2'     => array(
				'label' => esc_html__( 'Text in Group', 'domica' ),
				'type'  => 'text',
				'value' => 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			),
			'demo_password_in_group_2' => array(
				'label' => esc_html__( 'Password in Group', 'domica' ),
				'type'  => 'password',
				'value' => 'Dotted text',
				'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			),
		),
	),
	'demo_multi_2'                     => array(
		'label'         => false,
		'type'          => 'multi',
		'value'         => array(),
		'desc'          => false,
		'inner-options' => array(
			'demo_text'     => array(
				'label' => esc_html__( 'Text in Multi', 'domica' ),
				'type'  => 'text',
				'value' => 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			),
			'demo_textarea' => array(
				'label' => esc_html__( 'Textarea in Multi', 'domica' ),
				'type'  => 'textarea',
				'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'  => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			),
		),
	),
	'demo_multi_picker_select_2'       => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'gadget' => array(
				'label'   => esc_html__( 'Multi Picker: Select', 'domica' ),
				'type'    => 'select',
				'choices' => array(
					'phone'  => esc_html__( 'Phone', 'domica' ),
					'laptop' => esc_html__( 'Laptop', 'domica' )
				),
				'desc'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'    => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				)
			)
		),
		'choices'      => array(
			'phone'  => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'domica' ),
				),
				'memory' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Memory', 'domica' ),
					'choices' => array(
						'16' => esc_html__( '16Gb', 'domica' ),
						'32' => esc_html__( '32Gb', 'domica' ),
						'64' => esc_html__( '64Gb', 'domica' ),
					)
				)
			),
			'laptop' => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'domica' ),
				),
				'webcam' => array(
					'type'  => 'switch',
					'label' => esc_html__( 'Webcam', 'domica' ),
				)
			),
		),
		'show_borders' => false,
	),
	'demo_multi_picker_radio_2'        => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'value'        => array(
			'gadget' => 'laptop',
		),
		'picker'       => array(
			'gadget' => array(
				'label'   => esc_html__( 'Multi Picker: Radio', 'domica' ),
				'type'    => 'radio',
				'choices' => array(
					'phone'  => esc_html__( 'Phone', 'domica' ),
					'laptop' => esc_html__( 'Laptop', 'domica' )
				),
				'desc'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'    => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				)
			)
		),
		'choices'      => array(
			'phone'  => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'domica' ),
				),
				'memory' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Memory', 'domica' ),
					'choices' => array(
						'16' => esc_html__( '16Gb', 'domica' ),
						'32' => esc_html__( '32Gb', 'domica' ),
						'64' => esc_html__( '64Gb', 'domica' ),
					)
				)
			),
			'laptop' => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'domica' ),
				),
				'webcam' => array(
					'type'  => 'switch',
					'label' => esc_html__( 'Webcam', 'domica' ),
				)
			),
		),
		'show_borders' => false,
	),
	'demo_multi_picker_image_picker_2' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'gadget' => array(
				'label'   => esc_html__( 'Multi Picker: Image Picker', 'domica' ),
				'type'    => 'image-picker',
				'choices' => array(
					'phone'  => array(
						'label' => esc_html__( 'Phone', 'domica' ),
						'small' => array(
							'height' => 70,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/thumb1.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/tooltip1.jpg'
						),
					),
					'laptop' => array(
						'label' => esc_html__( 'Laptop', 'domica' ),
						'small' => array(
							'height' => 70,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/thumb2.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/tooltip2.jpg'
						),
					)
				),
				'desc'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'    => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				)
			)
		),
		'choices'      => array(
			'phone'  => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'domica' ),
				),
				'memory' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Memory', 'domica' ),
					'choices' => array(
						'16' => esc_html__( '16Gb', 'domica' ),
						'32' => esc_html__( '32Gb', 'domica' ),
						'64' => esc_html__( '64Gb', 'domica' ),
					)
				)
			),
			'laptop' => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'domica' ),
				),
				'webcam' => array(
					'type'  => 'switch',
					'label' => esc_html__( 'Webcam', 'domica' ),
				)
			),
		),
		'show_borders' => false,
	),
	'demo_multi_picker_switch_2'       => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'gadget' => array(
				'label'        => esc_html__( 'Switch', 'domica' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'laptop',
					'label' => esc_html__( 'Laptop', 'domica' )
				),
				'left-choice'  => array(
					'value' => 'phone',
					'label' => esc_html__( 'Phone', 'domica' )
				),
				'value'        => 'yes',
				'desc'         => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					'domica' ),
				'help'         => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
					esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'domica' ),
					esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
						'domica' )
				),
			)
		),
		'choices'      => array(
			'phone'  => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'domica' ),
				),
				'memory' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Memory', 'domica' ),
					'choices' => array(
						'16' => esc_html__( '16Gb', 'domica' ),
						'32' => esc_html__( '32Gb', 'domica' ),
						'64' => esc_html__( '64Gb', 'domica' ),
					)
				)
			),
			'laptop' => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'domica' ),
				),
				'webcam' => array(
					'type'  => 'switch',
					'label' => esc_html__( 'Webcam', 'domica' ),
				)
			),
		),
		'show_borders' => false,
	),
);
