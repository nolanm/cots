<?php
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version		1.0.0
 * 
 * Profile Horizontal Template
 * Created by CMSMasters
 * 
 */


$columns_num = '';

if ($profile_columns == 1) {
	$columns_num = 'one_first';
} elseif ($profile_columns == 2) {
	$columns_num = 'one_half';
} elseif ($profile_columns == 3) {
	$columns_num = 'one_third';
} elseif ($profile_columns == 4) {
	$columns_num = 'one_fourth';
}


$cmsmasters_profile_social = get_post_meta(get_the_ID(), 'cmsmasters_profile_social', true);

$cmsmasters_profile_subtitle = get_post_meta(get_the_ID(), 'cmsmasters_profile_subtitle', true);

?>
<!--_________________________ Start Profile Horizontal Article _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_profile_horizontal ' . $columns_num); ?>>
	<div class="profile_outer">
	<?php 
	if (has_post_thumbnail()) {
		echo '<div class="cmsmasters_profile_img_wrap">';
			
			salvation_thumb_rollover(get_the_ID(), 'cmsmasters-square-thumb', false, true, false, false, false, false, false, false, true);
		
		echo '</div>';
	}
	
	
	echo '<div class="profile_inner">';
		
		salvation_profile_heading(get_the_ID(), 'h3', $cmsmasters_profile_subtitle, 'h4', true, 'horizontal');
		
		salvation_profile_exc_cont();
		
		salvation_profile_social_icons($cmsmasters_profile_social, $profile_id);
		
	echo '</div>';
	?>
	</div>
</article>
<!--_________________________ Finish Profile Horizontal Article _________________________ -->

