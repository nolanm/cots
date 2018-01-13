<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' );}

$page_options = array(
    /*header*/
    'page_header' => array(
        'title'   => esc_html__('Header', 'domica'),
        'type'    => 'tab',
        'options' => array(
        /*crumbs header*/
            'cs_page_header' => array(
                'label'   => false,
                'desc'   => false,
                'type'    => 'multi-picker',
                'picker' => array(
                    'gadget' => array(
                        'label' => esc_html__('Header', 'domica'),
                        'type' => 'short-select',
                        'choices' => array(
                            'default' => esc_html__('Default', 'domica'),
                            '1' => esc_html__('Custom', 'domica'),
                            'no' => esc_html__('Disable', 'domica'),
                        ),
                        'value' => 'default',
                    ),
                ),
                'choices' => array(
                    '1' => array(
                        'page_header_text_color' => array(
                            'label' => esc_html__('Text color', 'domica'),
                            'desc' => esc_html__('Display text color of page breadcumbs', 'domica'),
                            'type' => 'color-picker',
                            'value' => '#ffffff'
                        ),
                        'page_header_title' => array(
                            'label' => esc_html__('Alternative Title', 'domica'),
                            'desc' => esc_html__('This will replace heading page title', 'domica'),
                            'type' => 'text',
                            'value' => 'This is my title!'
                        ),
                        'page_header_text' => array(
                            'label' => esc_html__('Text Header', 'domica'),
                            'desc' => esc_html__('This will display under breadcrumbs (optional)', 'domica'),
                            'type' => 'textarea',
                        ),
                        'page_header_bg' => array(
                            'label' => false,
                            'desc' => false,
                            'type' => 'multi-picker',
                            'picker' => array(
                                'gadget' => array(
                                    'label' => esc_html__('Background Style', 'domica'),
                                    'desc' => esc_html__('If select background image option, the theme recommends a header size of at least 1170 width pixels', 'domica'),
                                    'type' => 'select',
                                    'choices' => array(
                                        'img_bg' => esc_html__('Use Image', 'domica'),
                                        'color_bg' => esc_html__('Use Solid Color', 'domica'),
                                    ),
                                    'value' => 'color_bg'
                                )
                            ),
                            'choices' => array(
                                'img_bg' => array(
                                    'img_bg_data' => array(
                                        'label' => esc_html__('Single Upload (Images Only)', 'domica'),
                                        'type' => 'upload'
                                    )
                                ),
                                'color_bg' => array(
                                    'color_bg_data' => array(
                                        'label' => esc_html__('Background Color', 'domica'),
                                        'type' => 'color-picker',
                                        'value' => '#e9eceb'
                                    )
                                )
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
$options = array(
    'page_layout_box' => array(
        'title'   => esc_html__( 'Page Customizing', 'domica'),
        'type'    => 'box',
        'options' => $page_options
    ),
);