<?php
/***Theme Customizer***/

/*Add the theme configuration*/
domica_Kirki::add_config( 'domica', array(
 	'option_type' => 'theme_mod',
 	'capability'  => 'edit_theme_options',
));

/*Add the general section*/
domica_Kirki::add_section( 'c_general', array(
 	'title'      => esc_attr__( 'General', 'domica'),
 	'priority'   => 1,
 	'capability' => 'edit_theme_options',
));

/*Add breadcrumbs section*/
domica_Kirki::add_section( 'c_crumbs', array(
 	'title'      => esc_attr__( 'Page Breadcrumbs', 'domica'),
 	'capability' => 'edit_theme_options',
	 'priority'   => 3,
));

/*Add blog section*/
domica_Kirki::add_section( 'blog', array(
 	'title'      => esc_attr__( 'Blog', 'domica'),
 	'priority'   => 4,
 	'capability' => 'edit_theme_options',
));

/*Add footer section*/
domica_Kirki::add_section( 'c_footer', array(
 	'title'      => esc_attr__( 'Footer', 'domica'),
 	'priority'   => 5,
 	'capability' => 'edit_theme_options',
));

/*Add color section*/
domica_Kirki::add_section( 'color', array(
 	'title'      => esc_attr__( 'Colors', 'domica'),
 	'priority'   => 17,
 	'capability' => 'edit_theme_options',
));

/*Add typo section*/
domica_Kirki::add_section( 'typo', array(
 	'title'      => esc_attr__( 'Typography', 'domica'),
 	'capability' => 'edit_theme_options',
	 'priority'   => 18,
));

/*Add shop section*/
domica_Kirki::add_section( 'shop', array(
 	'title'      => esc_attr__( 'Shop', 'domica'),
 	'priority'   => 19,
 	'capability' => 'edit_theme_options',
));

