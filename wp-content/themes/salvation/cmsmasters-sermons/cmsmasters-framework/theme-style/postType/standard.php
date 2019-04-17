<?php
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version		1.0.0
 * 
 * CMSMasters Sermons Sermon Standard Format
 * Created by CMSMasters
 * 
 */


$columns_num = '';

if ($cmsmasters_srm_columns == 1) {
	$columns_num = 'one_first';
} elseif ($cmsmasters_srm_columns == 2) {
	$columns_num = 'one_half';
} elseif ($cmsmasters_srm_columns == 3) {
	$columns_num = 'one_third';
} elseif ($cmsmasters_srm_columns == 4) {
	$columns_num = 'one_fourth';
}


$cmsmasters_sermons_metadata = explode(',', $cmsmasters_srm_metadata);

$title = (in_array('title', $cmsmasters_sermons_metadata)) ? true : false;
$author = (in_array('author', $cmsmasters_sermons_metadata)) ? true : false;
$srm_categories = (in_array('categories', $cmsmasters_sermons_metadata)) ? true : false;
$date = (in_array('date', $cmsmasters_sermons_metadata)) ? true : false;
$excerpt = (in_array('excerpt', $cmsmasters_sermons_metadata)) ? true : false;


$cmsmasters_sermon_video_link = get_post_meta(get_the_ID(), 'cmsmasters_sermon_video_link', true);
$cmsmasters_sermon_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_sermon_audio_links', true);
$cmsmasters_sermon_download_link = get_post_meta(get_the_ID(), 'cmsmasters_sermon_download_link', true);
$cmsmasters_sermon_pdf_link = get_post_meta(get_the_ID(), 'cmsmasters_sermon_pdf_link', true);

$cmsmasters_title = strip_tags(get_the_title(get_the_ID()));

?>

<!--_________________________ Start Sermon _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_sermon ' . $columns_num ); ?>>
<?php
	salvation_thumb_rollover(get_the_ID(), 'cmsmasters-blog-masonry-thumb', false, false, false, false, false, false, false, false, true);
	
	
	if (!post_password_required()) {
		if ($cmsmasters_sermon_pdf_link != '' || $cmsmasters_sermon_download_link != '' || $cmsmasters_sermon_audio_links != '' || $cmsmasters_sermon_video_link != '') {
			echo '<div class="cmsmasters_sermon_media">';
				
				if ($cmsmasters_sermon_video_link != '') {
					$unique_img_id = uniqid();
					
					echo '<a class="cmsmasters_sermon_media_item cmsmasters_theme_icon_sermon_video" href="' . esc_url($cmsmasters_sermon_video_link) . '" rel="ilightbox[' . esc_attr($unique_img_id) . ']"></a>';
				}
				
				
				if (!empty($cmsmasters_sermon_audio_links) && sizeof($cmsmasters_sermon_audio_links) > 0) {
					
					echo '<a href="#" class="cmsmasters_sermon_media_item cmsmasters_sermon_audio cmsmasters_theme_icon_sermon_audio"></a>';
						
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
					echo '<a class="cmsmasters_sermon_media_item cmsmasters_theme_icon_sermon_download" href="' . esc_url($cmsmasters_sermon_download_link) . '" download></a>';
				}
				
				
				if ($cmsmasters_sermon_pdf_link != '') {
					echo '<a target="_blank" class="cmsmasters_sermon_media_item cmsmasters_theme_icon_sermon_pdf" href="' . esc_url($cmsmasters_sermon_pdf_link) . '"></a>';
				}
				
			echo '</div>';
		}
	}
	
	
	if ($title) {
		echo '<h3 class="cmsmasters_sermon_title entry-title">' . '<a href="' . esc_url(get_permalink()) . '">' . esc_html($cmsmasters_title) . '</a>' . '</h3>' . "\n";
	}
	
	
	if ($author) {
		echo '<div class="cmsmasters_sermon_author">' . "\n" . 
			esc_html__('Speaker', 'salvation') . ': ' . 
			'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Speaker', 'salvation') . ' ' . esc_attr(get_the_author_meta('display_name')) . '" class="vcard author">' . 
				'<span class="fn" rel="author">' . esc_html(get_the_author_meta('display_name')) . '</span>' . 
			'</a>' . 
		'</div>' . "\n";
	}
	
	
	if ($srm_categories) {
		echo '<div class="cmsmasters_sermon_cat">' . esc_html__('Categories', 'salvation') . ': ' . salvation_get_the_category_list(get_the_ID(), 'srm-categs', ', ') . '</div>';
	}
	
	if ($date) {
		echo '<abbr class="cmsmasters_sermon_date" title="' . esc_attr(get_the_date()) . '">' . esc_html(get_the_date()) . '</abbr>' . "\n";
	}
	
	
	if ($excerpt && salvation_excerpt(20, false) != '') {
		echo '<div class="cmsmasters_sermon_content entry-content">' . wpautop(salvation_excerpt(20, false)) . '</div>' . "\n";
	}
?>
</article>

<!--_________________________ Finish Sermon _________________________ -->