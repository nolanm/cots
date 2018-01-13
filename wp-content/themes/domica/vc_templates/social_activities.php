<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class ) . $this->getCSSAnimation( $css_animation );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );


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

/*icon*/
if($icon == 'use-font-icon'):
    
    $icon_data = array();
    

	if ( ! empty( $font_icon ) ) {
		$font_icon = esc_attr( trim( $font_icon ) );
	}
	if ( ! empty( $font_size ) ) {
		$icon_data[] = 'font-size: ' . esc_attr( trim( $font_size ) ) . ';';
	}
    if ( ! empty( $font_color ) ) {
		$icon_data[] = 'color: ' . esc_attr( trim( $font_color ) ) . ';';
	}
    
    $icon_data = 'style="' . implode( ' ', $icon_data ) . '"';    

else:
    $img = wp_get_attachment_image_src($atts["image"], 'full');
endif;



?>

<div class="theme-activities <?php echo esc_attr($act_style); ?>">
    <?php
        /*icon*/
        if($icon == 'use-font-icon'):
            echo '<span class="act-icon ' . esc_attr($font_icon) . '" ' . esc_attr($icon_data) . '></span>';
        else:
            if(!empty($img))
            echo '<div class="act-icon"><img itemprop="image" src="' . esc_url($img[0]) . '" alt="' . esc_attr__('Image icon', 'domica') . '"></div>';
        endif;
    ?>
    <?php /*content*/ ?>
    <div class="act-content">
        <?php
            /*title*/
            if($title_link == 'yes'):
                echo '<a class="act-title" ' . esc_attr($attributes) . ' itemprop="name">' . esc_attr($act_title) . '</a>';
            else:
                echo '<h6 class="act-title" ' . esc_attr($attributes) . ' itemprop="name">' . esc_attr($act_title) . '</h6>';
            endif;
        ?>
        <div class="act_des" itemprop="description"><?php echo wp_kses_post($content); ?></div>
    </div>
</div>