/*Add cause section*/
domica_Kirki::add_section( 'cause_view', array(
 	'title'      => esc_attr__( 'Cause View', 'domica'),
 	'priority'   => 30,
 	'capability' => 'edit_theme_options',
));
/*COLOR=================================================================================================*/
/*primary color*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'settings'  => 'primary_color',
	'label'     => esc_attr__( 'Primary color', 'domica' ),
	'section'   => 'color',
	'default' => '#1980d8',
	'transport' => 'auto',
	'output'      => array(
		array(
			'element' =>
				'blockquote:before,
				.blog-post-info .post-tit a,
				.post-author-info .author-name,				
				.post-author-info-single .author-name,
				.theme-service-item a,
				.tbl-price,
				.member-name,
				.theme-main-color,
				.woocommerce-page #main .cart input.button,
				.woocommerce-page a.button.add_to_cart_button:hover,
				.product a.button.product_type_simple:hover,
				.campaigns-topbar-filter .campaigns-view a.current,
				.campaigns-topbar-filter .campaigns-view a:hover,
				.campaign-pagination ul.page-numbers li .page-numbers.prev:hover,
				.campaign-pagination ul.page-numbers li .page-numbers.next:hover,
				div.widget_related_causes_thumbnail_item.flw:hover dl.related-causes-thumbnail-sumary dt a',
			'property' => 'color'
		),
		array(
			'element' =>
				'theadding th,
				.tbl-button,
				.woocommerce-page #main a.button.alt,
				.woocommerce-page #main input.button.alt,
				.woocommerce-page #main .cart input.button:hover,
				.woocommerce-page #main span.onsale,
				.woocommerce-page a.button.add_to_cart_button,
				.woocommerce-page #main button.button.alt,
				.woocommerce-page #main .cart .button,
				.product a.button.product_type_simple,
				.woocommerce #review_form .comment-form input#submit.submit,
				#commentform input[type="submit"]:hover,
				.blog-btn-more:before,
				.blog-btn-more:hover:before,
				.widget_search .search-submit,
				.theme-shoping-cart .shopping-cart-icon > span,
				.tagcloud a:hover,
				.campaign-stats .progress.progress-charitable .progress-bar,
				.campaign-pagination ul.page-numbers li .page-numbers.current,
				.campaign-pagination ul.page-numbers li .page-numbers:hover,
				a.donate-button.button,
				#charitable-donation-form .donation-amounts .donation-amount.suggested-donation-amount:hover,
				#charitable-donation-form .donation-amounts .donation-amount.suggested-donation-amount.selected,
				.charitable-terms-widget li:hover',


			'property' => 'background-color'
		),
		array(
			'element' => 
				'.woocommerce-page #main input.button.alt,
				.woocommerce-page #main .woocommerce-message,
				.woocommerce-page a.button.add_to_cart_button:hover,
				.product a.button.product_type_simple:hover,
				.woocommerce #review_form .comment-form input#submit.submit',
			'property' => 'border-color'
		)
	),
));

/*secondary color*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'settings'  => 'secondary_color',
	'label'     => esc_attr__( 'Secondary color', 'domica' ),
	'section'   => 'color',
	'default' => '#3e3e3e',
	'transport' => 'auto',
	'output'      => array(
		array(
			'element' =>
				'
				.blog-post-info .blog-post-date span.date-day,
				.theme-blog-news .post-tit a:hover,
				.theme-service-item a:hover,
				.theme-cases-filter button.is-checked,
				.blog-post-info .post-tit a:hover,
				.paging-navigation a,
				.contact-page-info li span[class*="fa-"]:before,
				.crumbs a:hover,
				.contact-page-info li span[class*="ion-"]:before,
				.woocommerce-page #main ul.products li.product .price,
				.woocommerce-page #main ul.products li.product .price ins,
				.woocommerce-page .added_to_cart.wc-forward,
				.woocommerce-page #main div.product p.price,
				.woocommerce-page #main div.product span.price,
				.woocommerce-page #main .woocommerce-message:before,
				.woocommerce-page #main .woocommerce-pagination li .page-numbers.current,
				.woocommerce-page #main .woocommerce-pagination li .page-numbers:hover,
				.widget-campaign-title,
				dl.related-causes-thumbnail-sumary dt a,
				.widget_campaign_info .campaign-numbers .campaign-pledged h4,
				.charitable-form-header,
				#charitable-donation-form .donation-amounts .donation-amount .amount,
				#charitable-donation-form .donation-amounts:after,
				span.custom-donation-amount-wrapper:after',
			'property' => 'color'
		),
		array(
			'element' =>
				'.vc_btn3-style-theme-style-default-btn.theme-style-default-btn,
				#bridge-blog-sidebar .widget_tag_cloud a,
				.footer-email-form-widget button,
				.theme-tags a,
				#commentform input[type="submit"],
				.page-error-btn,
				.cf7-style-7 .cf7-col input[type="submit"],
				.cf7-style-8 .cf7-col input[type="submit"],
				.theme-slider-btn,
				.theme-topbar .topbar-right .topbar-btn,
				.woocommerce-page .woocommerce-product-search input[type="submit"],
				.woocommerce-page .widget.shop .button.wc-forward,
				.woocommerce-page .widget.shop.widget_price_filter .price_slider_amount .button,
				.woocommerce-page #main .widget_price_filter .ui-slider .ui-slider-handle,
				.woocommerce-page #main .widget_price_filter .ui-slider .ui-slider-range,
				.woocommerce-page #main #respond input#submit.alt,
				.woocommerce-page #main .checkout_coupon input[type="submit"],
				.woocommerce-page #main .button.wc-backward,
				.woocommerce-page #main .woocommerce-form-login input[type="submit"],
				.woocommerce-page #main .woocommerce-Button.button,
				.woocommerce-page #main ul.products li.product .button.product_type_variable,
				.theme-shoping-cart .buttons .button:hover,
				.woocommerce-cart table.cart td.actions,
				.blog-btn-more,
				.tagcloud a,
				.charitable-submit-field .button,
				.charitable-terms-widget li',
			'property' => 'background-color'
		),
		array(
			'element' =>
				'.woocommerce-page .added_to_cart.wc-forward:hover,
				.woocommerce-info,
				.blog-btn-more',
			'property' => 'border-color'
		),
	),
));

/*TYPO=================================================================================================*/
/*body font*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'typography',
	'settings'  => 'typo_body',
	'label'     => esc_attr__( 'Body font', 'domica' ),
	'section'   => 'typo',
	'transport' => 'auto',
	'default'     => array(
		'font-family'    => 'Poppins',
		'variant'        => 'regular',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#8f8f8f',
		'font-size'      => '14px',
		'line-height'    => '28px',
		'letter-spacing' => '0',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => 'body, body p, .theme-iconbox .iconbox-content',
		),
	),
));
/*heading font*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'typography',
	'settings'  => 'typo_heading',
	'label'     => esc_attr__( 'Heading font', 'domica' ),
	'section'   => 'typo',
	'transport' => 'auto',
	'default'     => array(
		'font-family'    => 'Poppins',
		'variant'        => 'semi-bold',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#3e3e3e',
		'letter-spacing' => '0',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => 'h1, h2, h3, h4, h5, h6,
				
			',
		),
	),
));
/*h1*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'typography',
	'settings'  => 'typo_h1',
	'label'     => esc_attr__( 'H1', 'domica' ),
	'section'   => 'typo',
	'transport' => 'auto',
	'default'     => array(
		'font-size'      => '48px',
	),
	'output'      => array(
		array(
			'element' => 'h1',
		),
	),
));
/*h2*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'typography',
	'settings'  => 'typo_h2',
	'label'     => esc_attr__( 'H2', 'domica' ),
	'section'   => 'typo',
	'transport' => 'auto',
	'default'     => array(
		'font-size'      => '42px',
	),
	'output'      => array(
		array(
			'element' => 'h2',
		),
	),
));
/*h3*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'typography',
	'settings'  => 'typo_h3',
	'label'     => esc_attr__( 'H3', 'domica' ),
	'section'   => 'typo',
	'transport' => 'auto',
	'default'     => array(
		'font-size'      => '36px',
	),
	'output'      => array(
		array(
			'element' => 'h3',
		),
	),
));
/*h4*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'typography',
	'settings'  => 'typo_h4',
	'label'     => esc_attr__( 'H4', 'domica' ),
	'section'   => 'typo',
	'transport' => 'auto',
	'default'     => array(
		'font-size'      => '24px',
	),
	'output'      => array(
		array(
			'element' => 'h4',
		),
	),
));
/*h5*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'typography',
	'settings'  => 'typo_h5',
	'label'     => esc_attr__( 'H5', 'domica' ),
	'section'   => 'typo',
	'transport' => 'auto',
	'default'     => array(
		'font-size'      => '20px',
	),
	'output'      => array(
		array(
			'element' => 'h5',
		),
	),
));
/*h6*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'typography',
	'settings'  => 'typo_h6',
	'label'     => esc_attr__( 'H6', 'domica' ),
	'section'   => 'typo',
	'transport' => 'auto',
	'default'     => array(
		'font-size'      => '18px',
	),
	'output'      => array(
		array(
			'element' => 'h6',
		),
	),
));

/*HEADER LAYOUT=================================================================================================*/

