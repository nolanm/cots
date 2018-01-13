<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
/*set columns*/
$col = '';
if($event_per == 1){
    $col = 12;
}
if($event_count != ''): ?>
    <div class="theme-event-current-item event-col-<?php echo esc_attr($event_per); ?> <?php echo esc_attr($event_style); ?>">
        <?php
            /*query*/
            global $post;
            $query = new WP_Query('post_type=tribe_events&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$event_count);
            /*socail links custom post type*/
            $postID = get_the_ID();
            $permalink  = urlencode( get_the_permalink() );
            $title      = urlencode( get_the_title() );
            if( $query->have_posts() ):
                while($query->have_posts()): $query->the_post(); 
            ?>
            <div class="event-current-item">
                <?php if($event_style == 'event-current-item-style-1'): ?>
                    <div class="event-infor">
                        <?php echo domica_custom_tribe_event_dateformat($postID); ?>  
                        <div class="event-infor-group">
                            <div class="event-infor-detail">
                                <h4 class="event-title">
                                    <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php echo get_the_title($postID); ?></a> 
                                </h4>
                                <div class="event-location">
                                    <span class="ev-tit"><?php echo esc_html__('Location:', 'domica') ;?></span>
                                    <span><?php echo tribe_get_address($postID); ?></span>
                                </div>
                                <div class="event-date">
                                    <span class="ev-tit"><?php echo esc_html__('Date:', 'domica') ;?></span>
                                    <span><?php echo tribe_get_start_date($postID,true, 'M d, Y @ G:ia', null);?></span> 
                                </div>
                            </div>
                            <div class="flex-parent-items">
                                <a href="<?php the_permalink(); ?>" class="event-register"><?php esc_html_e('Register', 'domica'); ?></a>
                                <div class="social-share-btn">
                                    <span class="ion-android-share-alt"></span>
                                    <div class="group-btn">
                                        <div class="event-social-links">
                                            <span class="fb-share">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr($permalink) ?>" target="_blank" class="icon ion-social-facebook"></a>
                                            </span>
                                            <span class="tw-share">
                                                <a href="http://twitter.com/home?status=<?php echo esc_attr($title) ?>%20<?php echo esc_attr($permalink) ?>" target="_blank" class="icon ion-social-twitter"></a>
                                                <a href="https://twitter.com/share?text=Instagram%20Blog&url=http://blog.instagram.com/post/164717323080/170826-sza&hashtags=instagram&via=instagram"></a>
                                            </span>
                                            <span class="mail-share">
                                                <a href="mailto:?subject=Check this post - <?php echo esc_attr($title) ?> &amp;body= <?php echo esc_attr($permalink) ?>&amp;title="<?php echo esc_attr($title) ?>" email"="" class="ion-ios-email"></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif($event_style == 'event-current-item-style-2'): ?>
                    <div class="event-infor">
                        <div class="event-infor-group">
                            <div class="flex-parent-items">
                                <a href="<?php the_permalink(); ?>" class="event-register"><?php esc_html_e('Register', 'domica'); ?></a>
                                <div class="social-share-btn">
                                    <span class="ion-android-share-alt"></span>
                                    <div class="group-btn">
                                        <div class="event-social-links">
                                            <span class="fb-share">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr($permalink) ?>" target="_blank" class="icon ion-social-facebook"></a>
                                            </span>
                                            <span class="tw-share">
                                                <a href="http://twitter.com/home?status=<?php echo esc_attr($title) ?>%20<?php echo esc_attr($permalink) ?>" target="_blank" class="icon ion-social-twitter"></a>
                                                <a href="https://twitter.com/share?text=Instagram%20Blog&url=http://blog.instagram.com/post/164717323080/170826-sza&hashtags=instagram&via=instagram"></a>
                                            </span>
                                            <span class="mail-share">
                                                <a href="mailto:?subject=Check this post - <?php echo esc_attr($title) ?> &amp;body= <?php echo esc_attr($permalink) ?>&amp;title="<?php echo esc_attr($title) ?>" email"="" class="ion-ios-email"></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </div> 
            <?php 
        endwhile;
        endif;
        /*reset query*/
        wp_reset_postdata();
        ?>
   </div>
<?php endif; ?>