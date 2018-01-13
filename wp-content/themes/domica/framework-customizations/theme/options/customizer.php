<?php

$options = array(
    /*header layout*/
    'ht_header' => array(
        'type' => 'box',
        'title' => esc_html__('Header Layout', 'domica'),
        'wp-customizer-args' => array(
            'priority' => 2,
        ),
        'options' => array(
            'header_1' => array(
                'type' => 'box',
                'title' => esc_html__('Layout 1', 'domica'),
                'options' => array(
            	)
            ),
            'header_2' => array(
                'type' => 'box',
                'title' => esc_html__('Layout 2', 'domica'),
                'options' => array(
            	)
            ),
            'header_3' => array(
                'type' => 'box',
                'title' => esc_html__('Layout 3', 'domica'),
                'options' => array(
                )
            ),
        ),
    ),
);
