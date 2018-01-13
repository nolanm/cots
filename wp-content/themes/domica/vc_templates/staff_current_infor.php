<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
/*set columns*/
$col = '';
if($staff_per == 1){
    $col = 12;
}
if($staff_count != ''): ?>
    <div class="theme-pastor-current-infor staff-col-<?php echo esc_attr($staff_per); ?> <?php echo esc_attr($staff_style); ?>">
        <?php
            /*query*/
            global $post;
            $query = new WP_Query('post_type=ht-staff&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$staff_count);
            if( $query->have_posts() ):
                while($query->have_posts()): $query->the_post(); 
            ?>
            <div class="pastor-current-infor">
                <h2> <?php echo single_post_title(); ?></h2>
            </div> 
            <?php 
        endwhile;
        endif;
        /*reset query*/
        wp_reset_postdata();
        ?>
   </div>
<?php endif; ?>