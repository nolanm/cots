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

?>
<div class="theme-featurebox <?php echo esc_attr($featurebox_style); ?>">
    <?php if($featurebox_style == 'featurebox-style-1'): ?>
    <h1 class="featurebox-num">
        <?php echo esc_html($featurebox_number);?>
    </h1>
    <?php /*content*/ ?>
    <div class="featurebox-content">
        <?php
            /*title*/
            if($title_link == 'yes'):
                echo '<a class="featurebox-title" ' . esc_attr($attributes) . ' itemprop="name">' . esc_attr($featurebox_title) . '</a>';
            else:
                echo '<h6 class="featurebox-title" ' . esc_attr($attributes) . ' itemprop="name">' . esc_attr($featurebox_title) . '</h6>';
            endif;
        ?>
        <div class="featurebox-des" itemprop="description"><?php echo wp_kses_post($content); ?></div>
    </div>
    <?php elseif($featurebox_style == 'featurebox-style-2'): ?>
        <div class="featurebox-content">
            <?php
                /*title*/
                if($title_link == 'yes'):
                    echo '<a class="featurebox-title" ' . esc_attr($attributes) . ' itemprop="name">' . esc_attr($featurebox_title) . '</a>';
                else:
                    echo '<h6 class="featurebox-title" ' . esc_attr($attributes) . ' itemprop="name">' . esc_attr($featurebox_title) . '</h6>';
                endif;
            ?>
            <div class="featurebox-des" itemprop="description"><?php echo wp_kses_post($content); ?></div>
        </div>
        <h1 class="featurebox-num">
            <?php echo esc_html($featurebox_number);?>
        </h1>
    <?php elseif($featurebox_style == 'featurebox-style-3'): ?>
        <div class="featurebox-content">
            <?php
                /*title*/
                if($title_link == 'yes'):
                    echo '<a class="featurebox-title" ' . esc_attr($attributes) . ' itemprop="name">' . esc_attr($featurebox_title) . '</a>';
                else:
                    echo '<h6 class="featurebox-title" ' . esc_attr($attributes) . ' itemprop="name">' . esc_attr($featurebox_title) . '</h6>';
                endif;
            ?>
            <div class="featurebox-des" itemprop="description"><?php echo wp_kses_post($content); ?></div>
        </div>
    <?php endif; ?>
</div>