<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );



/*link*/
$link = vc_build_link( $link );
$use_link = false;

if ( strlen( $link['url'] ) > 0 ) {
    
    $use_link = true;
    $a_href = $link['url'];
    $a_title = $link['title'];
    $a_target = $link['target'];
    $a_rel = $link['rel'];

    $attributes = array();

    $attributes[] = 'href="' . trim( $a_href ) . '"';
    if( ! empty( $a_title )){
        $attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
    }
    if ( ! empty( $a_target ) ) {
        $attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
    }
    if ( ! empty( $a_rel ) ) {
        $attributes[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
    }

    $attributes = implode( ' ', $attributes );
}

/*feature*/
$final_feature = '';
if($feature == 'yes')
    $final_feature = 'tbl-feature';

/*print css*/
$cid = '';
if($feature == 'yes' && !empty($color1) && !empty($color2)):

    $uid = uniqid();

    $cid = 'col-id-' . $uid;

    $css1 = $css2 = $border = $btn_border = array();

    $css1[] = 'color: ' . $color1;
    $css2[] = 'background-color: ' . $color2;

    $border[] = 'border-color: ' . $color1;
    $border[] = '-webkit-border-image: -webkit-linear-gradient(top, ' . $color1 . ', ' . $color2 . ') 100 10%;';
    $border[] = 'border-image: linear-gradient(to top, ' . $color1 . ', ' . $color2 . ') 1 10%;';

    $btn_border[] = 'border-color: ' . $color1;
    $btn_border[] = '-webkit-border-image: -webkit-linear-gradient(right, ' . $color1 . ', ' . $color2 . ') 100 10%;';
    $btn_border[] = 'border-image: linear-gradient(to right, ' . $color1 . ', ' . $color2 . ') 1 10%;';
        

    echo '<style type="text/css">';
    echo '.theme-tbl-item.' . esc_attr($cid) . ' {' . implode( ';', $border ) . ';}';
    echo '.theme-tbl-item.' . esc_attr($cid) . ' .tbl-unit{' . implode( ';', $css1 ) . ';}';
    echo '.theme-tbl-item.' . esc_attr($cid) . ' .tbl-button, .theme-tbl-item.' . esc_attr($cid) . ' .tbl-sale{' . implode( ';', $css2 ) . ';}';
    echo '.theme-tbl-item.' . esc_attr($cid) . ' .tbl-button.theme-btn-material{' . implode( ';', $btn_border ) . ';}';
    echo '</style>';

endif;

?>

<div class="theme-tbl-item theme-col-item <?php echo esc_attr($cid); ?> <?php echo esc_attr($final_feature); ?><?php echo esc_attr( $all_class ); ?>">
    <?php if(!empty($sale)): ?>
    <span class="tbl-sale"><?php echo esc_html($sale); ?></span>
    <?php endif; ?>
    <h5 class="tbl-name"><?php echo esc_html($name); ?></h5>
   <div class="flex-parent-tbl">
       <strong class="tbl-price"><?php echo esc_html($price); ?></strong>
      <strong class="tbl-unit"><?php echo esc_html($unit); ?></strong>
   </div>
    <div class="tbl-content"><?php echo wp_kses_post($content); ?></div>
    <?php
        if($use_link):
            echo '<a class="tbl-button theme-btn-material" ' . esc_attr($attributes) . '>' . esc_attr($btn) . '</a>';
        else:
            echo '<button class="tbl-button button theme-btn-material">' . esc_attr($btn) . '</button>';
        endif;
    ?>
</div>