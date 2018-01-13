<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
/*set columns*/
$col = '';
if($sermon_per == 1){
    $col = 12;
}elseif($sermon_per == 2){
    $col = 6;
}elseif ($sermon_per == 3) {
    $col = 4;
}elseif ($sermon_per == 4) {
    $col = 3;
}
if($sermon_count != ''): ?>
    <div class="theme-sermon-item flw  sermon-col-<?php echo esc_attr($sermon_per); ?> <?php echo esc_attr($sermon_style);?>">
        <?php
            /*query*/
            global $post;
            $query = new WP_Query('post_type=ht-sermon&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$sermon_count);

            if( $query->have_posts() ):
                while($query->have_posts()): $query->the_post(); 
                /*add sermon des*/
                $sm_des = (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'sermon_description')) ? (fw_get_db_post_option($post->ID, 'sermon_description')) : '';
               
                /*add sermon video link*/
                $sm_video_link = (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'sermon_video_link')) ? (fw_get_db_post_option($post->ID, 'sermon_video_link')) : '';

               
                /*add sermon audio link*/
                $sm_audio_link = (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'sermon_audio_link')) ? (fw_get_db_post_option($post->ID, 'sermon_audio_link')) : '';

                /*add sermon pdf link*/
                $sm_pdf_link= (function_exists('fw_get_db_post_option') && fw_get_db_post_option($post->ID, 'sermon_pdf_link')) ? (fw_get_db_post_option($post->ID, 'sermon_pdf_link')) : '';
                /*post thumbnail*/
                /*thumbnail id*/
                $thumbnail_id = get_post_thumbnail_id($post->ID);

            ?>
           <div class="sermon-item">
                <!--sermon style 1-->
                <?php if($sermon_style == 'sermon-style-1' || $sermon_style == 'sermon-carousel-style' ): ?>
                    <!-- thumbnail -->
                    <?php if(!empty($thumbnail_id)): ?>
                       <div class="sermon-thumb">
                            <a class="sermon-img" href="<?php the_permalink(); ?>">
                                <?php  
                                    echo wp_get_attachment_image($thumbnail_id, 'large' );
                                ?>  
                            </a>
                            <span class="sermon-series"><?php echo domica_sermon_series(); ?></span>
                       </div>
                    <?php endif; ?>
                   <div class="sermon-infor">
                        <div class="sermon-content">
                            <div class="sermon-speaker">
                                <span class="cate"><?php echo domica_sermon_categories() ;?></span>
                                <span class="divider"><?php echo esc_html('-', 'domica'); ?></span>
                                <span class="sermon-author">
                                    <?php 
                                        the_author_posts_link();
                                    ?>
                                </span>
                            </div>
                            <h4 class="sermon-name">
                                <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a> 
                            </h4>
                            <div class="sermon-des">
                               <?php if(!empty($sm_des)): ?>
                                    <p>
                                        <?php echo esc_html($sm_des); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="sermon-links">
                            <div class="play-btn">
                                <?php if(!empty($sm_video_link)) :?>
                                    <span class="sm-video"><a href="<?php echo esc_url($sm_video_link); ?>" class="consult-lightbox-popup ion-ios-play"></a></span>
                                <?php endif;?> 
                                <?php if(!empty($sm_audio_link) && is_array($sm_audio_link)) :?>
                                    <span class="sm-audio"> 
                                        <a href="<?php echo esc_url($sm_audio_link['url']); ?>" class="fancy_audio"><span class="ion-ios-mic"></span></a> 
                                    </span>
                                <?php endif;?> 
                                <?php if(!empty($sm_pdf_link)) :?>
                                    <span class="sm-download ">
                                        <a class="ion-code-download" href="<?php echo esc_url($sm_pdf_link)?>" download></a>
                                    </span>
                                    <span class="sm-pdf">
                                        <a href="<?php echo esc_url($sm_pdf_link)?>" class="ion-ios-paper-outline">
                                        </a>
                                    </span>
                                <?php endif;?> 
                            </div>
                            <a href="<?php the_permalink(); ?>" class="sermon-read-more"><span class="ion-ios-arrow-thin-right"></span></a>
                        </div>
                   </div>
                <!--end of sermon style 1-->
                <!--sermon style 2-->
                <?php elseif($sermon_style == 'sermon-style-2'): ?>
                    <!-- thumbnail -->
                    <?php if(!empty($thumbnail_id)): ?>
                        <a class="sermon-img" href="<?php the_permalink(); ?>">
                            <?php  
                                echo wp_get_attachment_image($thumbnail_id, 'large' );
                            ?>  
                        </a>
                    <?php endif; ?>
                    <div class="sermon-infor">
                        <div class="sermon-content">
                            <div class="sermon-speaker">
                                <span class="cate"><?php echo domica_sermon_categories() ;?></span>
                            </div>
                            <h4 class="sermon-name">
                                <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a> 
                            </h4>
                        </div>
                        <div class="sermon-links">
                            <div class="play-btn">
                                <?php if(!empty($sm_video_link)) :?>
                                    <span class="sm-video"><a href="<?php echo esc_url($sm_video_link); ?>" class="consult-lightbox-popup ion-ios-play"></a></span>
                                <?php endif;?> 
                                <?php if(!empty($sm_audio_link) && is_array($sm_audio_link)) :?>
                                   <span class="sm-audio"> 
                                        <a href="<?php echo esc_url($sm_audio_link['url']); ?>" class="fancy_audio"><span class="ion-ios-mic"></span></a>
                                    </span>
                                <?php endif;?> 
                                <?php if(!empty($sm_pdf_link)) :?>
                                    <span class="sm-download ">
                                        <a class="ion-code-download" href="<?php echo esc_url($sm_pdf_link)?>" download></a>
                                    </span>
                                    <span class="sm-pdf">
                                        <a href="<?php echo esc_url($sm_pdf_link)?>" class="ion-ios-paper-outline">
                                        </a>
                                    </span>
                                <?php endif;?> 
                            </div>
                        </div>
                   </div>
                <!--sermon style 3-->
                <?php elseif($sermon_style == 'sermon-style-3'): ?>
                   <div class="sermon-infor">
                        <span class="sermon-series"><?php echo domica_sermon_series(); ?></span>
                        <div class="sermon-content">
                            <div class="sermon-speaker">
                                <span class="cate"><?php echo domica_sermon_categories() ;?></span>
                                <span class="divider"><?php echo esc_html('-', 'domica'); ?></span>
                                <span class="sermon-author">
                                    <?php 
                                        the_author_posts_link();
                                    ?>
                                </span>
                            </div>
                            <h4 class="sermon-name">
                                <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a> 
                            </h4>
                            <div class="sermon-des">
                               <?php if(!empty($sm_des)): ?>
                                    <p>
                                        <?php echo esc_html($sm_des); ?>
                                    </p>
                                <?php endif; ?> 
                            </div>
                        </div>
                        <div class="sermon-links">
                            <div class="play-btn">
                                <?php if(!empty($sm_video_link)) :?>
                                    <span class="sm-video"><a href="<?php echo esc_url($sm_video_link); ?>" class="consult-lightbox-popup ion-ios-play"></a></span>
                                <?php endif;?> 
                                <?php if(!empty($sm_audio_link) && is_array($sm_audio_link)) :?>
                                   <span class="sm-audio"> 
                                        <a href="<?php echo esc_url($sm_audio_link['url']); ?>" class="fancy_audio"><span class="ion-ios-mic"></span></a>
                                    </span>
                                <?php endif;?> 
                                <?php if(!empty($sm_pdf_link)) :?>
                                    <span class="sm-download ">
                                        <a class="ion-code-download" href="<?php echo esc_url($sm_pdf_link)?>" download></a>
                                    </span>
                                    <span class="sm-pdf">
                                        <a href="<?php echo esc_url($sm_pdf_link)?>" class="ion-ios-paper-outline">
                                        </a>
                                    </span>
                                <?php endif;?> 
                            </div>
                            <a href="<?php the_permalink(); ?>" class="sermon-read-more"><span class="ion-ios-arrow-thin-right"></span></a>
                        </div>
                   </div>
                <!--sermon style 4-->
                <?php elseif($sermon_style == 'sermon-style-4'): ?>
                    <!-- thumbnail -->
                    <?php if(!empty($thumbnail_id)): ?>
                       <div class="sermon-thumb">
                            <div class="sermon-img">
                                <?php  
                                    echo wp_get_attachment_image($thumbnail_id, 'large' );
                                ?>  
                            </div>
                            <span class="sermon-series"><?php echo domica_sermon_series(); ?></span>
                       </div>
                    <?php endif; ?>
                    <div class="sermon-infor">
                        <div class="sermon-content">
                            <h4 class="sermon-name">
                               <?php the_title(); ?>
                            </h4>
                            <div class="sermon-speaker">
                                <span class="divider"><?php echo esc_html('By', 'domica'); ?></span>
                                <span class="sermon-author">
                                    <?php 
                                        the_author_posts_link();
                                    ?>
                                </span>
                            </div>
                            <div class="sermon-des">
                               <?php if(!empty($sm_des)): ?>
                                    <p>
                                        <?php echo esc_html($sm_des); ?>
                                    </p>
                                <?php endif; ?> 
                            </div>
                        </div>
                        <div class="download-btn">
                            <?php if(!empty($sm_pdf_link)) :?>
                                <span class="sm-download ">
                                    <a href="<?php echo esc_url($sm_pdf_link)?>" download class="blog-btn-more"><?php echo esc_html('Download series', 'domica');?></a>
                                </span>
                            <?php endif;?> 
                        </div>
                   </div>
                <!--sermon style 5-->
                <?php elseif($sermon_style == 'sermon-style-5'): ?>
                     <div class="sermon-infor">
                        <div class="sermon-content">
                            <h4 class="sermon-name">
                                <a href="<?php the_permalink(); ?>" class="sv-custom-color"><?php the_title(); ?></a> 
                            </h4>
                        </div>
                        <div class="sermon-links">
                            <div class="play-btn">
                                <?php if(!empty($sm_video_link)) :?>
                                    <span class="sm-video"><a href="<?php echo esc_url($sm_video_link); ?>" class="consult-lightbox-popup ion-ios-play"></a></span>
                                <?php endif;?> 
                                <?php if(!empty($sm_audio_link) && is_array($sm_audio_link)) :?>
                                    <span class="sm-audio"> 
                                        <a href="<?php echo esc_url($sm_audio_link['url']); ?>" class="fancy_audio"><span class="ion-ios-mic"></span></a>
                                    </span>
                                <?php endif;?> 
                                <?php if(!empty($sm_pdf_link)) :?>
                                    <span class="sm-download ">
                                        <a class="ion-code-download" href="<?php echo esc_url($sm_pdf_link)?>" download></a>
                                    </span>
                                    <span class="sm-pdf">
                                        <a href="<?php echo esc_url($sm_pdf_link)?>" class="ion-ios-paper-outline">
                                        </a>
                                    </span>
                                <?php endif;?> 
                            </div>
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