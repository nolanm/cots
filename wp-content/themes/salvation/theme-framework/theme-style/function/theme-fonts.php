<?php
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.0
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


function salvation_theme_fonts() {
	$cmsmasters_option = salvation_get_global_options();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.0
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


/***************** Start Theme Font Styles ******************/

	/* Start Content Font */
	.wpcf7-form-control-wrap,
	body,
	.datepicker th.datepicker-switch {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_content_font_google_font']) . $cmsmasters_option['salvation' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_content_font_font_style'] . ";
	}

	@media only screen min-width(769px) and (max-width: 950px) {
		.cmsmasters_icon_list_items.cmsmasters_icon_list_type_block.cmsmasters_icon_list_pos_left .cmsmasters_icon_list_item_content .cmsmasters_icon_list_item_text p {
			font-size:" . ((int) $cmsmasters_option['salvation' . '_content_font_font_size'] - 1) . "px;
		}
	}	

	.datepicker th.datepicker-switch {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_content_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_content_font_line_height'] - 6) . "px;
	}

	.datepicker table tr td span {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_content_font_google_font']) . $cmsmasters_option['salvation' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_content_font_font_size'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_content_font_font_style'] . ";
	}

	.datepicker table tr td span {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_content_font_font_size'] - 2) . "px;
	}
	
	code {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_content_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_content_font_line_height'] -2) . "px;
	}
	
	.cmsmasters_icon_list_items li:before {
		line-height:" . $cmsmasters_option['salvation' . '_content_font_line_height'] . "px;
	}
	/* Finish Content Font */


	/* Start Link Font */
	a {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_link_font_google_font']) . $cmsmasters_option['salvation' . '_link_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_link_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_link_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_link_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_link_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_link_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_link_font_text_decoration'] . ";
	}

	.subpage_nav > a, 
	.subpage_nav > span {
		font-style:normal;
	}
	
	a:hover {
		text-decoration:" . $cmsmasters_option['salvation' . '_link_hover_decoration'] . ";
	}

	#wpadminbar a {
		font-style: normal;
	}
	/* Finish Link Font */


	/* Start Navigation Title Font */	
	.navigation > li > a,
	.navigation > li > a span,
	nav > div > ul div.menu-item-mega-container > ul > li > a .nav_title {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_nav_title_font_google_font']) . $cmsmasters_option['salvation' . '_nav_title_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_nav_title_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_nav_title_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_nav_title_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_nav_title_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_nav_title_font_text_transform'] . ";
	}
	
	.navigation .menu-item-mega-container > ul > li > a .nav_title,
	nav > div > ul div.menu-item-mega-container > ul > li > a .nav_title {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_nav_title_font_font_size'] - 2) . "px;
		font-weight:normal;
	}

	@media only screen and (max-width:1440px) {
		.navigation > li > a span {
			font-size: 14px;
		}
		.header_mid .social_wrap a {
			font-size: 16px;
		}
	}
	/* Finish Navigation Title Font */


	/* Start Navigation Dropdown Font */
	.header_top,
	.header_top a,
	.navigation ul li a,
	.navigation > li > a .nav_subtitle,
	.navigation > li > a .nav_tag,
	.top_line_nav > li > a,
	.top_line_nav ul li a,
	.navigation .menu-item-mega-container > ul > li > a .nav_subtitle {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_nav_dropdown_font_google_font']) . $cmsmasters_option['salvation' . '_nav_dropdown_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_nav_dropdown_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_nav_dropdown_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_nav_dropdown_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_nav_dropdown_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_nav_dropdown_font_text_transform'] . ";
	}

	.navigation .menu-item-mega-container > ul > li > a .nav_subtitle {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_nav_dropdown_font_font_size'] - 2) . "px;
	}
	.navigation > li > a .nav_subtitle {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_nav_dropdown_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_nav_dropdown_font_line_height'] - 5) . "px;
	}
	
	.top_line_nav ul li a,
	.top_line_nav > li > a,
	.header_top,
	.header_top a {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_nav_dropdown_font_font_size'] - 2) . "px;
	}
	
	.header_top .meta_wrap > *[class^=\"cmsmasters-icon-\"]:before, 
	.header_top .meta_wrap > *[class*=\" cmsmasters-icon-\"]:before, 
	.header_top .meta_wrap > *[class^=\"cmsmasters_theme_icon_\"]:before, 
	.header_top .meta_wrap > *[class*=\" cmsmasters_theme_icon_\"]:before {
		font-size:" . $cmsmasters_option['salvation' . '_nav_dropdown_font_font_size'] . "px;
	}
	/* Finish Navigation Dropdown Font */


	/* Start H1 Font */
	h1,
	h1 a,
	.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]), 
	.cmsmasters_pricing_table .cmsmasters_currency, 
	.cmsmasters_pricing_table .cmsmasters_price,
	.cmsmasters_pricing_table .cmsmasters_coins,
	.cmsmasters_post_timeline .cmsmasters_post_day,
	#header .search_wrap .search_bar_wrap .search_field input,
	.logo .title {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h1_font_google_font']) . $cmsmasters_option['salvation' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_h1_font_text_decoration'] . ";
	}
	
	.cmsmasters_dropcap {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h1_font_google_font']) . $cmsmasters_option['salvation' . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['salvation' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_h1_font_text_decoration'] . ";
	}
	
	.cmsmasters_quotes_slider_type_center .cmsmasters_quote_placeholder:before,
	.cmsmasters_quotes_slider_type_box .cmsmasters_quote_header:before,
	blockquote:before,
	.cmsmasters_quotes_grid .cmsmasters_quotes_list:after,
	q:before,
	.cmsmasters_icon_list_items.cmsmasters_icon_list_icon_type_number .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	.cmsmasters_icon_box.box_icon_type_number:before,
	.cmsmasters_icon_box.cmsmasters_icon_heading_left.box_icon_type_number .icon_box_heading:before {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h1_font_google_font']) . $cmsmasters_option['salvation' . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['salvation' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h1_font_font_style'] . ";
	}
	
	.cmsmasters_post_timeline .cmsmasters_post_day {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h1_font_font_size'] + 8) . "px;
	}	
	
	.cmsmasters_pricing_table .cmsmasters_currency, 
	.cmsmasters_pricing_table .cmsmasters_price, 
	.cmsmasters_pricing_table .cmsmasters_coins {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h1_font_font_size'] - 6) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_h1_font_font_size'] - 6) . "px;
	}
	
	.cmsmasters_quotes_slider_type_box .cmsmasters_quote_header:before {
		font-size:50px; /* static */
		line-height:50px; /* static */
	}
	
	.cmsmasters_quotes_slider_type_center .cmsmasters_quote_placeholder:before {
		font-size:120px; /* static */
		line-height:130px; /* static */
	}
	
	blockquote:before,
	q:before {
		font-size:50px; /* static */
		line-height:50px; /* static */
	}
	
	.cmsmasters_dropcap.type1 {
		font-size:36px; /* static */
	}
	
	.cmsmasters_dropcap.type2 {
		font-size:20px; /* static */
	}
	
	.headline_outer .headline_inner .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h1_font_font_size'] + 5) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h1_font_line_height'] + 15) . "px;
	}
	
	.headline_outer .headline_inner.align_left .headline_icon {
		padding-left:" . ((int) $cmsmasters_option['salvation' . '_h1_font_font_size'] + 5) . "px;
	}
	
	.headline_outer .headline_inner.align_right .headline_icon {
		padding-right:" . ((int) $cmsmasters_option['salvation' . '_h1_font_font_size'] + 5) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon {
		padding-top:" . ((int) $cmsmasters_option['salvation' . '_h1_font_line_height'] + 15) . "px;
	}

	@media only screen and (max-width:540px) {
		#page .headline_outer .headline_inner .headline_text .entry-title {
			font-size:" . ((int) $cmsmasters_option['salvation' . '_h1_font_font_size'] - 7) . "px;
		}
	}
	/* Finish H1 Font */


	/* Start H2 Font */
	h2,
	h2 a,
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap,
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap .cmsmasters_stat_counter, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h2_font_google_font']) . $cmsmasters_option['salvation' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_h2_font_text_decoration'] . ";
	}
	
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h2_font_font_size'] + 16) . "px;
	}
	
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter.counter_has_icon .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap,
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter.counter_has_image .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h2_font_font_size'] + 4) . "px;
	}
	
	.cmsmasters_open_post .cmsmasters_post_header .cmsmasters_post_title,
	.cmsmasters_post_default .cmsmasters_post_header .cmsmasters_post_title,
	.cmsmasters_post_default .cmsmasters_post_header .cmsmasters_post_title a {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h2_font_font_size'] + 2) . "px;
	}
	
	.cmsmasters_archive_item_title a,
	.cmsmasters_archive_item_title {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h2_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_h2_font_line_height'] - 4) . "px;
	}
	
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap .cmsmasters_stat_counter {
		font-size: 32px;
	}
	/* Finish H2 Font */


	/* Start H3 Font */
	h3,
	h3 a, 
	.post_comments .post_comments_title {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h3_font_google_font']) . $cmsmasters_option['salvation' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_h3_font_text_decoration'] . ";
	}
	
	.cmsmasters_heading_wrap h3 {
		letter-spacing: 2px;
	}
	
	#cancel-comment-reply-link,
	.comment-reply-title,
	.post_comments_title,
	.cmsmasters_single_slider_title,
	.about_author_title {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h3_font_font_size'] - 2) . "px;
	}

	@media all and (max-width:1024px) {
		.cmsmasters_icon_box .icon_box_heading  {
			font-size:" . ((int) $cmsmasters_option['salvation' . '_h3_font_font_size'] - 3) . "px;
		}
		.cmsmasters_icon_list_items .cmsmasters_icon_list_item .cmsmasters_icon_list_item_title {
			font-size:" . ((int) $cmsmasters_option['salvation' . '_h3_font_font_size'] - 8) . "px;
		}
	}

	@media all and (max-width:768px) {
		.cmsmasters_project_puzzle .cmsmasters_project_header .cmsmasters_project_title a {
			font-size:" . ((int) $cmsmasters_option['salvation' . '_h3_font_font_size'] - 8) . "px;
			line-height:" . ((int) $cmsmasters_option['salvation' . '_h3_font_line_height'] - 10) . "px;
		}		
		.cmsmasters_project_grid .cmsmasters_project_header .cmsmasters_project_title a {
			font-size:" . ((int) $cmsmasters_option['salvation' . '_h3_font_font_size'] - 6) . "px;
			line-height:" . ((int) $cmsmasters_option['salvation' . '_h3_font_line_height'] - 6) . "px;
		}
	}
	
	/* Finish H3 Font */


	/* Start H4 Font */
	h4, 
	h4 a, 
	.cmsmasters_twitter_wrap .cmsmasters_twitter_item_content,
	.cmsmasters_twitter_wrap .cmsmasters_twitter_item_content a,
	.cmsmasters_quotes_slider_type_center .cmsmasters_quote_subtitle_wrap a,
	.cmsmasters_quotes_slider_type_center .cmsmasters_quote_subtitle_wrap,
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h4_font_google_font']) . $cmsmasters_option['salvation' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_h4_font_text_decoration'] . ";
	}
	
	.cmsmasters_quotes_slider_type_center .cmsmasters_quote_title {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h4_font_font_size'] + 6) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_h4_font_line_height'] - 4) . "px;
		font-style: normal;
		font-weight: bold;
	}
	
	.cmsmasters_profile_horizontal .cmsmasters_profile_header .cmsmasters_profile_subtitle {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h4_font_font_size'] - 2) . "px;
	}
	/* Finish H4 Font */


	/* Start H5 Font */
	h5,
	h5 a,
	.widget_nav_menu ul li a,
	.widget_rss ul li .rsswidget,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > a,
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap .cmsmasters_stat_units,
	.cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	.cmsmasters_toggles .cmsmasters_toggle_title a,
	.cmsmasters_tabs .cmsmasters_tabs_list_item a,
	.widget .widgettitle,
	.post_nav a,
	.cmsmasters_table thead th,
	.cmsmasters_table tfoot td {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h5_font_google_font']) . $cmsmasters_option['salvation' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_h5_font_text_decoration'] . ";
	}

	.widget_custom_popular_projects_entries .widgettitle,
	.widget_custom_latest_projects_entries .widgettitle {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h5_font_font_size'] - 1) . "px;
	}

	.cmsmasters_table thead th,
	.cmsmasters_table tfoot td {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h5_font_font_size'] - 1) . "px;
		font-weight:normal;
	}
	
	.cmsmasters_comment_item .cmsmasters_comment_item_title,
	.cmsmasters_comment_item .cmsmasters_comment_item_title a,
	.cmsmasters_single_slider .cmsmasters_single_slider_item_title,
	.cmsmasters_single_slider .cmsmasters_single_slider_item_title a {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h5_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_h5_font_line_height'] - 2) . "px;
	}
	
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > a {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h5_font_font_size'] - 3) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_h5_font_line_height'] - 4) . "px;
	}
	
	.widget_nav_menu ul li a,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item a {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h5_font_font_size'] - 5) . "px;	
	}	
	
	.widget_nav_menu ul li a {
		text-transform:uppercase;
	}
	
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap .cmsmasters_stat_units {
		font-weight:normal;
	}
	/* Finish H5 Font */


	/* Start H6 Font */
	h6,
	h6 a,
	.cmsmasters_comment_item .cmsmasters_comment_item_date,
	.widget_tag_cloud a,
	.widget_rss ul li .rss-date,
	.widget_rss ul li cite,
	.cmsmasters_widget_project_cont_info .cmsmasters_slider_project_category a,
	.cmsmasters_widget_project_cont_info .cmsmasters_slider_project_category,
	.widget_custom_twitter_entries .tweet_time,
	.widget_pages *, 
	.widget_categories *, 
	.widget_archive *, 
	.widget_meta *, 
	.cmsmasters_slider_project .cmsmasters_slider_project_cont_info,
	.cmsmasters_slider_project .cmsmasters_slider_project_cont_info a,
	.cmsmasters_slider_post .cmsmasters_slider_post_cont_info,
	.cmsmasters_slider_post .cmsmasters_slider_post_cont_info a,
	.cmsmasters_slider_post_read_more,
	.cmsmasters_pricing_table .cmsmasters_period,
	.cmsmasters_counters .cmsmasters_counter_title,
	.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat_counter_wrap,
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat_counter_wrap,
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap, 
	.cmsmasters_quotes_grid .cmsmasters_quote_subtitle_wrap,
	.cmsmasters_quotes_grid .cmsmasters_quote_subtitle_wrap a,
	.cmsmasters_quotes_slider_type_box .cmsmasters_quote_subtitle_wrap,
	.cmsmasters_quotes_slider_type_box .cmsmasters_quote_subtitle_wrap a,
	.cmsmasters_archive_item_type,
	.cmsmasters_archive_item_info,
	.cmsmasters_archive_item_info a,
	.cmsmasters_open_profile .profile_details, 
	.cmsmasters_open_profile .profile_details a, 
	.cmsmasters_open_profile .profile_features,
	.cmsmasters_open_profile .profile_features a,
	.cmsmasters_open_project .project_details_item, 
	.cmsmasters_open_project .project_details_item a, 
	.cmsmasters_open_project .project_features_item,
	.cmsmasters_open_project .project_features_item a,
	.cmsmasters_project_puzzle .cmsmasters_project_cont_info,
	.cmsmasters_project_puzzle .cmsmasters_project_cont_info a,
	.cmsmasters_project_grid .cmsmasters_project_read_more,
	.cmsmasters_project_grid .cmsmasters_project_category,
	.cmsmasters_project_grid .cmsmasters_project_category a,
	.cmsmasters_open_post > .cmsmasters_post_cont_info .cmsmasters_post_info a span, 
	.post.cmsmasters_post_puzzle .puzzle_post_content_wrapper .cmsmasters_post_footer > span,
	.post.cmsmasters_post_puzzle .puzzle_post_content_wrapper .cmsmasters_post_footer > span a,
	.comment-respond label,
	.cmsmasters_input label,
	.cmsmasters_radio > label,
	.cmsmasters_checkboxes > label,
	.cmsmasters_textarea label,
	.cmsmasters_select label,
	.wpcf7,
	.published,
	.cmsmasters_comment_item .comment-reply-link,
	.cmsmasters_comment_item .comment-edit-link,
	.pingslist .pingback .comment-edit-link,
	.share_posts a,
	.post_nav .post_nav_sub,
	.cmsmasters_wrap_pagination ul li .page-numbers,
	.cmsmasters_post_read_more,
	.cmsmasters_post_cont_info .cmsmasters_post_tags,
	.cmsmasters_post_cont_info .cmsmasters_post_tags a,
	.cmsmasters_post_cont_info .cmsmasters_post_author,
	.cmsmasters_post_cont_info .cmsmasters_post_author a,
	.cmsmasters_post_cont_info .cmsmasters_post_category,
	.cmsmasters_post_cont_info .cmsmasters_post_category a,
	.cmsmasters_post_default .cmsmasters_post_cont_info .cmsmasters_likes span,
	.cmsmasters_post_default .cmsmasters_post_cont_info .cmsmasters_comments span,
	.cmsmasters_breadcrumbs,
	.cmsmasters_breadcrumbs a{
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_h6_font_google_font']) . $cmsmasters_option['salvation' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['salvation' . '_h6_font_text_decoration'] . ";
	}

 	.widget_categories select,
 	.widget_archive select {
 		line-height:" . ((int) $cmsmasters_option['salvation' . '_h6_font_line_height'] - 5) . "px;
	}
 	
	.cmsmasters_slider_post_read_more {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h6_font_font_size'] + 2) . "px;
	}
	
	.cmsmasters_pricing_table .cmsmasters_period,
	.cmsmasters_counters .cmsmasters_counter_title,
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_title {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h6_font_font_size'] + 2) . "px;
	}
	
	.wpcf7,
	.cmsmasters_input label,
	.cmsmasters_radio > label,
	.cmsmasters_checkboxes > label,
	.cmsmasters_textarea label,
	.cmsmasters_select label,
	.comment-respond label {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h6_font_font_size'] - 1) . "px;
	}
	
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > .published,
	.cmsmasters_open_post > .cmsmasters_post_cont_info .cmsmasters_post_info a span, 
	.cmsmasters_comment_item .comment-reply-link,
	.cmsmasters_comment_item .comment-edit-link,
	.pingslist .pingback .comment-edit-link,
	.cmsmasters_comment_item .cmsmasters_comment_item_date,
	.cmsmasters_single_slider_item .published,
	.cmsmasters_post_default .cmsmasters_post_cont_info .cmsmasters_likes span,
	.cmsmasters_post_default .cmsmasters_post_cont_info .cmsmasters_comments span {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_h6_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_h6_font_line_height'] - 2) . "px;
	}
	
	.cmsmasters_open_profile .profile_sidebar .cmsmasters_likes a:before, 
	.cmsmasters_open_profile .profile_sidebar .cmsmasters_comments a:before,
	.cmsmasters_open_project .project_sidebar .cmsmasters_likes a:before, 
	.cmsmasters_open_project .project_sidebar .cmsmasters_comments a:before {
		line-height:" . ((int) $cmsmasters_option['salvation' . '_h6_font_line_height'] - 2) . "px;
	}
	
	.widget_categories ul li:before, 
	.widget_archive ul li:before {
		top:" . ((int) $cmsmasters_option['salvation' . '_h6_font_line_height'] / 2 + 1) . "px;
	}

	@media only screen and (max-width:425px) {
		.profiles.opened-article .share_posts a {
			font-size:" . ((int) $cmsmasters_option['salvation' . '_h6_font_font_size'] - 2) . "px;
		}
	}
	
	/* Finish H6 Font */


	/* Start Button Font */
	.cmsmasters_button, 
	.button, 
	input[type=submit], 
	input[type=button], 
	button,
	.header_donation_but .cmsmasters_button {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_button_font_google_font']) . $cmsmasters_option['salvation' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_button_font_text_transform'] . ";
	}

	.post-password-form input[type=submit] {
		line-height:" . ((int) $cmsmasters_option['salvation' . '_button_font_line_height'] - 4) . "px;
	}

	.cmsmasters_footer_default .footer_nav li a {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_button_font_google_font']) . $cmsmasters_option['salvation' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_button_font_font_size'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_button_font_text_transform'] . ";
		letter-spacing: 2px;
	}

	.header_donation_but .cmsmasters_button {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_button_font_font_size'] +1) . "px;
	}
	
	.share_wrap > a:before {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_button_font_font_size'] +2) . "px;
	}
	
	.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but,
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a {
		line-height:" . ((int) $cmsmasters_option['salvation' . '_button_font_line_height'] - 2) . "px;
	}
	
	.gform_wrapper .gform_footer input.button, 
	.gform_wrapper .gform_footer input[type=submit] {
		font-size:" . $cmsmasters_option['salvation' . '_button_font_font_size'] . "px !important;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	.cmsmasters_button.cmsmasters_but_icon_divider, 
	.cmsmasters_button.cmsmasters_but_icon_inverse {
		padding-left:" . ((int) $cmsmasters_option['salvation' . '_button_font_line_height'] + 20) . "px;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_divider:before, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:before, 
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_divider:after, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		width:" . $cmsmasters_option['salvation' . '_button_font_line_height'] . "px;
	}
	/* Finish Button Font */


	/* Start Small Text Font */
	small,
	form .formError .formErrorContent {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_small_font_google_font']) . $cmsmasters_option['salvation' . '_small_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_small_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_small_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_small_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_small_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['salvation' . '_small_font_text_transform'] . ";
	}
	
	.gform_wrapper .description, 
	.gform_wrapper .gfield_description, 
	.gform_wrapper .gsection_description, 
	.gform_wrapper .instruction {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_small_font_google_font']) . $cmsmasters_option['salvation' . '_small_font_system_font'] . " !important;
		font-size:" . $cmsmasters_option['salvation' . '_small_font_font_size'] . "px !important;
		line-height:" . $cmsmasters_option['salvation' . '_small_font_line_height'] . "px !important;
	}
	/* Finish Small Text Font */


	/* Start Text Fields Font */
	input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	textarea,
	select,
	option,
	code {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_input_font_google_font']) . $cmsmasters_option['salvation' . '_input_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_input_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_input_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_input_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_input_font_font_style'] . ";
	}
	
	.gform_wrapper input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.gform_wrapper textarea, 
	.gform_wrapper select {
		font-size:" . $cmsmasters_option['salvation' . '_input_font_font_size'] . "px !important;
	}
	/* Finish Text Fields Font */


	/* Start Blockquote Font */
	.cmsmasters_quotes_grid .cmsmasters_quote_content,
	.cmsmasters_quotes_slider_type_box .cmsmasters_quote_content,
	.cmsmasters_quotes_slider_type_center .cmsmasters_quote_content,
	q,
	blockquote {
		font-family:" . salvation_get_google_font($cmsmasters_option['salvation' . '_quote_font_google_font']) . $cmsmasters_option['salvation' . '_quote_font_system_font'] . ";
		font-size:" . $cmsmasters_option['salvation' . '_quote_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['salvation' . '_quote_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['salvation' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['salvation' . '_quote_font_font_style'] . ";
	}

	.cmsmasters_quotes_grid .cmsmasters_quote_content {
		font-size:" . ((int) $cmsmasters_option['salvation' . '_quote_font_font_size'] - 10) . "px;
		line-height:" . ((int) $cmsmasters_option['salvation' . '_quote_font_line_height'] - 20) . "px;
	}


	@media only screen and (max-width:540px) {
		.cmsmasters_quotes_slider_type_box .cmsmasters_quote_content,
		.cmsmasters_quotes_slider_type_center .cmsmasters_quote_content {
			font-size:" . ((int) $cmsmasters_option['salvation' . '_quote_font_font_size'] - 9) . "px;
			line-height:" . ((int) $cmsmasters_option['salvation' . '_quote_font_line_height'] - 12) . "px;		
		}
	}

	.cmsmasters_quotes_slider_type_center .cmsmasters_quote_content p,
	.cmsmasters_quotes_slider_type_box .cmsmasters_quote_content p {
		letter-spacing: -1px;
	}
	/* Finish Blockquote Font */

/***************** Finish Theme Font Styles ******************/


";
	
	
	return apply_filters('salvation_theme_fonts_filter', $custom_css);
}