/*Header layout 1 ==================================================*/
/*label*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'custom',
	'settings'  => 'kirki_label_header_layout1',
	'label'     => esc_attr__( 'Header Background', 'domica' ),
	'section'   => 'header_1',
	'partial_refresh' => array(
		'hd1_edit_location' => array(
			'selector'        => '#hd1-edit-location',
			'render_callback' => 'domica_header_edit_location',
		),
	),
));
/*background menu*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'settings'  => 'menu1_bg',
	'label'     => esc_attr__( 'Background', 'domica' ),
	'section'   => 'header_1',
	'transport' => 'auto',
	'default' => 'rgba(255,255,255,0)',
	'alpha' => true,
	'output' => array(
		array(
			'element' => '.header-layout-1  .theme-wrap-menu-flex,
							.header-layout-1 .theme-wrap-menu-flex .theme-primary-menu > li:not(.menu-item-has-mega-menu) .sub-menu',
			'function' => 'css',
			'property' => 'background-color'
		)
	),
));
/*label*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'custom',
	'settings'  => 'kirki_label_header_layout1_menu',
	'label'     => esc_attr__( 'Menu', 'domica' ),
	'section'   => 'header_1',
));
/*text color*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'settings'  => 'text_color_1',
	'label'     => esc_attr__( 'Text color', 'domica' ),
	'section'   => 'header_1',
	'transport' => 'auto',
	'default' => '#232323',
	'output' => array( 
		array(
			'element' => '.header-layout-1 .theme-wrap-menu-flex .theme-primary-menu > li > a,
							.header-layout-1 .theme-menu-box .theme-wrap-menu-flex #ht-btn-search:before,
							.header-layout-1 .theme-wrap-menu-flex .theme-primary-menu > li:not(.menu-item-has-mega-menu) .sub-menu a',
			'function' => 'css',
			'property' => 'color'
		)
	),
));
/*text heading highlight color*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'settings'  => 'text_menu_highlight_1',
	'label'     => esc_attr__( 'Text highlight color', 'domica' ),
	'section'   => 'header_1',
	'transport' => 'auto',
	'default' => '#1980d8',
	'output' => array( 
		array(
			'element' => '	.header-layout-1 .theme-wrap-menu-flex .theme-primary-menu > li:hover > a,
							.header-layout-1 .theme-wrap-menu-flex .theme-primary-menu > li.current-menu-item > a,
							.header-layout-1 .theme-wrap-menu-flex .theme-primary-menu > li.current-menu-ancestor > a,
							.header-layout-1 .theme-wrap-menu-flex .theme-primary-menu > li:not(.menu-item-has-mega-menu) .sub-menu a:hover,
							.header-layout-1 .theme-menu-box .theme-wrap-menu-flex #ht-btn-search:hover:before',
			'function' => 'css',
			'property' => 'color'
		)
	),
));
/*label*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'custom',
	'settings'  => 'kirki_label_header_sticky_layout1',
	'label'     => esc_attr__( 'Sticky Menu', 'domica' ),
	'section'   => 'header_1',
	'partial_refresh' => array(
		'hd1_edit_location' => array(
			'selector'        => '#hd1-edit-location',
			'render_callback' => 'domica_header_edit_location',
		),
	),
));
//menu stick
domica_Kirki::add_field( 'domica', array(
	'type'      => 'switch',
	'settings'  => 'c_menu_stick',
	'label'     => esc_attr__( 'Sticky?', 'domica' ),
	'section'   => 'header_1',
	'default'   => '1',
	'priority'  => 20,
	'choices' => array(
		'on' => esc_attr__( 'On', 'domica' ),
		'off' => esc_attr__( 'Off', 'domica' ),
	),
));

/*Header layout 2 ==================================================*/

