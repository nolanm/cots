<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class ) . $this->getCSSAnimation( $css_animation );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
/*set columns*/
$col = '';
if($service_per == 1){
    $col = 12;
}elseif($service_per == 2){
    $col = 6;
}elseif($service_per == 3){
    $col = 4;
}else{
    $col = 3;
}

$uid = '';
if(!empty($color)){
    $uid = uniqid('sc-id-');
    echo '<style type="text/css">';
    echo '.theme-services.' . esc_attr($uid) . ' .sv-custom-color{color: ' . esc_attr($color) . '}';
    echo '</style>';
}
if($service_count != ''): ?>
    <div class="theme-service-item consult-service-carousel flw  service-col-<?php echo esc_attr($service_per); ?> <?php echo esc_attr($service_style); ?>  <?php echo esc_attr($uid); ?><?php echo esc_attr($all_class); ?>">
        <?php
            /*query*/
            global $post;
            $query = new WP_Query('post_type=ht-service&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$service_count);
            if( $query->have_posts() ):
                while($query->have_posts()): $query->the_post();
                /*add icon*/
                $icon = (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'consult_icon')) ? (fw_get_db_post_option($post->ID, 'consult_icon')) : '';
                $type = isset($icon['type']) ? $icon['type'] : '';
                /*add sub title*/
                $subtitle = (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'consult_subtitle')) ? (fw_get_db_post_option($post->ID, 'consult_subtitle')) : '';
                /*add price*/
                $price = (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'consult_price')) ? (fw_get_db_post_option($post->ID, 'consult_price')) : '';
                /*add schedule*/
                $schedule = (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'consult_schedule')) ? (fw_get_db_post_option($post->ID, 'consult_schedule')) : '';
                /*add schedule 2*/

                /*add schedule*/
                $daynumber = (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'consult_dayNumber')) ? (fw_get_db_post_option($post->ID, 'consult_dayNumber')) : '';
                $schedule2 = (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'consult_schedule2')) ? (fw_get_db_post_option($post->ID, 'consult_schedule2')) : '';

                /*thumbnail id*/
                $thumbnail_id = get_post_thumbnail_id($post->ID);
              
                if($service_per == 1 && $service_style == 'consult-service-style-5'){
                    /*col 12*/
                    $thumbnail = wp_get_attachment_image($thumbnail_id, 'medium' );
                }
                elseif ($service_per == 1 && $service_style == 'consult-service-style-6') {
                   $thumbnail = wp_get_attachment_image($thumbnail_id, 'thumbnail' );
                }
                elseif ($service_per == 2) {
                    /*col 6*/
                    $thumbnail = wp_get_attachment_image($thumbnail_id, 'large' );
                }
                elseif ($service_per == 3 && $service_style !== 'consult-service-style-4') {
                    /*col 4*/
                    $thumbnail = wp_get_attachment_image($thumbnail_id, 'large' );
                }
                elseif ($service_per == 3 && $service_style == 'consult-service-style-4') {
                    /*col 4*/
                    $thumbnail = wp_get_attachment_image($thumbnail_id, array(300,300) );
                }
                elseif ($service_per == 4) {
                    /*col 3*/
                    $thumbnail = wp_get_attachment_image($thumbnail_id, 'medium' );
                }
                else{
                    $thumbnail = wp_get_attachment_image($thumbnail_id, 'thumbnail' );
                }
        ?>
           <div class="sbc-item">
                <!--service style 1-->
                <?php if($service_style == 'consult-service-style-1'): ?>
                    <!-- thumbnail -->
                    <?php if(!empty($thumbnail_id)): ?>
                        <a class="sc-service-img" href="<?php the_permalink(); ?>">
                            <?php  
                                echo wp_kses($thumbnail,array(
                                     'img' => 'src'
                                 ));
                            ?>  
                        </a>
                    <?php endif; ?>
                   <div class="service-infor">
                        <div class="sbc-head">
                            <?php if(!empty($subtitle)): ?>
                                <p>
                                    <?php echo esc_html($subtitle); ?>
                                </p>
                            <?php endif; ?>
                            <?php if(!empty($price)): ?>
                                <span>
                                    <?php echo esc_html($price); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <h4 class="sc-service-title">
                            <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a>
                        </h4>
                   </div>
             
                <!--end of service style 1-->
                <!--service style 2-->
                <?php elseif($service_style == 'consult-service-style-2'): ?>
                    <!-- thumbnail -->
                    <?php if(!empty($thumbnail_id)): ?>
                         <a class="sc-service-img" href="<?php the_permalink(); ?>">
                            <?php  
                                echo wp_kses($thumbnail,array(
                                    'img' => 'src'
                                ));
                            ?> 
                        </a>
                    <?php endif; ?>
                    <div class="service-infor">
                        <div class="sbc-head">
                            <?php if(!empty($subtitle)): ?>
                                <p>
                                    <?php echo esc_html($subtitle); ?>
                                </p>
                            <?php endif; ?>
                            <?php if(!empty($price)): ?>
                                <span>
                                    <?php echo esc_html($price); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <h4 class="sc-service-title">
                            <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a>
                        </h4>
                    </div>
               
                <!--end of service style 2-->
                <!--service style 3-->
                <?php elseif($service_style == 'consult-service-style-3'): ?>
                        <!-- thumbnail -->
                        <?php if(!empty($thumbnail_id)): ?>
                            <a class="sc-service-img" href="<?php the_permalink(); ?>">
                                <?php  
                                    echo wp_kses($thumbnail,array(
                                        'img' => 'src'
                                    ));
                                ?>
                            </a>
                        <?php endif; ?>
                        <div class="service-infor">
                            <div class="sbc-head">
                                <?php if(!empty($subtitle)): ?>
                                    <p>
                                        <?php echo esc_html($subtitle); ?>
                                    </p>
                                <?php endif; ?>
                                <?php if(!empty($price)): ?>
                                    <span>
                                        <?php echo esc_html($price); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <h4 class="sc-service-title">
                                <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a>
                            </h4>
                            <p class="description" itemprop="description"><?php echo health_guide_excerpt(20); ?></p>
                            <a href="<?php the_permalink(); ?>" class="sv-custom-color sc-service-read-more"><?php esc_html_e('Show detail', 'domica'); ?></a>
                        </div>
                    
                <!--end of service style 3-->
                <!--service style 4-->
                <?php elseif($service_style == 'consult-service-style-4'): ?>
                        <!-- thumbnail -->
                        <?php if(!empty($thumbnail_id)): ?>
                            <div class="round-thum">
                                <a class="sc-service-img" href="<?php the_permalink(); ?>">
                                    <?php  
                                        echo wp_kses($thumbnail,array(
                                            'img' => 'src'
                                        ));
                                    ?>
                                </a>
                                <div class="sbc-head">
                                    <?php if(!empty($icon)): ?>
                                        <div class="sbc-icon">
                                            <?php if($type == 'icon-font'): ?>
                                                <span class="<?php echo esc_attr($icon['icon-class']); ?>"></span>
                                            <?php else: ?>
                                                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php esc_attr_e('Service Icon', 'domica'); ?>">
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                       <div class="service-infor">
                        
                            <h4 class="sc-service-title">
                                <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a>
                            </h4>
                       </div>
                  
                <!--end of service style 4-->
                <!--service style 5-->
                <?php elseif($service_style == 'consult-service-style-5'): ?>
                        <!-- thumbnail -->
                        <?php if(!empty($thumbnail_id)): ?>
                            <a class="sc-service-img" href="<?php the_permalink(); ?>"><?php  echo  $thumbnail; ?></a>
                        <?php endif; ?>
                        <div class="service-infor">
                            <div class="sbc-head">
                                <?php if(!empty($price)): ?>
                                    <span class="price">
                                        <?php echo esc_html($price); ?>
                                    </span>
                                <?php endif; ?>
                                <?php if(!empty($schedule)): ?>
                                    <span>
                                        <?php echo esc_html($schedule); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <h4 class="sc-service-title">
                                <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a>
                            </h4>
                            <p class="description" itemprop="description"><?php echo health_guide_excerpt(20); ?></p>
                            <a href="<?php the_permalink(); ?>" class="sv-custom-color sc-service-read-more"><?php esc_html_e('More infor', 'domica'); ?></a>
                        </div>
                <!--end of service style 5-->
                <!--service style 6-->
                <?php elseif($service_style == 'consult-service-style-6'): ?>
                        <!-- thumbnail -->
                        <?php if(!empty($thumbnail_id)): ?>
                            <a class="sc-service-img" href="<?php the_permalink(); ?>">
                                <?php  
                                    echo wp_kses($thumbnail,array(
                                        'img' => 'src'
                                    ));
                                ?>
                            </a>
                        <?php endif; ?>
                         <div class="service-infor">
                            
                            <h4 class="sc-service-title">
                                <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a>
                            </h4>
                            <p class="description" itemprop="description"><?php echo health_guide_excerpt(20); ?></p>
                            <div class="flex-child">
                                <div class="sbc-head">
                                    <?php if(!empty($price)): ?>
                                        <span class="price">
                                            <?php echo esc_html($price); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if(!empty($schedule)): ?>
                                        <span>
                                            <?php echo esc_html($schedule); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                               
                                <a href="<?php the_permalink(); ?>" class="sv-custom-color sc-service-read-more"><?php esc_html_e('More infor', 'domica'); ?></a>
                            </div>
                        </div>
                <!--end of service style 6-->
                <!--service style 7-->
                <?php elseif($service_style == 'consult-service-style-7'): ?>
                        <!-- thumbnail -->
                        <?php if(!empty($thumbnail_id)): ?>
                            <a class="sc-service-img" href="<?php the_permalink(); ?>">
                                <?php  
                                    echo wp_kses($thumbnail,array(
                                        'img' => 'src'
                                    ));
                                ?>
                            </a>
                        <?php endif; ?>
                       
                        <div class="service-infor">
                            <h4 class="sc-service-title">
                                <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a>
                            </h4>
                            <div class="flex-child">
                                <div class="sbc-head">
                                    <?php if(!empty($daynumber)): ?>
                                        <span class="price">
                                            <?php echo esc_html($daynumber); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if(!empty($schedule2)): ?>
                                        <span>
                                            <?php echo esc_html($schedule2); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <p class="description" itemprop="description"><?php echo health_guide_excerpt(20); ?></p>
                                
                            </div>
                        </div>
                <!--end of service style 7-->
                <?php elseif($service_style == 'consult-service-style-7-carousel'): ?>
                        <!-- thumbnail -->
                        <?php if(!empty($thumbnail_id)): ?>
                             <a class="sc-service-img" href="<?php the_permalink(); ?>">
                                <?php  
                                    echo wp_kses($thumbnail,array(
                                        'img' => 'src'
                                    ));
                                ?>  
                            </a>
                        <?php endif; ?>
                       
                        <div class="service-infor">
                            <h4 class="sc-service-title">
                                <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a>
                            </h4>
                            <div class="flex-child">
                                <div class="sbc-head">
                                    <?php if(!empty($daynumber)): ?>
                                        <span class="price">
                                            <?php echo esc_html($daynumber); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if(!empty($schedule2)): ?>
                                        <span>
                                            <?php echo esc_html($schedule2); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <p class="description" itemprop="description"><?php echo health_guide_excerpt(20); ?></p>
                                
                            </div>
                        </div>
                <?php endif; ?>
              
           </div>
        <!-- </div> -->
        <?php
        endwhile;
        endif;
        /*reset query*/
        wp_reset_postdata();
        ?>
    </div>
<?php endif; ?>