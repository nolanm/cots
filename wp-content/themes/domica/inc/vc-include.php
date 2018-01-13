<?php

/*parent shortcode*/
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
   /*wrap table*/
    class WPBakeryShortCode_table extends WPBakeryShortCodesContainer {
    }
    /*iconbox carousel*/
    class WPBakeryShortCode_iconbox_carousel extends WPBakeryShortCodesContainer {
    }
}

/*child shortcode*/
if ( class_exists( 'WPBakeryShortCode' ) ) {
    /*iconbox*/
    class WPBakeryShortCode_iconbox extends WPBakeryShortCode {
	}
    /*social activities*/
    class WPBakeryShortCode_social_activities extends WPBakeryShortCode {
    }
    /*feature*/
    class WPBakeryShortCode_feature extends WPBakeryShortCode {
    }
    /*featurebox*/
    class WPBakeryShortCode_featurebox extends WPBakeryShortCode {
    }
    /*counter*/
    class WPBakeryShortCode_counter extends WPBakeryShortCode {
	}
    /*video*/
    class WPBakeryShortCode_ht_video extends WPBakeryShortCode {
	}
    /*testimonials*/
    class WPBakeryShortCode_testi extends WPBakeryShortCode {
	}
    /*services*/
    class WPBakeryShortCode_services extends WPBakeryShortCode {
	}
    /*case studies*/
    class WPBakeryShortCode_case extends WPBakeryShortCode {
	}
    /*pricing table*/
    class WPBakeryShortCode_table_content extends WPBakeryShortCode {
	}
    /*blog news*/
    class WPBakeryShortCode_news extends WPBakeryShortCode {
        
	}
    /*brand logo*/
    class WPBakeryShortCode_brand extends WPBakeryShortCode {
	}
    /*progress bar*/
    class WPBakeryShortCode_progress_bar extends WPBakeryShortCode {
	}
    /*team member*/
    class WPBakeryShortCode_team extends WPBakeryShortCode {
	}
    /*tabs*/
    class WPBakeryShortCode_tabs extends WPBakeryShortCode {
	}
    /*events*/
    class WPBakeryShortCode_events extends WPBakeryShortCode {
    }
    /*events organizer*/
    class WPBakeryShortCode_event_organizer extends WPBakeryShortCode {
    }
    /*event current item for single event page*/
    class WPBakeryShortCode_event_current_item extends WPBakeryShortCode {
    }
    /*event map*/
    class WPBakeryShortCode_event_map extends WPBakeryShortCode {
    }
    /*landing*/
    class WPBakeryShortCode_landing extends WPBakeryShortCode {
    }
    /*gallery*/
    class WPBakeryShortCode_gallery_img extends WPBakeryShortCode {
    }
    /*staff*/
    class WPBakeryShortCode_staff extends WPBakeryShortCode {
    }
    /*staff current img*/
    class WPBakeryShortCode_staff_current_image extends WPBakeryShortCode {
    }
    /*staff current infor*/
    class WPBakeryShortCode_staff_current_infor extends WPBakeryShortCode {
    }
    /*staff social links*/
    class WPBakeryShortCode_staff_socials extends WPBakeryShortCode {
    }
    /*sermon*/
    class WPBakeryShortCode_sermon extends WPBakeryShortCode {
    }
    /*ministries*/
    class WPBakeryShortCode_ministries extends WPBakeryShortCode {
    }
    /*countdown*/
    class WPBakeryShortCode_countdown extends WPBakeryShortCode {
        public function __construct( $settings ) {
            parent::__construct( $settings );
            $this->countdown_js();
        }
        public function countdown_js() {
            wp_enqueue_script( 'jquery-countdown-js', get_template_directory_uri() . '/js/countdown.min.js' );
        }
    }
    /*map*/
    class WPBakeryShortCode_map extends WPBakeryShortCode {
        public function __construct( $settings ) {
            parent::__construct( $settings );
            $this-> gmap_jsScripts();
        }
        public function gmap_jsScripts() {
            wp_enqueue_script( 'bridge-js-map', 'http://maps.google.com/maps/api/js?key=AIzaSyCwAq_RDWPBbKWITpsF1TH5V3tRgrrNX9w&amp;language=en' );
            wp_enqueue_script( 'bridge-js-gmap3', get_template_directory_uri() . '/js/jquery.gmap3.min.js' );
        }
    }
    /*lightbox video*/
    class WPBakeryShortCode_lightbox_video extends WPBakeryShortCode {
    }
    /*stories*/
    class WPBakeryShortCode_stories extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_portfolio_title extends WPBakeryShortCode {
    }
    /* cause */
    class WPBakeryShortCode_cause extends WPBakeryShortCode {
    }
    /* sharing */
    class WPBakeryShortCode_social_sharing extends WPBakeryShortCode {
    }
    /* campaign info */
    class WPBakeryShortCode_campaign_info extends WPBakeryShortCode {
    }
    /* related campaigns */
    class WPBakeryShortCode_related_campaigns extends WPBakeryShortCode {
    }
    /* search causes */
    class WPBakeryShortCode_search_causes extends WPBakeryShortCode {
    }
}

