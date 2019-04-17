<?php
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version		1.0.0
 * 
 * CMSMasters Sermons Single Sermon Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = salvation_get_global_options();


$sermon_tags = get_the_terms(get_the_ID(), 'srm-tags');

$cmsmasters_sermon_video_link = get_post_meta(get_the_ID(), 'cmsmasters_sermon_video_link', true);

$cmsmasters_sermon_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_sermon_audio_links', true);

$cmsmasters_sermon_download_link = get_post_meta(get_the_ID(), 'cmsmasters_sermon_download_link', true);

$cmsmasters_sermon_pdf_link = get_post_meta(get_the_ID(), 'cmsmasters_sermon_pdf_link', true);


$cmsmasters_sermon_title = get_post_meta(get_the_ID(), 'cmsmasters_sermon_title', true);

$cmsmasters_sermon_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_sermon_sharing_box', true);

$cmsmasters_sermon_author_box = get_post_meta(get_the_ID(), 'cmsmasters_sermon_author_box', true);

$cmsmasters_sermon_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_sermon_more_posts', true);

?>
<!--_________________________ Start Sermon Single Article _________________________ -->
<article id="post-<?php the_ID();?>" <?php post_class('cmsmasters_open_sermon'); ?>>
	<?php
	if ($cmsmasters_option['salvation' . '_sermon_date']) {
		echo '<abbr class="published cmsmasters_sermon_date" title="' . esc_attr(get_the_date()) . '">' . 
			esc_html(get_the_date()) . 
		'</abbr>';
	}
	

	if ($cmsmasters_sermon_title == 'true') {
		echo '<h2 class="cmsmasters_sermon_title entry-title">' . get_the_title(get_the_ID()) . '</h2>' . "\n";
	}
	
	
	if ($cmsmasters_option['salvation' . '_sermon_author'] || $cmsmasters_option['salvation' . '_sermon_cat'] || $cmsmasters_option['salvation' . '_sermon_tag'] || $cmsmasters_option['salvation' . '_sermon_comment'] || $cmsmasters_option['salvation' . '_sermon_like']) {
		echo '<div class="cmsmasters_sermon_cont_info entry-meta">';
		
		
		if ($cmsmasters_option['salvation' . '_sermon_author']) {
			echo '<div class="cmsmasters_sermon_author">' . 
				esc_html__('Speaker', 'salvation') . ': ' . 
				'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Speaker', 'salvation') . ' ' . esc_attr(get_the_author_meta('display_name')) . '" class="vcard author">' . 
					'<span class="fn" rel="author">' . esc_html(get_the_author_meta('display_name')) . '</span>' . 
				'</a>' . 
			'</div>' . "\n";
		}
		
		
		if ($cmsmasters_option['salvation' . '_sermon_cat']) {
			echo '<div class="cmsmasters_sermon_cat">' . esc_html__('In', 'salvation') . ' ' . salvation_get_the_category_list(get_the_ID(), 'srm-categs', ', ') . '</div>';
		}
		
		
		if ($cmsmasters_option['salvation' . '_sermon_tag'] && get_the_terms(get_the_ID(), 'srm-tags')) {
			echo '<div class="cmsmasters_sermon_author">' . 
				esc_html__('Tags', 'salvation') . ' ' . 
				get_the_term_list(get_the_ID(), 'srm-tags', '', ', ', '') . 
			'</div>';
		}
		
		
		if ($cmsmasters_option['salvation' . '_sermon_comment'] || $cmsmasters_option['salvation' . '_sermon_like']) {
			echo '<div class="cmsmasters_sermon_info">';
			
			if ($cmsmasters_option['salvation' . '_sermon_comment']) {
				salvation_get_comments('cmsmasters_sermon_comments', true);
			}
			
			if ($cmsmasters_option['salvation' . '_sermon_comment']) {
				cmsmasters_like('cmsmasters_sermon_likes', true);
			}
			
			echo '</div>';
		}
		
		echo '</div>';
	}
	
	
	if (has_post_thumbnail()) {
		salvation_thumb(get_the_ID(), 'post-thumbnail', false, true);
	}
	
	
	if (!post_password_required()) {
		if ($cmsmasters_sermon_pdf_link != '' || $cmsmasters_sermon_download_link != '' || $cmsmasters_sermon_audio_links != '' || $cmsmasters_sermon_video_link != '') {
			echo '<div class="cmsmasters_sermon_media">';
				
				if ($cmsmasters_sermon_video_link != '') {
					$unique_img_id = uniqid();
					
					echo '<a class="cmsmasters_sermon_media_item cmsmasters_theme_icon_sermon_video" href="' . esc_url($cmsmasters_sermon_video_link) . '" rel="ilightbox[' . esc_attr($unique_img_id) . ']">' . 
					'<span class="cmsmasters_sermon_media_title">' . esc_html__('Watch', 'salvation') . '</span>' . 
					'</a>';
				}
				
				
				if (!empty($cmsmasters_sermon_audio_links) && sizeof($cmsmasters_sermon_audio_links) > 0) {
					
					echo '<a href="#" class="cmsmasters_sermon_media_item cmsmasters_sermon_audio cmsmasters_theme_icon_sermon_audio">' . 
					'<span class="cmsmasters_sermon_media_title">' . esc_html__('Listen', 'salvation') . '</span>' . 
					'</a>';
						
						$attrs = array(
							'preload' => 'none'
						);
						
						
						foreach ($cmsmasters_sermon_audio_links as $cmsmasters_sermon_audio_link_url) {
							$attrs[substr(strrchr($cmsmasters_sermon_audio_link_url, '.'), 1)] = $cmsmasters_sermon_audio_link_url;
						}
						
						
						echo '<div class="cmsmasters_sermon_audio_content">' . 
							wp_audio_shortcode($attrs) . 
						'</div>';
				}
				
				
				if ($cmsmasters_sermon_download_link != '') {
					echo '<a class="cmsmasters_sermon_media_item cmsmasters_theme_icon_sermon_download" href="' . $cmsmasters_sermon_download_link . '" download>' . 
					'<span class="cmsmasters_sermon_media_title">' . esc_html__('Download', 'salvation') . '</span>' . 
					'</a>';
				}
				
				
				if ($cmsmasters_sermon_pdf_link != '') {
					echo '<a target="_blank" class="cmsmasters_sermon_media_item cmsmasters_theme_icon_sermon_pdf" href="' . $cmsmasters_sermon_pdf_link . '">' . 
					'<span class="cmsmasters_sermon_media_title">' . esc_html__('PDF', 'salvation') . '</span>' . 
					'</a>';
				}
				
			echo '</div>';
		}
	}
	
	
	if (get_the_content() != '') {
		echo '<div class="cmsmasters_sermon_content entry-content">' . "\n";
			
			the_content();
			
			
			wp_link_pages(array( 
				'before' => '<div class="subpage_nav">' . '<strong>' . esc_html__('Pages', 'salvation') . ':</strong>', 
				'after' => '</div>', 
				'link_before' => ' [ ', 
				'link_after' => ' ] ' 
			));
			
		echo '</div>';
	}
	?>
</article>
<!--_________________________ Finish Sermon Single Article _________________________ -->
<?php

if ($cmsmasters_sermon_sharing_box == 'true') {
	salvation_sharing_box(esc_html__('Like this sermon?', 'salvation'));
}


if ($cmsmasters_option['salvation' . '_sermon_nav_box']) {
	salvation_prev_next_posts();
}


if ($cmsmasters_sermon_author_box == 'true') {
	salvation_author_box(esc_html__('About author', 'salvation'), 'h3', 'h5');
}


if ($sermon_tags) {
	$tgsarray = array();
	
	
	foreach ($sermon_tags as $tagone) {
		$tgsarray[] = $tagone->term_id;
	}  
} else {
	$tgsarray = '';
}


if ($cmsmasters_sermon_more_posts != 'hide') {
	salvation_related( 
		'h3', 
		esc_html__('More sermons', 'salvation'),
		esc_html__('No sermons found', 'salvation'),
		$cmsmasters_sermon_more_posts, 
		$tgsarray, 
		$cmsmasters_option['salvation' . '_sermon_more_posts_count'], 
		$cmsmasters_option['salvation' . '_sermon_more_posts_pause'], 
		'sermon', 
		'srm-tags' 
	);
}


comments_template();

