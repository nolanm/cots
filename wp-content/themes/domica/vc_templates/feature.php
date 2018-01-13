<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class ) . $this->getCSSAnimation( $css_animation );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

/*order*/


/*link*/

    $link = vc_build_link( $link );
    $a_href = '#';
    if ( strlen( $link['url'] ) > 0 ) {
        $a_href = $link['url'];
        $a_title = $link['title'];
        $a_target = $link['target'];
        $a_rel = $link['rel'];
    }

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

    /*custom color of title*/
    if($title_color == 'yes'):
        /*ide color*/
        if(!empty($color)):
            $attributes[] = 'onmouseleave="this.style.color=\'' . $color . '\';"';
            $attributes[] = 'style="color: ' . $color . ';"';
        endif;
        /*hover color*/
        if(!empty($hover_color)):
            $attributes[] = 'onmouseenter="this.style.color=\'' . $hover_color . '\';"';
        endif;
    endif;
    /*extract attributes*/
    $attributes = implode( ' ', $attributes );

    $img = wp_get_attachment_image_src($atts["feature_image"], 'full');


?>
<div class="theme-feature <?php echo esc_attr($feature_style); ?>">
    <?php if(!empty($img)): ?>
        <div class="feature-img"><img src="<?php echo esc_url($img[0]); ?>" alt="<?php esc_attr_e('Feature image', 'domica'); ?>"></div>
    <?php endif; ?>
    <?php /*content*/ ?>
    <div class="feature-content">
        <?php
            /*title*/
            if($title_link == 'yes'):
                echo '<a class="feature-title" ' . $attributes . ' itemprop="name">' . $feature_title . '</a>';
            else:
                echo '<h6 class="feature-title" ' . $attributes . ' itemprop="name">' . $feature_title . '</h6>';
            endif;
        ?>
        <div class="feature-des" itemprop="description"><?php echo wp_kses_post($content); ?></div>
        <a href="<?php the_permalink(); ?>" class="ft-readmore"><i class="ion-ios-arrow-thin-right"></i></a>
    </div>
</div>