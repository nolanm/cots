<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class ) . $this->getCSSAnimation( $css_animation );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$img = wp_get_attachment_image_src($atts["img"], 'full');
if(empty($color1))
    $color1 = '#0040b1';
if(empty($color2))
    $color2 = '#b20efd';


$thumbnail = fw_resize($img[0], 605, 375, true);

?>

<div class="theme-landing-item<?php echo esc_attr($all_class); ?>">
    <a href="<?php echo esc_url($url); ?>" class="sc-landing-link"></a>
    <div class="sc-landing-img" style="background: -webkit-linear-gradient(45deg, <?php echo esc_attr($color1); ?> 0%, <?php echo esc_attr($color2); ?> 100%);">        
        <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php esc_attr_e('Landing image', 'domica'); ?>">
    </div>
    <span class="land-title"><?php echo esc_html($title); ?></span>
    <span class="land-desc"><?php echo esc_html($desc); ?></span>
</div>