<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class ) . $this->getCSSAnimation( $css_animation );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$all_cats = get_categories('taxonomy=fw-portfolio-category&type=fw-portfolio');
$arr = array();

$number = !empty($stories_count) ? $stories_count : '-1';
$query = new WP_Query('post_type=fw-portfolio&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$number);
$stories_query = $query->posts;

/*set columns*/
$col = '';
if($stories_per == 1){
    $col = 12;
}elseif($stories_per == 2){
    $col = 6;
}elseif($stories_per == 3){
    $col = 4;
}else{
    $col = 3;
}

$c_css = 'style="color:'.$text_color.';"';

if($stories_count != ''): ?>

<div class="consult-stories-box row <?php echo strlen( $css_class ) > 0 ? ' ' . trim( esc_attr( $css_class ) ) : ''; ?> <?php echo esc_attr( $allclass ); ?>">
    <div class="stories-grid flw">
        <?php
            foreach($stories_query as $key):
                $pid = $key->ID;
                /* Get post thumbnail id */
                $post_thumbnail_id = get_post_thumbnail_id($pid);
                /* Set thumbnail size in default */
                if($stories_per == 1){
                    $post_thumbnail = fw_resize($post_thumbnail_id, 1170, 854, false);
                }elseif($stories_per == 2){
                    $post_thumbnail = fw_resize($post_thumbnail_id, 570, 416, false);
                }elseif($stories_per == 3){
                    $post_thumbnail = fw_resize($post_thumbnail_id, 370, 270, false);
                }else{
                    $post_thumbnail = fw_resize($post_thumbnail_id, 270, 197, false);
                }
                $stories_subtitle = fw_get_db_post_option($pid, 'subtilte_text');
            ?>
            <div class="stories-item col-md-<?php echo esc_attr($col); ?>">
                <div class="stories-item-inner flw">
                    <div class="stories-thumbnail">
                    <a href="<?php echo get_the_permalink($pid); ?>">
                        <img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php esc_attr_e('stories study image', 'domica'); ?>">
                    </a>
                    </div>
                    <div class="stories-info">
                        <h4><a class="stories-title" <?php echo wp_kses_post($c_css); ?> href="<?php echo get_the_permalink($pid); ?>" title="<?php echo get_the_title($pid); ?>"><?php echo get_the_title($pid); ?></a></h4>
                        <p class="subtitle"><?php echo esc_html($stories_subtitle); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php endif; ?>