<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$allclass     = $this->getExtraClass( $class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

// TERMS
$all_cats = get_categories('taxonomy=fw-portfolio-category&type=fw-portfolio');
$arr = array();

$number = !empty($case_count) ? $case_count : '-1';
$query = new WP_Query('post_type=fw-portfolio&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$number);
$c_query = $query->posts;


$col = '';
if($case_col == 1){
    $col = 12;
}elseif($case_col == 2){
    $col = 6;
}elseif($case_col == 3){
    $col = 4;
}else{
    $col = 3;
}

$c_css = '';
$line_bg = '';
// if($case_style == 'case-style-2'){
//     $c_css = 'style="background-color:'.$bg_color_2.';color:'.$text_color_2.';"';
//     $line_bg = 'style="background-color:'.$text_color_2.'";';
// }

?>

<div class="consult-case-study-box row <?php echo strlen( $css_class ) > 0 ? ' ' . trim( esc_attr( $css_class ) ) : ''; ?> <?php echo esc_attr( $allclass ); ?>">
    <?php if($case_filter == 'yes'): ?>
    <div class="case-filter flw">
        <?php
            echo '<button class="consult-button is-checked" data-filter="*">ALL</button>';
            foreach($all_cats as $key){
                $term_id = $key->term_id;
                $filters = array();
                foreach ( $c_query as $key) :
                    $post = get_post($key);
                    $taxs = get_the_terms( $post->ID, 'fw-portfolio-category' );
                    $array = '';
                    foreach($taxs as $key){
                        $array = $key->term_id;
                        // Only print if this tax_id belong to one of displaying menu and tax_id is not printed before
                        if ( $array == $term_id && !in_array($array, $filters) ):
                            // Add the tax_id to the array for later check
                            array_push($filters, $array);
                            echo '<button class="consult-button" data-filter=".'.esc_attr($key->slug).'">'.esc_attr($key->name).'</button>';
                        endif;
                    }
                endforeach;
            }
        ?>
    </div>
    <?php endif; ?>
    <div class="case-grid flw">
        <?php
            foreach($c_query as $key):
                $pid = $key->ID;
                $terms = get_the_terms($pid, 'fw-portfolio-category');
                $slug = '';
                if($terms){
                    foreach($terms as $key){
                        $slug .= $key->slug.' ';
                    }
                }
                /* Get post thumbnail id */
                $post_thumbnail_id = get_post_thumbnail_id($pid);

                /* Set thumbnail size in default */
                if($case_col == 1){
                    $post_thumbnail = fw_resize($post_thumbnail_id, 1170, 854, false);
                }elseif($case_col == 2){
                    $post_thumbnail = fw_resize($post_thumbnail_id, 570, 416, false);
                }elseif($case_col == 3){
                    $post_thumbnail = fw_resize($post_thumbnail_id, 370, 270, false);
                }else{
                    $post_thumbnail = fw_resize($post_thumbnail_id, 400, 500, false);
                }
            ?>
            <div class="case-item col-md-<?php echo esc_attr($col).' '.esc_attr($slug); ?>">
                <div class="case-item-inner flw">
                    <img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php esc_attr_e('Case study image', 'domica'); ?>">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>