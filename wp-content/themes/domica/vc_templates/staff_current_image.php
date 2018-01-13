<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
/*set columns*/
$col = '';
if($staff_per == 1){
    $col = 12;
}
if($staff_count != ''): ?>
    <div class="theme-pastor-current-image staff-col-<?php echo esc_attr($staff_per); ?> <?php echo esc_attr($staff_style); ?>">
        <?php
            /*query*/
            global $post;
            $thumbnail_id = get_post_thumbnail_id($post->ID);
            $query = new WP_Query('post_type=ht-staff&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$staff_count);
            if( $query->have_posts() ):
                while($query->have_posts()): $query->the_post(); 
            ?>
            <div class="pastor-current-image">
                <?php if(!empty($thumbnail_id)): ?>
                    <?php echo wp_get_attachment_image($thumbnail_id, 'large'); ?>
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