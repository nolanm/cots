<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
/*set columns*/
$col = '';
if($staff_per == 1){
    $col = 12;
}
if($staff_count != ''): ?>
    <div class="theme-pastor-social staff-col-<?php echo esc_attr($staff_per); ?> <?php echo esc_attr($staff_style); ?>">
        <?php
            /*query*/
            global $post;
            $query = new WP_Query('post_type=ht-staff&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$staff_count);
            $social_title = (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'social_title')) ? (fw_get_db_post_option($post->ID, 'social_title')) : '';
            /*add facebook link*/
            $staff_fb_link= (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'fb_link')) ? (fw_get_db_post_option($post->ID, 'fb_link')) : '';
            /*add twitter link*/
            $staff_tw_link= (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'tw_link')) ? (fw_get_db_post_option($post->ID, 'tw_link')) : '';
             /*add instagram link*/
             $staff_ins_link= (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'instagram_link')) ? (fw_get_db_post_option($post->ID, 'instagram_link')) : '';
             /*add youtube link*/
             $staff_yt_link= (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'youtube_link')) ? (fw_get_db_post_option($post->ID, 'youtube_link')) : '';
            if( $query->have_posts() ):
                while($query->have_posts()): $query->the_post(); 
            ?>
            <div class="pastor-current-social">
                <?php if(!empty($social_title)): ?>
                    <span><?php esc_html_e($social_title); ?></span>
                <?php endif; ?>
                <?php if(!empty($staff_fb_link)): ?>
                    <a href=" <?php echo esc_url($staff_fb_link); ?>"><i class="ion-social-facebook"></i></a>
                <?php endif; ?>
                <?php if(!empty($staff_tw_link)): ?>
                    <a href=" <?php echo esc_url($staff_tw_link); ?>"><i class="ion-social-twitter"></i></a>
                <?php endif; ?>
                <?php if(!empty($staff_ins_link)): ?>
                    <a href=" <?php echo esc_url($staff_ins_link); ?>"><i class="ion-social-instagram-outline"></i></a>
                <?php endif; ?>
                <?php if(!empty($staff_yt_link)): ?>
                    <a href=" <?php echo esc_url($staff_yt_link); ?>"><i class="ion-social-youtube-outline"></i></a>
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