/*label*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'custom',
	'settings'  => 'kirki_label_header_layout2',
	'label'     => esc_attr__( 'Header Background', 'domica' ),
	'section'   => 'header_2',
));
/*background menu*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'settings'  => 'menu2_bg',
	'label'     => esc_attr__( 'Background', 'domica' ),
	'section'   => 'header_2',
	'transport' => 'auto',
	'default' => 'rgba(255,255,255,0)',
	'alpha' => true,
	'output' => array(
		array(
			'element' => '.header-layout-2 .theme-menu-box .theme-wrap-menu-flex',
			'function' => 'css',
			'property' => 'background-color'
		)
	),
));

/*label*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'custom',
	'settings'  => 'kirki_label_header_layout2_menu',
	'label'     => esc_attr__( 'Menu', 'domica' ),
	'section'   => 'header_2',
));
/*text color*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'settings'  => 'text_color_2',
	'label'     => esc_attr__( 'Text color', 'domica' ),
	'section'   => 'header_2',
	'transport' => 'auto',
	'default' => '#232323',
	'output' => array( 
		array(
			'element' => '.header-layout-2 .theme-wrap-menu-flex .theme-primary-menu > li > a, .header-layout-2 .theme-menu-box .theme-wrap-menu-flex #ht-btn-search:before,
							.header-layout-2 .theme-wrap-menu-flex .theme-primary-menu > li:not(.menu-item-has-mega-menu) .sub-menu a',
			'function' => 'css',
			'property' => 'color'
		)
	),
));
/*text heading highlight color*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'settings'  => 'text_menu_highlight_2',
	'label'     => esc_attr__( 'Text highlight color', 'domica' ),
	'section'   => 'header_2',
	'transport' => 'auto',
	'default' => '#1980d8',
	'output' => array( 
		array(
			'element' => '	.header-layout-2 .theme-wrap-menu-flex .theme-primary-menu > li:hover > a,
							.header-layout-2 .theme-wrap-menu-flex .theme-primary-menu > li.current-menu-item > a,
							.header-layout-2 .theme-wrap-menu-flex .theme-primary-menu > li.current-menu-ancestor > a,
							.header-layout-2 .theme-wrap-menu-flex .theme-primary-menu > li:not(.menu-item-has-mega-menu) .sub-menu a:hover,
							.header-layout-2 .theme-menu-box .theme-wrap-menu-flex #ht-btn-search:hover:before',
			'function' => 'css',
			'property' => 'color'
		)
	),
));
/*label*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'custom',
	'settings'  => 'kirki_label_header_sticky_layout2',
	'label'     => esc_attr__( 'Sticky Menu', 'domica' ),
	'section'   => 'header_2',
	'partial_refresh' => array(
		'hd1_edit_location' => array(
			'selector'        => '#hd2-edit-location',
			'render_callback' => 'domica_header_edit_location',
		),
	),
));
//menu stick
domica_Kirki::add_field( 'domica', array(
	'type'      => 'switch',
	'settings'  => 'c_menu_stick_2',
	'label'     => esc_attr__( 'Sticky?', 'domica' ),
	'section'   => 'header_2',
	'default'   => '1',
	'priority'  => 20,
	'choices' => array(
		'on' => esc_attr__( 'On', 'domica' ),
		'off' => esc_attr__( 'Off', 'domica' ),
	),
));
/*Header layout 3 ==================================================*/
/*label*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'custom',
	'settings'  => 'kirki_label_topbar3',
	'label'     => esc_attr__( 'Topbar Custom', 'domica' ),
	'section'   => 'header_3',
	'partial_refresh' => array(
		'hd3_edit_location' => array(
			'selector'        => '#hd3-edit-location',
			'render_callback' => 'domica_header_edit_location',
		),
	),
));
/*label*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'custom',
	'settings'  => 'kirki_label_header_layout3',
	'label'     => esc_attr__( 'Header Background', 'domica' ),
	'section'   => 'header_3',
));
/*background menu*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'settings'  => 'menu3_bg',
	'label'     => esc_attr__( 'Background', 'domica' ),
	'section'   => 'header_3',
	'transport' => 'auto',
	'default' => '#ffffff',
	'alpha' => true,
	'output' => array(
		array(
			'element' => '.header-layout-3 .theme-menu-box .theme-wrap-menu-flex,
						.header-layout-3 .theme-menu-box .theme-wrap-menu-flex .theme-primary-menu > li:not(.menu-item-has-mega-menu) .sub-menu',
			'function' => 'css',
			'property' => 'background-color'
		)
	),
));
/*label*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'custom',
	'settings'  => 'kirki_label_header_layout3_menu',
	'label'     => esc_attr__( 'Menu', 'domica' ),
	'section'   => 'header_3',
));
/*text color*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'settings'  => 'text_color_3',
	'label'     => esc_attr__( 'Text color', 'domica' ),
	'section'   => 'header_3',
	'transport' => 'auto',
	'default' => '#232323',
	'output' => array( 
		array(
			'element' => '.header-layout-3 .theme-wrap-menu-flex .theme-primary-menu > li > a, .header-layout-3 .theme-menu-box .theme-wrap-menu-flex #ht-btn-search:before,
							.header-layout-3 .theme-wrap-menu-flex .theme-primary-menu > li:not(.menu-item-has-mega-menu) .sub-menu a',
			'function' => 'css',
			'property' => 'color'
		)
	),
));
/*text heading highlight color*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'settings'  => 'text_menu_highlight_3',
	'label'     => esc_attr__( 'Text highlight color', 'domica' ),
	'section'   => 'header_3',
	'transport' => 'auto',
	'default' => '#1980d8',
	'output' => array( 
		array(
			'element' => '	.header-layout-3 .theme-wrap-menu-flex .theme-primary-menu > li:hover > a,
							.header-layout-3 .theme-wrap-menu-flex .theme-primary-menu > li.current-menu-item > a,
							.header-layout-3 .theme-wrap-menu-flex .theme-primary-menu > li.current-menu-ancestor > a,
							.header-layout-3 .theme-wrap-menu-flex .theme-primary-menu > li:not(.menu-item-has-mega-menu) .sub-menu a:hover,
							.header-layout-3 .theme-menu-box .theme-wrap-menu-flex #ht-btn-search:hover:before',
			'function' => 'css',
			'property' => 'color'
		)
	),
));
/*label*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'custom',
	'settings'  => 'kirki_label_header_sticky_layout3',
	'label'     => esc_attr__( 'Sticky Menu', 'domica' ),
	'section'   => 'header_3',
	'partial_refresh' => array(
		'hd1_edit_location' => array(
			'selector'        => '#hd3-edit-location',
			'render_callback' => 'domica_header_edit_location',
		),
	),
));
//menu stick
domica_Kirki::add_field( 'domica', array(
	'type'      => 'switch',
	'settings'  => 'c_menu_stick_3',
	'label'     => esc_attr__( 'Sticky?', 'domica' ),
	'section'   => 'header_3',
	'default'   => '1',
	'priority'  => 20,
	'choices' => array(
		'on' => esc_attr__( 'On', 'domica' ),
		'off' => esc_attr__( 'Off', 'domica' ),
	),
));

/*GENERAL===================================================================================================*/
/*header layout*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'select',
	'settings'  => 'header_layout_cfg',
	'label'     => esc_attr__( 'Header Layout', 'domica' ),
	'section'   => 'c_general',
	'default'   => 'layout-2',
	'description' => esc_attr__('Choose Header Preset Select your main header preset here to apply for all pages', 'domica'),
	'choices' => array(
		'layout-1' => esc_attr__('Layout 1', 'domica'),
		'layout-2' => esc_attr__('Layout 2', 'domica'),
		'layout-3' => esc_attr__('Layout 3', 'domica'),
	)
));

/*logo image*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'image',
	'settings'  => 'logo_img',
	'label'     => esc_attr__( 'Logo image', 'domica' ),
	'description' => esc_attr__('Select logo image your website', 'domica'),
	'section'   => 'c_general',
));
domica_Kirki::add_field( 'domica', array(
	'type'      => 'image',
	'settings'  => 'logo_transparent',
	'label'     => esc_attr__( 'Logo Transparent', 'domica' ),
	'description' => esc_attr__('Select logo for transparent menu style', 'domica'),
	'section'   => 'c_general',
));

/*loading effect*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'switch',
	'settings'  => 'loading',
	'label'     => esc_attr__( 'Loading effect', 'domica' ),
	'section'   => 'c_general',
	'default'   => '0',
	'description' => esc_attr__('This option shows animated page loader', 'domica'),
	'choices' => array(
		'off' => esc_attr__('Off', 'domica'),
		'on' => esc_attr__('On', 'domica'),
	)
));

/*BREADCRUMBS===================================================================================================*/