/*incluce vc-maps*/
require_once get_template_directory() . '/inc/vc-maps.php';

/*disable VC auto update*/
function domica_vc_disable_updater() {
	vc_manager()->disableUpdater();
}
add_action( 'vc_before_init', 'domica_vc_disable_updater' );

/*add new option on default shortcode Visual Composer*/
if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {

    /*vc_btn*/
	$theme_button = array(
        /*style*/
		array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Style', 'domica' ),
            'description' => esc_html__( 'Select button display style.', 'domica' ),
            'param_name' => 'style',
            'weight' => 20,
            'value' => array(
                esc_html__( 'Modern', 'domica' ) => 'modern',
                esc_html__( 'Classic', 'domica' ) => 'classic',
                esc_html__( 'Flat', 'domica' ) => 'flat',
                esc_html__( 'Outline', 'domica' ) => 'outline',
                esc_html__( '3d', 'domica' ) => '3d',
                esc_html__( 'Custom', 'domica' ) => 'custom',
                esc_html__( 'Outline custom', 'domica' ) => 'outline-custom',
                esc_html__( 'Gradient', 'domica' ) => 'gradient',
                esc_html__( 'Gradient Custom', 'domica' ) => 'gradient-custom',
                esc_html__( 'Theme Style', 'domica' ) => 'theme-style-default-btn',
                esc_html__( 'Theme Style Custom', 'domica' ) => 'theme-style-custom',
            ),
            'std' => 'theme-style-default-btn'
        ),
        /*text color*/
        array(
            'type' => 'colorpicker',
            'std' => '#ffffff',
            'heading' => esc_html__( 'Text Color', 'domica' ),
            'param_name' => 'text_color',
            'edit_field_class' => 'vc_col-sm-6',
            'dependency' => array(
                'element' => 'style',
                'value' => 'theme-style-custom'
            ),
            'weight' => 19,
        ),
        /*background color*/
        array(
            'type' => 'colorpicker',
            'std' => '#3b8cff',
            'heading' => esc_html__( 'Background Color', 'domica' ),
            'param_name' => 'wtf',
            'edit_field_class' => 'vc_col-sm-6',
            'dependency' => array(
                'element' => 'style',
                'value' => 'theme-style-custom'
            ),
            'weight' => 18,
        ),
        /*line*/
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Line Color?', 'domica' ),
            'param_name' => 'line',
            'dependency' => array(
                'element' => 'style',
                'value' => 'theme-style-custom'
            ),
            'value' => array(
                esc_html__( 'Yes', 'domica' ) => 'yes',
            ),
            'weight' => 16,
            'std' => 'no'
        ),
        array(
            'type' => 'colorpicker',
            'std' => '#1d7bff',
            'heading' => esc_html__( 'Start Color', 'domica' ),
            'param_name' => 'color1',
            'edit_field_class' => 'vc_col-sm-6',
            'dependency' => array(
                'element' => 'line',
                'value' => 'yes'
            ),
            'weight' => 15,
        ),
        array(
            'type' => 'colorpicker',
            'std' => '#59f1ff',
            'heading' => esc_html__( 'End Color', 'domica' ),
            'param_name' => 'color2',
            'edit_field_class' => 'vc_col-sm-6',
            'dependency' => array(
                'element' => 'line',
                'value' => 'yes'
            ),
            'weight' => 14,
        ),
        /*shape*/
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Shape', 'domica' ),
            'description' => esc_html__( 'Select button shape.', 'domica' ),
            'param_name' => 'shape',
            'value' => array(
                esc_html__( 'Rounded', 'domica' ) => 'rounded',
                esc_html__( 'Square', 'domica' ) => 'square',
                esc_html__( 'Round', 'domica' ) => 'round',
            ),
            'std' => 'square'
        ),
        /*disable color option on Theme Style Custom*/
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Color', 'domica' ),
            'param_name' => 'color',
            'description' => esc_html__( 'Select button color.', 'domica' ),
            'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
            'weight' => 2,
            'value' => array(
                    esc_html__( 'Classic Grey', 'domica' ) => 'default',
                    esc_html__( 'Classic Blue', 'domica' ) => 'primary',
                    esc_html__( 'Classic Turquoise', 'domica' ) => 'info',
                    esc_html__( 'Classic Green', 'domica' ) => 'success',
                    esc_html__( 'Classic Orange', 'domica' ) => 'warning',
                    esc_html__( 'Classic Red', 'domica' ) => 'danger',
                    esc_html__( 'Classic Black', 'domica' ) => 'inverse',
                ) + getVcShared( 'colors-dashed' ),
            'std' => 'grey',
            'dependency' => array(
                'element' => 'style',
                'value_not_equal_to' => array(
                    'custom',
                    'outline-custom',
                    'gradient',
                    'gradient-custom',
                    'theme-style-custom',
                    'theme-style-default-btn'
                ),
            ),
        ),
	);
	vc_add_params( 'vc_btn', $theme_button );

    /*vc_tta_accordion*/
    $theme_accordion = array(
        /*style*/
        array(
			'type' => 'dropdown',
			'param_name' => 'style',
			'value' => array(
				esc_html__( 'Classic', 'domica' ) => 'classic',
				esc_html__( 'Modern', 'domica' ) => 'modern',
				esc_html__( 'Flat', 'domica' ) => 'flat',
				esc_html__( 'Outline', 'domica' ) => 'outline',
                esc_html__( 'Theme Style 1', 'domica' ) => 'theme-style-1',
                esc_html__( 'Theme Style 2', 'domica' ) => 'theme-style-2',
                esc_html__( 'Theme Style 3', 'domica' ) => 'theme-style-3',
			),
            'std' => 'theme-style-1',
			'heading' => esc_html__( 'Style', 'domica' ),
			'description' => esc_html__( 'Select accordion display style.', 'domica' ),
		),
        /*icon*/
        array(
			'type' => 'dropdown',
			'param_name' => 'c_icon',
			'value' => array(
				esc_html__( 'None', 'domica' ) => '',
				esc_html__( 'Chevron', 'domica' ) => 'chevron',
				esc_html__( 'Plus', 'domica' ) => 'plus',
				esc_html__( 'Triangle', 'domica' ) => 'triangle',
                esc_html__( 'Theme Style', 'domica' ) => 'theme-style',
			),
			'std' => 'theme-style',
			'heading' => esc_html__( 'Icon', 'domica' ),
			'description' => esc_html__( 'Select accordion navigation icon.', 'domica' ),
		),
        /*disable color for theme-style*/
        array(
			'type' => 'dropdown',
			'param_name' => 'color',
			'value' => getVcShared( 'colors-dashed' ),
			'std' => 'grey',
			'heading' => esc_html__( 'Color', 'domica' ),
			'description' => esc_html__( 'Select accordion color.', 'domica' ),
			'param_holder_class' => 'vc_colored-dropdown',
            'dependency' => array(
                'element' => 'style',
                'value_not_equal_to' => array('theme-style-1','theme-style-2','theme-style-3')
            ),
		),
    );
    vc_add_params('vc_tta_accordion', $theme_accordion);

    /*vc_pie*/
    $theme_pie = array(
        array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Text color', 'domica' ),
            'description' => esc_html__( 'Select text color.', 'domica' ),
			'param_name' => 'text_color',
            'weight' => 1
		),
    );
    vc_add_params('vc_pie', $theme_pie);

    /*vc_tta_accordion*/
    $theme_tour = array(
        /*style*/
        array(
			'type' => 'dropdown',
			'param_name' => 'style',
			'value' => array(
				esc_html__( 'Classic', 'domica' ) => 'classic',
				esc_html__( 'Modern', 'domica' ) => 'modern',
				esc_html__( 'Flat', 'domica' ) => 'flat',
				esc_html__( 'Outline', 'domica' ) => 'outline',
                esc_html__( 'Theme Style', 'domica' ) => 'theme-tour-style',
			),
			'heading' => esc_html__( 'Style', 'domica' ),
			'description' => esc_html__( 'Select tour display style.', 'domica' ),
		),
        array(
			'type' => 'dropdown',
			'param_name' => 'color',
			'heading' => esc_html__( 'Color', 'domica' ),
			'description' => esc_html__( 'Select tour color.', 'domica' ),
			'value' => getVcShared( 'colors-dashed' ),
			'std' => 'grey',
			'param_holder_class' => 'vc_colored-dropdown',
            'dependency' => array(
                'element' => 'style',
                'value_not_equal_to' => array(
                    'theme-tour-style',
                ),
            ),
		),
    );
    vc_add_params('vc_tta_tour', $theme_tour);
    
}
