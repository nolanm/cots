<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'domica' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'General Settings', 'domica' ),
				'type'    => 'box',
				'options' => array(
					'ht-switch' => array(
						'label' => 'HT Switch',
						'type' => 'ht-switch',
						'desc'  => esc_html__( 'Custom swith option', 'domica' ),
						'value' => 'no'
						),
					'logo'    => array(
						'label' => esc_html__( 'Logo', 'domica' ),
						'desc'  => esc_html__( 'Write your website logo name', 'domica' ),
						'type'  => 'text',
						'value' => get_bloginfo( 'name' )
					),
					'favicon' => array(
						'label' => esc_html__( 'Favicon', 'domica' ),
						'desc'  => esc_html__( 'Upload a favicon image', 'domica' ),
						'type'  => 'upload'
					),
					'footer-desc' => array(
						'label' => esc_html__('Footer Description', 'domica'),
						'type' => 'textarea'
					),
					'copyright' => array(
						'label' => esc_html__('Copyright Text', 'domica'),
						'type' => 'text'
					),
					'footer-link' => array(
						'label' => esc_html__('Footer links', 'domica'),
						'type' => 'textarea'
					)
				)
			),
		)
	)
);