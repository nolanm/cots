<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
/*set columns*/
$col = '';
if($staff_per == 3){
    $col = 4;
}elseif($staff_per == 4){
    $col = 3;
}

if($staff_count != ''): ?>
    <div class="theme-staff-item flw  staff-col-<?php echo esc_attr($staff_per); ?> <?php echo esc_attr($staff_style);?>">
        <?php
            /*query*/
            global $post;
            $query = new WP_Query('post_type=ht-staff&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$staff_count);

            if( $query->have_posts() ):
                while($query->have_posts()): $query->the_post();
                /*add position*/
                $staff_position = (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'position')) ? (fw_get_db_post_option($post->ID, 'position')) : '';
                /*add description*/
                $staff_des = (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'description')) ? (fw_get_db_post_option($post->ID, 'description')) : '';
                /*add facebook link*/
                $staff_fb_link= (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'fb_link')) ? (fw_get_db_post_option($post->ID, 'fb_link')) : '';
                /*add twitter link*/
                $staff_tw_link= (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'tw_link')) ? (fw_get_db_post_option($post->ID, 'tw_link')) : '';
                /*post thumbnail*/
                /*thumbnail id*/
                $thumbnail_id = get_post_thumbnail_id($post->ID);
            ?>
           <div class="staff-item">
                <!--staff style 1-->
                <?php if($staff_style == 'staff-style-1' || $staff_style == 'staff-carousel-style' ): ?>
                    <!-- thumbnail -->
                    <?php if(!empty($thumbnail_id)): ?>
                        <a class="staff-img" href="<?php the_permalink(); ?>">
                            <?php  
                                echo wp_get_attachment_image($thumbnail_id, 'large' );
                            ?>  
                           
                        </a>
                    <?php endif; ?>
                   <div class="staff-infor">
                        <h4 class="staff-name">
                            <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a> 
                        </h4>
                        <div class="staff-pos">
                            <?php if(!empty($staff_position)): ?>
                                <span>
                                    <?php echo esc_html($staff_position); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="staff-social-links">
                            <?php if(!empty($staff_fb_link)): ?>
                                <a href=" <?php echo esc_url($staff_fb_link); ?>"><i class="ion-social-facebook"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($staff_tw_link)): ?>
                                <a href=" <?php echo esc_url($staff_tw_link); ?>"><i class="ion-social-twitter"></i></a>
                            <?php endif; ?>
                        </div>
                   </div>
                <!--end of staff style 1-->
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