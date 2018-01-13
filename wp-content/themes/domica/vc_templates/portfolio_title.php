<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class ) . $this->getCSSAnimation( $css_animation );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );


$stories_subtitle = fw_get_db_post_option('','subtilte_text');

?>
<div class="stories-single-tilte">
    <h2 class="stories-title" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></h2>
    <p class="subtitle"><?php echo esc_html($stories_subtitle); ?></p>
</div>

