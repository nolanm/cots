<?php
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.0
 * 
 * CMSMasters Donations Colors Rules
 * Created by CMSMasters
 * 
 */


function salvation_donations_colors($custom_css) {
	$cmsmasters_option = salvation_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} CMSMasters Donations Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_campaign a,
	{$rule}.campaign_meta_wrap .cmsmasters_campaign_donations_count_number,
	{$rule}.cmsmasters_post_comments span,
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_campaign a,
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_stat_title {
		" . cmsmasters_color_css('color', $cmsmasters_option['salvation' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.cmsmasters_donation_details_item a:hover,
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_amount_currency,
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_campaign a:hover,
	{$rule}.campaign_meta_wrap .cmsmasters_campaign_target_number,
	{$rule}.cmsmasters_campaign_user_name a:hover,
	{$rule}.cmsmasters_campaign_category a:hover,
	{$rule}.cmsmasters_campaign_tags a:hover,
	{$rule}.cmsmasters_post_comments:hover:before,
	{$rule}.opened-article > .campaign .cmsmasters_campaign_title,
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_amount_currency,
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_campaign a:hover,
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_title a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['salvation' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donate_button .button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['salvation' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donate_button .button {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['salvation' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.cmsmasters_post_comments:before,
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_campaign_title a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['salvation' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.donation_confirm .donation_confirm_info_title,
	{$rule}.cmsmasters_donation_details_item_title,
	{$rule}.cmsmasters_donation_details_item a,
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donate_button .button:hover,
	{$rule}.cmsmasters_campaign_user_name a,
	{$rule}.cmsmasters_campaign_category a,
	{$rule}.cmsmasters_campaign_tags a,	
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_title a,
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_campaign_title a,
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat_title_wrap .cmsmasters_stat_counter_wrap {
		" . cmsmasters_color_css('color', $cmsmasters_option['salvation' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_featured_campaign .campaign .cmsmasters_img_rollover_wrap:hover .cmsmasters_img_rollover,
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_img_wrap .preloader:after,
	{$rule}.cmsmasters_donations .donation .cmsmasters_img_rollover_wrap:hover .cmsmasters_img_rollover {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['salvation' . '_' . $scheme . '_heading']) . ", 0.8);
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donate_button .button,
	{$rule}.cmsmasters_featured_campaign .campaign .cmsmasters_img_rollover_wrap .cmsmasters_open_post_link:before,
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_img_wrap .preloader:before,
	{$rule}.cmsmasters_donations .donation .cmsmasters_img_rollover_wrap .cmsmasters_open_post_link {
		" . cmsmasters_color_css('color', $cmsmasters_option['salvation' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donate_button .button:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['salvation' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.donation_confirm .donation_confirm_info_title {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['salvation' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.donation_confirm .donation_confirm_info_title,
	{$rule}.donation_confirm .donation_confirm_info,
	{$rule}.cmsmasters_donation_details_item,
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donate_button .button:hover,
	{$rule}.opened-article > .campaign .campaign_meta_wrap > div,
	{$rule}.opened-article > .campaign .cmsmasters_campaign_cont_info,
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_footer {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['salvation' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

/***************** Finish {$title} CMSMasters Donations Color Scheme Rules ******************/

";
	}
	
	
	return $custom_css;
}

add_filter('salvation_theme_colors_secondary_filter', 'salvation_donations_colors');

