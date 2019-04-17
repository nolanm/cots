<?php
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.0
 * 
 * CMSMasters Sermons Fonts Rules
 * Created by CMSMasters
 * 
 */


function salvation_sermons_fonts($custom_css) {
	$cmsmasters_option = salvation_get_global_options();
	
	
	$custom_css .= "
/***************** Start CMSMasters Sermons Font Styles ******************/

	/* Start H3 Font */	
	
	/* Finish H3 Font */
	
	
	/* Start H6 Font */
	.cmsmasters_sermon_media_title,
	.cmsmasters_open_sermon .cmsmasters_sermon_cont_info .cmsmasters_sermon_info a span,
	.cmsmasters_sermon_cat,
	.cmsmasters_sermon_cat a,
	.cmsmasters_sermon_author,
	.cmsmasters_sermon_author a,
	.cmsmasters_sermon_date {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h6_font_google_font']) . $cmsmasters_option['salvation' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_h6_font_text_decoration'] . ";
	}
	
	.cmsmasters_open_sermon .cmsmasters_sermon_cont_info .cmsmasters_sermon_info a span {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h6_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_h6_font_line_height'] - 2) . "px;
	}
	/* Finish H6 Font */
	
/***************** Finish CMSMasters Sermons Font Styles ******************/

";
	
	
	return $custom_css;
}

add_filter('salvation_theme_fonts_filter', 'salvation_sermons_fonts');

