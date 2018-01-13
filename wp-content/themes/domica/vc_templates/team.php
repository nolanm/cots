<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class ) . $this->getCSSAnimation( $css_animation );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$img = wp_get_attachment_image_src($atts["img"], 'full');


if($social == 'yes'):
    $list = (array) vc_param_group_parse_atts( $list );
endif;
?>

<div class="theme-team-member <?php echo esc_attr($align); ?><?php echo esc_attr($all_class); ?>">
    <?php if(!empty($img)): ?>
    <div class="member-img"><img src="<?php echo esc_url($img[0]); ?>" alt="<?php esc_attr_e('Member image', 'domica'); ?>"></div>
    <?php endif; ?>
    <div class="member-name"><a href="#"><?php echo esc_html($name); ?></a></div>
    <div class="member-job"><?php echo esc_html($job); ?></div>
    <div class="member-content"><?php echo wp_kses_post($content); ?></div>
    <?php if($social == 'yes'):/*member social*/ ?>
        <div class="member-social">
            <?php
                foreach($list as $key):
                    echo '<a href="' . esc_url($key['link']) . '"></a>';
                endforeach;
            ?>
        </div>
    <?php endif;/*end member social*/ ?>
</div>