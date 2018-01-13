<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class ) . $this->getCSSAnimation( $css_animation );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

/*color*/
$style = '';
if(!empty($color))
    $style = 'style="color: ' . trim($color) . ';"';

/*unit*/
$final_unit = '';
if($unit == 'yes' && !empty($unit_data)){
    $final_unit = '<span>' . $unit_data . '</span>';
}

/*unit position*/
$final_position = '';
if($unit == 'yes')
    $final_position = ' ' . $position;

?>

<div class="theme-counter <?php echo esc_attr($counter_style)?><?php echo esc_attr($all_class); ?>" <?php echo wp_kses_post($style); ?>>
    <div class="counter-top<?php echo esc_attr($final_position); ?>">
        <?php echo wp_kses_post($final_unit); ?>
        <span class="counter-number"><?php echo esc_html($number); ?></span>
    </div>
    <?php
        if(!empty($text)):
            echo '<span class="counter-text">';
            echo esc_html($text);
            echo '</span>';
        endif;
    ?>
</div>