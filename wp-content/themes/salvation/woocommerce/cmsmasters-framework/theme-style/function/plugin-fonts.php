<?php
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.1
 * 
 * WooCommerce Fonts Rules
 * Created by CMSMasters
 * 
 */


function salvation_woocommerce_fonts($custom_css) {
	$cmsmasters_option = salvation_get_global_options();
	
	
	$custom_css .= "
/***************** Start WooCommerce Font Styles ******************/

	/* Start Navigation Title Font */
	.cmsmasters_dynamic_cart .cmsmasters_dynamic_cart_button span {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_nav_title_font_google_font']) . $cmsmasters_option['salvation' . '_nav_title_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_nav_title_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_nav_title_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_nav_title_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_nav_title_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_nav_title_font_text_transform'] . ";
	}

	.cmsmasters_dynamic_cart .cmsmasters_dynamic_cart_button span,
	.cmsmasters_dynamic_cart .cmsmasters_dynamic_cart_button {
		line-height: 16px;
	}
	.cmsmasters_dynamic_cart_link .cmsmasters_dynamic_cart_button span {
		line-height: 18px;
	}
	
	/* Finish Navigation Title Font */
	
	/* Start Content Font */
	.shop_table.woocommerce-checkout-review-order-table .product-name dl, 
	.shop_table.order_details .product-name dl {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_content_font_google_font']) . $cmsmasters_option['salvation' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_content_font_font_style'] . ";
	}
	
	.shop_table.woocommerce-checkout-review-order-table .product-name dl, 
	.shop_table.order_details .product-name dl {
		text-transform:none;
	}
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start H1 Font */
	/* Finish H1 Font */
	
	
	/* Start H3 Font */
	.cart_totals > h2,
	div.products > h2,
	.cmsmasters_single_product .product_title, 
	.shop_table.order_details tfoot tr:last-child td, 
	ul.order_details {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h3_font_google_font']) . $cmsmasters_option['salvation' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_h3_font_text_decoration'] . ";
	}
	
	.cmsmasters_single_product .product_title {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h3_font_font_size'] + 2) . "px;
	}

	ul.order_details {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h3_font_font_size'] - 6) . "px;
	}
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	.cmsmasters_single_product .price,
	.cmsmasters_product .button_to_cart,
	.cmsmasters_product .price, 
	.shop_table.order_details tfoot tr th {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h4_font_google_font']) . $cmsmasters_option['salvation' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_h4_font_text_decoration'] . ";
	}
	
	.cmsmasters_single_product .price {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h4_font_font_size'] + 8) . "px;
	}
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	.cmsmasters_products .product.product-category .woocommerce-loop-category__title,
	.shop_table.woocommerce-checkout-review-order-table .cart-subtotal td .amount,
	.shop_table.woocommerce-checkout-review-order-table .order-total td, 
	.shop_table.woocommerce-checkout-review-order-table .order-total th, 
	.shop_table.woocommerce-checkout-review-order-table .cart-subtotal th, 
	.shop_table.woocommerce-checkout-review-order-table th.product-name, 
	.cart_totals table .cart-subtotal th, 
	.cart_totals table .cart-subtotal .amount, 
	.cart_totals table .order-total th, 
	.cart_totals td strong > .amount,
	.cart_totals table .order-total .amount,
	.shop_table .product-name a, 
	.shop_table thead th, 
	.cmsmasters_woo_wrap_result .woocommerce-result-count, 
	.shop_table.order_details tfoot tr td, 
	ul.order_details strong, 
	.widget_layered_nav ul li, 
	.widget_layered_nav ul li a, 
	.widget_layered_nav_filters ul li, 
	.widget_layered_nav_filters ul li a, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a, 
	.widget_shopping_cart .cart_list a, 
	.widget > .product_list_widget a,
	.shop_table td > .amount,
	.shop_table.order_details tfoot tr th,
	.shop_table.order_details tfoot tr td {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h5_font_google_font']) . $cmsmasters_option['salvation' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_h5_font_text_decoration'] . ";
	}
	
	.cart_totals table .cart-subtotal th, 
	.cart_totals table .cart-subtotal .amount, 
	.cart_totals table .order-total th, 
	.cart_totals td strong > .amount,
	.cart_totals table .order-total .amount,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a, 
	.widget_shopping_cart .cart_list a, 
	.widget > .product_list_widget a {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h5_font_font_size'] - 3) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_h5_font_line_height'] - 6) . "px;
	}
	
	.shop_table.woocommerce-checkout-review-order-table .cart-subtotal td .amount,
	.shop_table.woocommerce-checkout-review-order-table .order-total td, 
	.shop_table.woocommerce-checkout-review-order-table .order-total th, 
	.shop_table.woocommerce-checkout-review-order-table .cart-subtotal th, 
	.shop_table.woocommerce-checkout-review-order-table th.product-name {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h5_font_font_size'] - 1) . "px;
	}
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	.widget > .product_list_widget .reviewer,
	.widget > .product_list_widget .amount, 
	.widget_product_categories ul li, 
	.widget_product_categories ul li a, 
	.widget_price_filter .price_slider_amount .price_label, 
	.widget_shopping_cart .total, 
	.widget_shopping_cart .total strong, 
	.widget_shopping_cart .cart_list .quantity, 
	.form-row label,
	.form-row label a,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total strong, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list .quantity, 
	.shop_attributes td,
	.cmsmasters_product .price del,
	.onsale, 
	.out-of-stock, 
	.stock, 
	.cmsmasters_product .cmsmasters_product_cat, 
	.cmsmasters_product .cmsmasters_product_cat a, 
	.cmsmasters_single_product .product_meta, 
	.cmsmasters_single_product .product_meta a {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h6_font_google_font']) . $cmsmasters_option['salvation' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_h6_font_text_decoration'] . ";
	}
	
	.widget > .product_list_widget .amount, 
	.widget_shopping_cart .cart_list .quantity,
	.form-row label a,
	.form-row label {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h6_font_font_size'] - 1) . "px;
	}
	
	.cmsmasters_product .price del {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h6_font_font_size'] - 2) . "px;
		text-decoration:line-through;
	}
	
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list .quantity {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h6_font_font_size'] - 3) . "px;
	}
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	.select2-dropdown,
	.widget_price_filter .price_slider_amount .button,
	.widget_shopping_cart .buttons .button,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .buttons .button {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_button_font_google_font']) . $cmsmasters_option['salvation' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_button_font_text_transform'] . ";
	}
	
	.widget_price_filter .price_slider_amount .button,
	.widget_shopping_cart .buttons .button,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .buttons .button {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_button_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_button_font_line_height'] - 6) . "px;
	}
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish WooCommerce Font Styles ******************/

";
	
	
	return $custom_css;
}

add_filter('salvation_theme_fonts_filter', 'salvation_woocommerce_fonts');

