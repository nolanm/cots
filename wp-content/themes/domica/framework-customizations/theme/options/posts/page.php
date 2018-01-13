<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' );}

$page_options = array(
    /*header*/
    'page_header' => array(
        'title'   => esc_html__('Header', 'domica'),
        'type'    => 'tab',
        'options' => array(
            /*header layout*/
            'page_header_layout' => array(
                'label' => false,
                'desc' => false,
                'type' => 'multi-picker',
                'picker' => array(
                    'gadget' => array(
                        'label' => esc_html__('Layout', 'domica'),
                        'type' => 'short-select',
                        'choices' => array(
                            'default' => esc_html__('Default', 'domica'),
                            'layout-1' => esc_html__('Layout 1', 'domica'),
                            'layout-2' => esc_html__('Layout 2', 'domica'),
                            'layout-3' => esc_html__('Layout 3 - Transparent', 'domica'),
                        ),
                        'value' => 'default',
                    )
                ),
                'choices' => array(
                    'layout-2' => array(
                        'layout-2-bg-topbar' => array(
                            'type' => 'rgba-color-picker',
                            'label' => esc_html__('Topbar background', 'domica'),
                            'desc' => esc_html__('Choose color', 'domica'),
                            'value' => 'rgba(255,255,255,0)'
                        ),
                        'layout-2-topbar-txt-color' => array(
                            'type' => 'color-picker',
                            'label' => esc_html__('Topbar text color', 'domica'),
                            'desc' => esc_html__('Choose color', 'domica'),
                            'value' => ''
                        ),
                        'layout-2-line-topbar' => array(
                            'type' => 'color-picker',
                            'label' => esc_html__('Topbar border color', 'domica'),
                            'desc' => esc_html__('Choose color', 'domica'),
                            'value' => ''
                        ),
                        'layout-2-bg-menu' => array(
                            'type' => 'rgba-color-picker',
                            'label' => esc_html__('Menu background', 'domica'),
                            'desc' => esc_html__('Choose color', 'domica'),
                            'value' => 'rgba(255,255,255,0)'
                        ),
                        'layout-2-menu-txt-color' => array(
                            'type' => 'color-picker',
                            'label' => esc_html__('Heading menu text color', 'domica'),
                            'desc' => esc_html__('Choose color', 'domica'),
                            'value' => ''
                        ),
                        'layout-2-btn-bg' => array(
                            'type' => 'color-picker',
                            'label' => esc_html__('Button background', 'domica'),
                            'desc' => esc_html__('Choose color', 'domica'),
                            'value' => ''
                        ),
                        'layout-2-btn-color' => array(
                            'type' => 'color-picker',
                            'label' => esc_html__('Button text color', 'domica'),
                            'desc' => esc_html__('Choose color', 'domica'),
                            'value' => ''
                        ),
                    ),
                ),
            ),
            /*logo*/
            'p_lg' => array(
                'label' => false,
                'desc' => false,
                'type' => 'multi-picker',
                'picker' => array(
                    'gadget' => array(
                        'type' => 'short-select',
                        'label' => esc_html__('Logo', 'domica'),
                        'desc' => false,
                        'choices' => array(
                            'default' => esc_html__('Default', 'domica'),
                            'custom' => esc_html__('Custom', 'domica'),
                        ),
                        'value' => 'default'
                    )
                ),
                'choices' => array(
                    'custom' => array(
                        'lg_data' => array(
                            'label' => esc_html__('Choose image', 'domica'),
                            'type' => 'upload',
                            'images_only' => true
                        )
                    )
                ),
            ),
            /*crumbs header*/
            'p_page_header' => array(
                'label'   => false,
                'desc'   => false,
                'type'    => 'multi-picker',
                'picker' => array(
                    'gadget' => array(
                        'label' => esc_html__('Page Header Options', 'domica'),
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
                            'value' => ''
                        ),
                        'page_header_text' => array(
                            'label' => esc_html__('Text Breadcrumb Align', 'domica'),
                            'desc' => esc_html__('This will align text breadcrumb left or center', 'domica'),
                            'type' => 'select',
                            'choices' => array(
                                'center' => esc_html__('Text Align Center', 'domica'),
                                'left' => esc_html__('Text Align Left', 'domica'),
                            ),

                            'value' => 'center'
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
