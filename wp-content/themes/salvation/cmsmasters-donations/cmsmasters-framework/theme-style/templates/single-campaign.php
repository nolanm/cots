<?php
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version		1.0.0
 * 
 * CMSMasters Donations Single Campaign Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = salvation_get_global_options();


$campaign_tags = get_the_terms(get_the_ID(), 'cp-tags');


$cmsmasters_campaign_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_campaign_sharing_box', true);

$cmsmasters_campaign_author_box = get_post_meta(get_the_ID(), 'cmsmasters_campaign_author_box', true);

$cmsmasters_campaign_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_campaign_more_posts', true);

$cmsmasters_campaign_title = get_post_meta(get_the_ID(), 'cmsmasters_campaign_title', true);

?>
<!--_________________________ Start Standard Campaign _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsmasters_campaign_cont">
	<?php
		if ($cmsmasters_option['salvation' . '_donations_campaign_date']) {
			salvation_donations_campaign_date('post');
		}
		
		
		if ($cmsmasters_campaign_title == 'true') {
			salvation_donations_campaign_heading(get_the_ID(), 'h2', false);
		}
		
		
		if ( 
			$cmsmasters_option['salvation' . '_donations_campaign_author'] || 
			$cmsmasters_option['salvation' . '_donations_campaign_cat'] || 
			$cmsmasters_option['salvation' . '_donations_campaign_tag'] || 
			$cmsmasters_option['salvation' . '_donations_campaign_like'] || 
			$cmsmasters_option['salvation' . '_donations_campaign_comment'] 
		) {
			echo '<div class="cmsmasters_campaign_cont_info entry-meta' . ((get_the_content() == '') ? ' no_bdb' : '') . '">';
				
				if ( 
					$cmsmasters_option['salvation' . '_donations_campaign_like'] || 
					$cmsmasters_option['salvation' . '_donations_campaign_comment'] 
				) {
					echo '<div class="cmsmasters_campaign_meta_info">';
						
						salvation_donations_campaign_like('post');
						
						salvation_donations_campaign_comments('post');
						
					echo '</div>';
				}
				
				
				salvation_donations_campaign_author('post');
				
				salvation_donations_campaign_category(get_the_ID(), 'cp-categs', 'post');
				
				salvation_donations_campaign_tags(get_the_ID(), 'cp-tags', 'post');
				
			echo '</div>';
		}
		
		
		if (!post_password_required() && has_post_thumbnail()) {
			salvation_thumb(get_the_ID(), 'post-thumbnail', false, true, true, true, true, true, false);
		}
		
		
		echo '<div class="campaign_meta_wrap">';
		
			salvation_donations_campaign_target(get_the_ID(), true);
			
			salvation_donations_campaign_donations_count(get_the_ID(), true);
			
			salvation_donations_campaign_donated(get_the_ID(), 'post');
			
			salvation_donations_campaign_donate_button(get_the_ID(), true);
			
		echo '</div>';
		
		
		if (get_the_content() != '') {
			echo '<div class="cmsmasters_campaign_content entry-content">';
				
				the_content();
				
				
				wp_link_pages(array( 
					'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . esc_html__('Pages', 'salvation') . ':</strong>', 
					'after' => '</div>', 
					'link_before' => ' [ ', 
					'link_after' => ' ] ' 
				));
				
			echo '<div class="cl"></div>' . 
			'</div>';
		}
	?>
	</div>
</article>
<!--_________________________ Finish Standard Campaign _________________________ -->
<?php

if ($cmsmasters_campaign_sharing_box == 'true') {
	salvation_sharing_box(esc_html__('Share this campaign?', 'salvation'));
}


if ($cmsmasters_option['salvation' . '_donations_campaign_nav_box']) {
	salvation_prev_next_posts();
}


if ($cmsmasters_campaign_author_box == 'true') {
	salvation_author_box(esc_html__('About author', 'salvation'), 'h3', 'h5');
}


if ($campaign_tags) {
	$tgsarray = array();
	
	foreach ($campaign_tags as $tagone) {
		$tgsarray[] = $tagone->term_id;
	}  
} else {
	$tgsarray = '';
}


if ($cmsmasters_campaign_more_posts != 'hide') {
	salvation_donations_related( 
		'h3', 
		esc_html__('More campaigns', 'salvation'), 
		esc_html__('No campaigns found', 'salvation'), 
		$cmsmasters_campaign_more_posts, 
		$tgsarray, 
		$cmsmasters_option['salvation' . '_donations_more_campaigns_count'], 
		$cmsmasters_option['salvation' . '_donations_more_campaigns_pause'], 
		'campaign', 
		'cp-tags' 
	);
}


comments_template(); 