/*en/disable page breadcumbs*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'switch',
	'settings'  => 'c_page_header',
	'label'     => esc_attr__( 'Display', 'domica' ),
	'section'   => 'c_crumbs',
	'default'   => '1',
	'transport' => 'refresh',
	'priority'  => 2,
	'choices' => array(
		'yes' => esc_attr__('Yes', 'domica'),
		'no' => esc_attr__('No', 'domica'),
	),
	'partial_refresh' => array(
		'bread_edit_location' => array(
			'selector'        => '#bread-edit-location',
			'render_callback' => 'domica_bread_edit_location',
		),
	),
));
/*header text color*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'default' => '#232323',
	'alpha' => true,
	'label'     => esc_attr__( 'Text color', 'domica' ),
	'settings'  => 'c_header_text_color',
	'section'   => 'c_crumbs',
	'priority'  => 6,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.bread .page-title, .bread .crumbs .first-item a, .bread .crumbs .first-item span, .bread .crumbs .last-item i',
			'function' => 'css',
			'property' => 'color'
		)	
	),
	'active_callback'  => array(
		array(
			'setting'  => 'c_page_header',
			'operator' => '==',
			'value'    => '1',
		),
	)
));


/*breadcrumbs display*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'switch',
	'settings'  => 'c_crumbs',
	'section'   => 'c_crumbs',
	'label'     => esc_attr__( 'Navigation bar', 'domica' ),
	'priority'  => 10,
	'default'     => '0',
	'choices' => array(
		'on'  => esc_attr__( 'On', 'domica' ),
		'off' => esc_attr__( 'Off', 'domica' )
	),
	'active_callback'  => array(
		array(
			'setting'  => 'c_page_header',
			'operator' => '==',
			'value'    => '1',
		),
	)
));
/*background breadcrumb*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'radio',
	'settings'  => 'c_header_bg',
	'label'     => esc_attr__( 'Background', 'domica' ),
	'description' => esc_attr__('If select background image option, the theme recommends a header size of at least 1170 width pixels', 'domica'),
	'section'   => 'c_crumbs',
	'default'   => 'bg_color',
	'priority'  => 30,
	'choices'   => array(
		'bg_image' => esc_attr__( 'Use Image', 'domica' ),
		'bg_color' => esc_attr__( 'Use Solid Color', 'domica' ),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'c_page_header',
			'operator' => '==',
			'value'    => '1',
		),
	),
));
//use img
domica_Kirki::add_field( 'domica', array(
	'type'      => 'cropped_image',
	'settings'  => 'c_header_bg_image',
	'label'     => esc_attr__( 'Upload Image', 'domica' ),
	'section'   => 'c_crumbs',
	'width'	=> 1920,
	'height' => 570,
	'description'   => esc_attr__( 'Upload background image of page header here!', 'domica' ),
	'priority'  => 40,
	'output'     => array(
		array(
			'element' => '.bridge-breadcrumb',
			'function' => 'css',
			'property' => 'background-image',
		)
	),
	'active_callback'  => array(
		array(
			'setting'  => 'c_page_header',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'c_header_bg',
			'operator' => '==',
			'value'    => 'bg_image',
		),
	)
));
//use css
domica_Kirki::add_field( 'domica', array(
  'type'        => 'color',
	'settings'    => 'c_header_bg_color',
	'label'       => esc_attr__( 'Select Color', 'domica' ),
	'section'     => 'c_crumbs',
	'default'     => '#c0ccd2',
 	'transport'   => 'auto',
	'priority'    => 50,
	'output'     => array(
		array(
			'element' => '.bridge-breadcrumb',
			'function' => 'css',
			'property' => 'background-color',
		)
	),
  	'active_callback'  => array(
		array(
			'setting'  => 'c_page_header',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'c_header_bg',
			'operator' => '!=',
			'value'    => 'bg_image',
		),
	)
));


/*BLOG==========================================================================================================*/
/*label*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'custom',
	'settings'  => 'kirki_label_blog_info',
	'label'     => esc_attr__( 'This option only for Posts page', 'domica' ),
	'section'   => 'blog',
	'priority'  => 1,
));

/*blog title*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'text',
	'settings'  => 'b_header_title',
	'label'     => esc_attr__( 'Header Title', 'domica' ),
	'default'   => esc_attr__( 'My Blog!', 'domica' ),
	'section'   => 'blog',
	'priority'  => 5,
));

/*header text*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'textarea',
	'settings'  => 'b_header_text',
	'label'     => esc_attr__( 'Header description', 'domica' ),
	'description'     => esc_attr__( 'This will display under breadcrumbs (optional)', 'domica' ),
	'default'   => esc_attr__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur suscipit nulla ligula, nec tincid unt tortor pulvinar a. Proin nunc leo, imperdiet nec risus non.', 'domica' ),
	'section'   => 'blog',
	'priority'  => 10,
));

/*SHOP===========================================================================================================*/
/*shop title*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'text',
	'settings'  => 'shop_title',
	'label'     => esc_attr__( 'Shop page title', 'domica' ),
	'section'   => 'shop',
	'default' => 'Shop',
));

/*shop text*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'textarea',
	'settings'  => 'shop_text',
	'label'     => esc_attr__( 'Shop page text', 'domica' ),
	'section'   => 'shop',
	'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur suscipit nulla ligula, nec tincid unt tortor pulvinar a. Proin nunc leo, imperdiet nec risus non.',
));

/*FOOTER==========================================================================================================*/
/*footer display*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'switch',
	'label'     => esc_attr__( 'Footer widget', 'domica' ),
	'settings'  => 'c_footer_display',
	'section'   => 'c_footer',
	'default'   => '1',
	'choices' => array(
		'on' => esc_attr__('On', 'domica'),
		'off' => esc_attr__('Off', 'domica'),
	)
));

/*footer background*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'radio',
	'settings'  => 'c_footer_bg',
	'label'     => esc_attr__( 'Background', 'domica' ),
	'description' => esc_attr__('If select background image option, the theme recommends a header size of at least 1170 width pixels', 'domica'),
	'section'   => 'c_footer',
	'default'   => 'ft_color',
	'choices'   => array(
		'ft_image' => esc_attr__( 'Use Image', 'domica' ),
		'ft_color' => esc_attr__( 'Use Solid Color', 'domica' ),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'c_footer_display',
			'operator' => '==',
			'value'    => '1',
		),
	),
));
//use img
domica_Kirki::add_field( 'domica', array(
	'type'      => 'image',
	'settings'  => 'ft_bg_img',
	'label'     => esc_attr__( 'Upload Image', 'domica' ),
	'section'   => 'c_footer',
	'description'   => esc_attr__( 'Upload background image of page header here!', 'domica' ),
	'output' => array(
		array(
			'element' => '.theme-footer',
			'function' => 'css',
			'property' => 'background-image'
		)
	),
	'active_callback'  => array(
		array(
			'setting'  => 'c_footer_display',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'c_footer_bg',
			'operator' => '==',
			'value'    => 'ft_image',
		),
	)
));
//use css
domica_Kirki::add_field( 'domica', array(
  'type'        => 'color',
	'settings'    => 'ft_bg_color',
	'label'       => esc_attr__( 'Select Color', 'domica' ),
	'section'     => 'c_footer',
	'default'     => '#292b31',
 	'transport'   => 'auto',
	'output' => array(
		array(
			'element' => '.theme-footer',
			'function' => 'css',
			'property' => 'background-color'
		)
	),
  	'active_callback'  => array(
		array(
			'setting'  => 'c_footer_display',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'c_footer_bg',
			'operator' => '==',
			'value'    => 'ft_color',
		),
	)
));

// footer title widget
domica_Kirki::add_field( 'domica', array(
    'type'        => 'color',
	'settings'    => 'ft_widget_color',
	'label'       => esc_attr__( 'Widget Title Color', 'domica' ),
	'section'     => 'c_footer',
	'default'     => '#5c5d61',
 	'transport'   => 'auto',
	'output' => array(
		array(
			'element' => '.footer-widget-title',
			'function' => 'css',
			'property' => 'color',
		),
	),

));

/*label*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'custom',
	'settings'  => 'kirki_label_copyright',
	'label'     => esc_attr__( 'Copyright', 'domica' ),
	'section'   => 'c_footer',
));

/*copyright background*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'color',
	'settings'  => 'c_copyright_bg',
	'label'     => esc_attr__( 'Background color', 'domica' ),
	'section'   => 'c_footer',
	'default'   => '#282a30',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.coppy-right',
			'function' => 'css',
			'property' => 'background-color'
		)
	),
	'partial_refresh' => array(
		'footer_edit_location' => array(
			'selector'        => '#footer-edit-location',
			'render_callback' => 'domica_footer_edit_location',
		),
	),
));

/*copiright*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'textarea',
	'settings'  => 'c_copyright',
	'section'   => 'c_footer',
	'default' => '&copy; 2017 Bridge Church. All Rights Reserved.',
));

/*cause view link*/
domica_Kirki::add_field( 'domica', array(
	'type'      => 'text',
	'settings'  => 'cause_link_grid',
	'label'     => esc_attr__( 'Grid page link', 'domica' ),
	'section'   => 'cause_view',
	'default' => '',
));
domica_Kirki::add_field( 'domica', array(
	'type'      => 'text',
	'settings'  => 'cause_link_list',
	'label'     => esc_attr__( 'List page link', 'domica' ),
	'section'   => 'cause_view',
	'default' => '',
));
