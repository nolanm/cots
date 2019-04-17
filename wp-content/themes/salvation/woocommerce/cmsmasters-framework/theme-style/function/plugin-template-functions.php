<?php 
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version		1.0.0
 * 
 * WooCommerce Template Functions
 * Created by CMSMasters
 * 
 */


/* Dynamic Cart */
function salvation_woocommerce_cart_dropdown($cmsmasters_option) {
	global $woocommerce;
	
	$cart_count = $woocommerce->cart->get_cart_contents_count();
	
	echo '<div class="cmsmasters_dynamic_cart_wrap">' . 
		'<div class="cmsmasters_dynamic_cart' . ($cart_count > 0 ? ' cmsmasters_active' : '') . '">' .  
			'<a href="javascript:void(0);" class="cmsmasters_dynamic_cart_button"><span class="cmsmasters_theme_icon_basket"></span></a>' . 
			'<div class="cmsmasters_dynamic_cart_button_hide"></div>' . 
			'<div class="widget_shopping_cart_content"></div>' . 
		'</div>' . 
	'</div>';
}


function salvation_woocommerce_cart_link($cmsmasters_option) {
	global $woocommerce;	
	
	if ($cmsmasters_option['salvation' . '_header_styles'] != 'c_nav') {
		echo '<div class="cmsmasters_dynamic_cart_wrap">' . 
			'<div class="cmsmasters_dynamic_cart_link">' .  
				'<a href="' . esc_url(wc_get_cart_url()) . '" class="cmsmasters_dynamic_cart_button"><span class="cmsmasters_theme_icon_basket"></span></a>' . 
			'</div>' . 
		'</div>';
	}
}
add_action('cmsmasters_after_logo', 'salvation_woocommerce_cart_link');


/* Add to Cart Button */
function salvation_woocommerce_add_to_cart_button() {
	global $woocommerce, 
		$product;
	
	
	if ( 
		$product->is_purchasable() && 
		$product->is_type( 'simple' ) && 
		$product->is_in_stock() 
	) {
		echo '<div class="button_to_cart_wrap">' . 
			'<a href="' . esc_url($product->add_to_cart_url()) . '" data-product_id="' . esc_attr($product->get_id()) . '" data-product_sku="' . esc_attr($product->get_sku()) . '" class="button_to_cart add_to_cart_button cmsmasters_add_to_cart_button ajax_add_to_cart product_type_simple" title="' . esc_attr__('Add to Cart', 'salvation') . '">' . 
				'<span>' . esc_html__('Add to Cart', 'salvation') . '</span>' . 
			'</a>' . 
			'<a href="' . esc_url(wc_get_cart_url()) . '" class="button_to_cart added_to_cart wc-forward" title="' . esc_attr__('View Cart', 'salvation') . '">' . 
				'<span>' . esc_html__('View Cart', 'salvation') . '</span>' . 
			'</a>' . 
		'</div>';
	}
}


/* Rating */
function salvation_woocommerce_rating($icon_trans = '', $icon_color = '', $in_review = false, $comment_id = '', $show = true) {
	global $product;
	
	
	if (get_option( 'woocommerce_enable_review_rating') === 'no') {
		return;
	}
	
	
	$rating = (($in_review) ? intval(get_comment_meta($comment_id, 'rating', true)) : ($product->get_average_rating() ? $product->get_average_rating() : '0'));
	
	$itemtype = $in_review ? 'Rating' : 'AggregateRating';
	
	
	$out = "
<div class=\"cmsmasters_star_rating\" itemscope itemtype=\"http://schema.org/{$itemtype}\" title=\"" . sprintf(esc_html__('Rated %s out of 5', 'salvation'), $rating) . "\">
<div class=\"cmsmasters_star_trans_wrap\">
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
</div>
<div class=\"cmsmasters_star_color_wrap\" style=\"width:" . (($rating / 5) * 100) . "%\">
	<div class=\"cmsmasters_star_color_inner\">
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
	</div>
</div>
<span class=\"rating dn\"><strong itemprop=\"ratingValue\">" . esc_html($rating) . "</strong> " . esc_html__('out of 5', 'salvation') . "</span>
</div>
";
	
	
	if ($show) {
		print $out;
	} else {
		return $out;
	}
}


/* Price Format */
function salvation_woocommerce_price_format($format, $currency_pos) {
	$format = '%2$s<span>%1$s</span>';

	switch ( $currency_pos ) {
		case 'left' :
			$format = '<span>%1$s</span>%2$s';
		break;
		case 'right' :
			$format = '%2$s<span>%1$s</span>';
		break;
		case 'left_space' :
			$format = '<span>%1$s&nbsp;</span>%2$s';
		break;
		case 'right_space' :
			$format = '%2$s<span>&nbsp;%1$s</span>';
		break;
	}
	
	return $format;
}
 
add_action('woocommerce_price_format', 'salvation_woocommerce_price_format', 1, 2);


/* WooCommerce Onsale Filter */
add_filter('woocommerce_sale_flash', 'salvation_woocommerce_change_on_sale');

function salvation_woocommerce_change_on_sale() {
	return '<span class="onsale"><span>' . esc_html__('Sale!', 'woocommerce') . '</span></span>';
}


/* WooCommerce Dynamic cart count update after ajax */
function salvation_woocommerce_header_add_to_cart_count($dynamic_count) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<span class="cmsmasters_theme_icon_basket"></span>
	<?php
	
	$dynamic_count['.cmsmasters_dynamic_cart_button span'] = ob_get_clean();
	
	return $dynamic_count;
}

add_filter('add_to_cart_fragments', 'salvation_woocommerce_header_add_to_cart_count');

