<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
// $class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

if(!empty($gallery_img)):

$gallery = shortcode_atts(array('gallery_img' => 'gallery_img',), $atts );
$image_ids=explode(',',$gallery['gallery_img']);
?>
<div class="theme-gallery <?php echo esc_attr($gallery_style); ?> flw<?php echo esc_attr( $all_class ); ?> ">	
	<!-- Full Width Style-->
	<?php if($gallery_style == 'gallery-style-1'): ?>
		<div class="container">
			<div class="gallery-hd">
				<?php 	echo '<h4 class="gallery-subtitle">' .$gallery_subtitle.' </h4>';
					echo '<h3 class="gallery-title">' .$gallery_title. '</h3>';
				?>
			</div>
		</div>
		<div class="gallery-grid-items">
			<?php
			foreach ($image_ids as $key => $value) {
				$single_img = wp_get_attachment_image_src($value, "full");
				$larger_img = wp_get_attachment_image_src($value, 'full');
				echo '<div class="gallery-item">';
				echo '<a href="'.esc_url($larger_img[0]).'" class="fancybox"><img src="'.esc_url($single_img[0]).'" alt="'.esc_html__('Gallery image', 'domica').'"><i class="ion-ios-eye-outline"></i></a>';
				echo '</div>';
				}
			?>
		</div>
	<!--End of Full Width Style-->
	<?php elseif ($gallery_style == 'gallery-style-2') : ?>
		<div class="container">
			<div class="gallery-hd">
				<?php 	echo '<h4 class="gallery-subtitle">' .$gallery_subtitle.' </h4>';
					echo '<h3 class="gallery-title">' .$gallery_title. '</h3>';
				?>
			</div>
			<div class="gallery-grid-items">
				<?php
				foreach ($image_ids as $key => $value) {
					$single_img = wp_get_attachment_image_src($value, "full");
					$larger_img = wp_get_attachment_image_src($value, 'full');
					echo '<div class="gallery-item">';
					echo '<a href="'.esc_url($larger_img[0]).'" class="fancybox"><img src="'.esc_url($single_img[0]).'" alt="'.esc_html__('Gallery image', 'domica').'"><i class="ion-ios-eye-outline"></i></a>';
					echo '</div>';
				}
			?>
			</div>
		</div>
	<?php elseif ($gallery_style == 'gallery-style-3') : ?>
		<!-- <div class="container"> -->
			<div class="gallery-grid-items grid">
				<?php
				foreach ($image_ids as $key => $value) {
					$single_img = wp_get_attachment_image_src($value, "full");
					$larger_img = wp_get_attachment_image_src($value, 'full');
					echo '<div class="gallery-item">';
					echo '<a href="'.esc_url($larger_img[0]).'" class="fancybox"><img src="'.esc_url($single_img[0]).'" alt="'.esc_html__('Gallery image', 'domica').'"><i class="ion-ios-eye-outline"></i></a>';
					echo '</div>';
					}
				?>
			</div>
		<!-- </div> -->
	<?php endif; ?>
</div>
<?php endif; ?>