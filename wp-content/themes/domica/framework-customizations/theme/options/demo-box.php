<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'demo' => array(
		'title'   => esc_html__( 'Demo Options', 'domica' ),
		'type'    => 'tab',
		'options' => array(
			'sub_tab_1' => array(
				'title'   => esc_html__( 'Without Box', 'domica' ),
				'type'    => 'tab',
				'options' => array(
					fw()->theme->get_options( 'demo-2' ),
				),
			),
			'sub_tab_2' => array(
				'title'   => esc_html__( 'With Box', 'domica' ),
				'type'    => 'tab',
				'options' => array(
					'demo_box' => array(
						'title'   => esc_html__( 'Box', 'domica' ),
						'type'    => 'box',
						'options' => array(
							fw()->theme->get_options( 'demo' ),
						),
					),
				),
			),
		),
	),
);