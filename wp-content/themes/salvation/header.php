<?php
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.0
 * 
 * Website Header Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = salvation_get_global_options();


?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="cmsmasters_html">
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="format-detection" content="telephone=no" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php esc_url(bloginfo('pingback_url')); ?>" />
<script src="https://js.churchcenter.com/modal/v1"></script>
<link href="//db.onlinewebfonts.com/c/f19a1f5337e471a31f146915d59e0656?family=STONE+HARBOUR" rel="stylesheet" type="text/css"/>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action('cmsmasters_before_body', $cmsmasters_option); ?>

<?php salvation_get_header_search_form($cmsmasters_option); ?>

<!-- _________________________ Start Page _________________________ -->
<div id="page" class="<?php salvation_get_page_classes($cmsmasters_option); ?>hfeed site">
<?php do_action('cmsmasters_before_page', $cmsmasters_option); ?>

<!-- _________________________ Start Main _________________________ -->
<div id="main">
<?php 
if (CMSMASTERS_WOOCOMMERCE) {
	salvation_woocommerce_cart_dropdown($cmsmasters_option);
}
?>
	
<!-- _________________________ Start Header _________________________ -->
<header id="header"<?php 
	if ($cmsmasters_option['salvation' . '_header_styles'] == 'fullwidth') {
		echo ' class="header_fullwidth"';
	}
?>>
	<?php 
	do_action('cmsmasters_before_header', $cmsmasters_option);
	
	get_template_part('theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/template/header-top');
	
	get_template_part('theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/template/header-mid');
	
	get_template_part('theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/template/header-bot');
	
	do_action('cmsmasters_after_header', $cmsmasters_option);
	?>
</header>
<!-- _________________________ Finish Header _________________________ -->


<!-- _________________________ Start Middle _________________________ -->
<div id="middle">
<?php 
salvation_page_heading();


list($cmsmasters_layout, $cmsmasters_page_scheme) = salvation_theme_page_layout_scheme();


echo '<div class="middle_inner' . (($cmsmasters_page_scheme != 'default') ? ' cmsmasters_color_scheme_' . $cmsmasters_page_scheme : '') . '">' . "\n" . 
	'<div class="content_wrap ' . $cmsmasters_layout . '">' . "\n\n";

