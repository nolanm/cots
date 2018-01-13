<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
/*set columns*/
$col = '';
if($event_per == 1){
    $col = 12;
}
if($event_count != ''): ?>
    <div class="theme-event-oragnizer event-col-<?php echo esc_attr($event_per); ?> <?php echo esc_attr($event_style); ?>">
        <?php
            /*query*/
            global $post;
            $query = new WP_Query('post_type=tribe_events&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$event_count);
            /*socail links custom post type*/
            $postID = get_the_ID();
            $event_organizer_detail = tribe_get_organizer_details($postID);
            $event_organizer_name = tribe_get_organizer($postID);
            if( $query->have_posts() ):
                while($query->have_posts()): $query->the_post(); 
            ?>
                <div class="event-organizer-infor">
                        <?php if(!empty($event_organizer_name)): ?>
                            <div class="event-organizer-name organizer-item">
                                <span class="ion-ios-person-outline or-icon"></span>
                                <div class="organizer-item-infor">
                                    <h6><?php echo esc_html__('Pastor', 'domica'); ?></h6>
                                    <span><?php echo $event_organizer_name ;?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($event_organizer_detail)): ?>
                            <div class="event-organizer-phone organizer-item">
                                <span class="ion-ios-telephone-outline or-icon"></span>
                                <div class="organizer-item-infor">
                                    <h6><?php echo esc_html__('Phone', 'domica'); ?></h6>
                                   <span><?php echo $event_organizer_detail;?></span>
                                </div>
                            </div>
                            <div class="event-organizer-email organizer-item">
                                <span class="ion-ios-email-outline or-icon"></span>
                                <div class="organizer-item-infor">
                                    <h6><?php echo esc_html__('Email', 'domica'); ?></h6>
                                    <span><?php echo $event_organizer_detail;?></span>
                                </div>
                            </div>
                            <div class="event-organizer-website organizer-item">
                                <span class="ion-ios-world-outline or-icon"></span>
                                <div class="organizer-item-infor">
                                    <h6><?php echo esc_html__('Website', 'domica'); ?></h6>
                                    <span><?php echo $event_organizer_detail;?></span>
                                </div>
                            </div>
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