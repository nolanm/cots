<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class ) . $this->getCSSAnimation( $css_animation );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$final_column = '';
if($style == 'grid'){
    $final_column = 'theme-col-' . $column;
}

if(empty($color1)) $color1 = '#015cff';
if(empty($color2)) $color2 = '#b50dfe';
if(empty($text_content)) $text_content = 'rgba(255,255,255,0.35)';

$name_tes = 'style="color: ' . $color1 . '"';
$pos_tes = 'style="color: ' . $color2 . '"';
$text_tes = 'style="color: ' . $text_content . '"';

if($count != ''): ?>
    <div class="theme-testi testi-style-<?php echo esc_attr($style . ' ' . $final_column ); ?><?php echo esc_attr($all_class); ?>">
        <?php
            /*query*/
            global $post;
            $query = new WP_Query('post_type=ht-testimonial&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$count);
            if( $query->have_posts() ):
                while($query->have_posts()): $query->the_post();
                /*data*/
                $name = fw_get_db_post_option($post->ID, 'name');
                $position = fw_get_db_post_option($post->ID, 'position');
                $thumbnail = get_the_post_thumbnail_url();
        ?>
        <div class="theme-testi-item theme-col-item" itemscope itemtype="http://schema.org/Person">
            <?php if($style == 'carousel'): ?>
            <div class="testi-content" <?php echo wp_kses_post($text_tes); ?> itemprop="description"><?php the_content(); ?></div>
            <?php endif; ?>
            <div class="testi-user">
                <?php if($thumbnail != ''): ?>
                <div class="testi-border">
                    <?php /*start*/ ?>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100%" viewBox="-5 -5 210 210">
                    <defs>
                        <linearGradient id="colour-<?php echo esc_attr($post->ID); ?>" gradientUnits="objectBoundingBox" x1="0" y1="1" x2="1" y2="1">
                            <stop offset="0%" stop-color="<?php echo esc_attr($color1); ?>"/>   
                            <stop offset="100%" stop-color="<?php echo esc_attr($color2); ?>"/>   
                        </linearGradient>
                    </defs>

                    <g fill="none" stroke-width="5" transform="translate(100,100)">
                        <path d="M 0 -100 a 100 100 0 1 0 0.00001 0" stroke="url(#colour-<?php echo esc_attr($post->ID); ?>)"/>
                    </g>
                    </svg>
                    <?php /*end*/ ?>
                    <div class="testi-img"><img src="<?php echo esc_url($thumbnail); ?>" itemprop="image" alt="<?php esc_attr_e( 'Testi image', 'domica' ); ?>"></div>
                </div>
                <?php endif; ?>
                <div class="testi-name">
                    <strong itemprop="name"><?php echo esc_html($name); ?></strong>
                    <span  itemprop="jobTitle"><?php echo esc_html($position); ?></span>
                </div>
            </div>
            <?php if($style == 'grid'): ?>
            <div class="testi-content" <?php echo wp_kses_post($text_tes); ?> itemprop="description"><?php the_content(); ?></div>
            <?php endif; ?>
        </div>
        <?php
            endwhile;
            endif;
            /*reset query*/
            wp_reset_postdata();
        ?>
    </div>
<?php endif; ?>