<?php
/*
Template Name: Home 3
*/
get_header();
$home_id = get_the_ID();
$pageOptions = imic_page_design('',8); //page design options
/* Start Hero Slider */
get_template_part('flex-slider');
/* End Hero Slider */
?>
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <?php
            /** Upcoming Events Loop ** */
            $imic_recent_events_area = get_post_meta($home_id, 'imic_imic_upcoming_events', true);
            if ($imic_recent_events_area == 1) {
                $temp_wp_query = clone $wp_query;
                $today = date('Y-m-d');
                $currentTime = date(get_option('time_format'));
                $upcomingEvents = '';
                $upcoming_events_category = get_post_meta(get_the_ID(),'imic_upcoming_event_taxonomy',true);
if(!empty($upcoming_events_category)){
$events_categories= get_term_by('id',$upcoming_events_category,'event-category');
$upcoming_events_category= $events_categories->slug; }
                $imic_events_to_show_on = get_post_meta(get_the_ID(), 'imic_events_to_show_on', true);
                $imic_events_to_show_on = !empty($imic_events_to_show_on) ? $imic_events_to_show_on : 4;
                query_posts(array('post_type' => 'event', 'event-category' => $upcoming_events_category,'meta_key' => 'imic_event_start_dt', 'meta_query' => array(array('key' => 'imic_event_frequency_end', 'value' => $today, 'compare' => '>=')), 'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page' => -1));
                $event_add = array();
                $sinc = 1;
                if (have_posts()):
                    while (have_posts()):the_post();
                        $eventDate = strtotime(get_post_meta(get_the_ID(), 'imic_event_start_dt', true));
                        $eventTime = get_post_meta(get_the_ID(), 'imic_event_start_tm', true);
                        if ($eventTime == '') {
                            $eventTime = "";
                        }
                        $eventTime = strtotime($eventTime);
                        if ($eventTime != '') {
                            $eventTime = date('h:i A', $eventTime);
                        }
                        $frequency = get_post_meta(get_the_ID(), 'imic_event_frequency', true);
                        $frequency_count = '';
                        $frequency_count = get_post_meta(get_the_ID(), 'imic_event_frequency_count', true);
                        if ($frequency > 0) {
                            $frequency_count = $frequency_count;
                        } else {
                            $frequency_count = 0;
                        }
                        $seconds = $frequency * 86400;
                        $fr_repeat = 0;
                        while ($fr_repeat <= $frequency_count) {
                            $eventDate = get_post_meta(get_the_ID(), 'imic_event_start_dt', true);
                            $eventTime = get_post_meta(get_the_ID(), 'imic_event_start_tm', true);
				$eventTime = ($eventTime!='')?$eventTime:'23:59';
            $eventDate = strtotime($eventDate.' '.$eventTime);
                            if ($frequency == 30) {
                                $eventDate = strtotime("+" . $fr_repeat . " month", $eventDate);
                                $eventDate = date('Y-m-d', $eventDate);
                                $eventDate = $eventDate . ' ' . $eventTime;
                                $eventDate = strtotime($eventDate);
                            } else {
                                $new_date = $seconds * $fr_repeat;
                                $eventDate = $eventDate + $new_date;
                                $eventDate = date('Y-m-d', $eventDate);
                                $eventDate = $eventDate . ' ' . $eventTime;
                                $eventDate = strtotime($eventDate);
                            }
                            $date_sec = date('Y-m-d', $eventDate);
                            $exact_time = strtotime($date_sec . ' ' . $eventTime);
                            if ($exact_time >= date('U')) {
                                $event_add[$eventDate + $sinc] = get_the_ID();
                                $sinc++;
                            } $fr_repeat++;
                        }
                    endwhile;
                     endif;
                    $nos_event = 1;
                   $google_events = getGoogleEvent();
                   $new_events = $google_events+$event_add;
                   ksort($new_events);
                   if(!empty($new_events)){
                   foreach ($new_events as $key => $value) {
                       if(preg_match('/^[0-9]+$/',$value)){
                        $eventTime = get_post_meta($value, 'imic_event_start_tm', true);
                        $eventEndTime = get_post_meta($value, 'imic_event_end_tm', true);
                        $eventTime = strtotime($eventTime);
                        $eventEndTime = strtotime($eventEndTime);
                        if ($eventTime != '') {
                            $eventTime = date_i18n(get_option('time_format'), $eventTime);
                        }
                        if ($eventEndTime != '') {
                            $eventEndTime = date_i18n(get_option('time_format'), $eventEndTime);
                        }
                        $stime = '';
                        $setime = '';
                        if ($eventTime != '') {
                            $stime = ' | ' . $eventTime;
                            $setime = $eventTime;
                        }
                        $etime = '';
                        if ($eventEndTime != '') {
                            $etime = ' - ' . $eventEndTime;
                        }
                        $date_converted = date('Y-m-d', $key);
                        $custom_event_url =imic_query_arg($date_converted,$value);  
                       $google_events_flag=1;
                       $event_title=get_the_title($value);
                        }
                         else{
                             $google_events_flag =2;
        $google_data =(explode('!',$value)); 
            $event_title=$google_data[0];
           $custom_event_url=$google_data[1];
           $stime = '';
                        $setime = '';
                        if ($key != '') {
                            $stime = ' | ' . date(get_option('time_format'), $key);
                            $setime = date(get_option('time_format'), $key);
                        }
                         $etime=$google_data[2];
                        if($etime!='') { $etime =  ' - '. date_i18n(get_option('time_format'),strtotime($etime)); }    
     }
                        $upcomingEvents .='<li class="col-md-3 format-standard">
                    		<div class="grid-item-inner">';
                        if($google_events_flag==1){
                        $thumb_id = get_post_thumbnail_id($value);
                        if (!empty($thumb_id)):
                            $upcomingEvents .='<a href="' . $custom_event_url . '" class="media-box">' . get_the_post_thumbnail($value, '600x400') . '</a>';
                        endif;
                        }
                        $upcomingEvents .='<div class="grid-content">';
                        if($google_events_flag==1){
                        $e_term = get_the_terms($value,'event-category');
                         $term_link='';
                        if (!empty($e_term)) {
                              $pages_e = get_pages(array(
                              'meta_key' => '_wp_page_template',
                              'meta_value' => 'template-event-category.php'
                            ));
                        $imic_event_category_page_url=!empty($pages_e[0]->ID)?get_permalink($pages_e[0]->ID):'';
                                        $i = 1;
                                        foreach ($e_term as $terms) {
                                            if ($i == 1) {
                                                if(!empty($imic_event_category_page_url)){
                                                $term_link=imic_query_arg_event_cat($terms->slug,$imic_event_category_page_url);
                                                $term_link='<a href="' . $term_link . '">' .$terms->name. '</a>';
                                            }}
                                            $i++;
                                        }}
                           if(!empty($term_link)){
                                        $upcomingEvents .='<div class="label label-primary event-cat">' .$term_link .'</div>';
                                        }
                        }
                       $upcomingEvents .='<h5><a href="' . $custom_event_url . '">' .$event_title . '</a>'.imicRecurrenceIcon($value).'</h5>                       
                        			<span class="meta-data"><i class="fa fa-calendar"></i>' . date_i18n('l', $key) . $stime . $etime . '</span>';
                                 $upcomingEvents .='</div>';
                    		$upcomingEvents .='</div></li>';
                       
                        if (++$nos_event > $imic_events_to_show_on)
                            break;
                    }
            }
               else{
                    $no_upcoming_events_msg = '<h2>' . __('No Upcoming Events Found', 'framework') . '</h2>';
            }
                $wp_query = clone $temp_wp_query;
                $pages_e = get_pages(array(
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'template-events.php'
                ));
                $imic_custom_all_event_url = get_post_meta($home_id, 'imic_custom_all_event_url', true);
                ?>
            <div class="listing">
                    <header class="listing-header">
                        <?php
                        if (!empty($imic_custom_all_event_url) || !empty($pages_e[0]->ID)) {
                            $imic_custom_all_event_url = !empty($imic_custom_all_event_url) ? $imic_custom_all_event_url : get_permalink($pages_e[0]->ID);
                            $imic_custom_all_event_url = !empty($imic_custom_all_event_url) ? $imic_custom_all_event_url : get_permalink($pages_e[0]->ID);
                            echo '<a href="' . $imic_custom_all_event_url . '" class="btn btn-primary pull-right push-btn">' . __('All Events', 'framework') . '</a>';
                        }
                        $imic_custom_upcoming_events_title= get_post_meta($home_id,'imic_custom_upcoming_events_title',true);
                        $imic_custom_upcoming_events_title = !empty($imic_custom_upcoming_events_title) ? $imic_custom_upcoming_events_title : __('Upcoming Events', 'framework');
                        echo '<h3>' . $imic_custom_upcoming_events_title . '</h3>';
                        ?>
                    </header>
                    <section class="listing-cont">
                        <ul class="event-blocks row">
                            <?php
                            echo $upcomingEvents;
                            if (isset($no_upcoming_events_msg)):
                                echo '<li>' . $no_upcoming_events_msg . '</li>';
                            endif;
                            ?>
                        </ul></section>
                </div>
                <div class="margin-20"></div>
                <?php
            }
            $posts_per_page = get_post_meta($home_id, 'imic_posts_to_show_on', true);
            $imic_recent_post_area = get_post_meta($home_id, 'imic_imic_recent_posts', true);
            $post_category = get_post_meta($home_id,'imic_recent_post_taxonomy',true);
            if(!empty($post_category)){
            $post_categories= get_category($post_category);
            if(!empty($post_categories)){
            $post_category= $post_categories->slug;}
            else{
               $post_category=''; 
            }}
            if ($imic_recent_post_area == 1) {
                if ($posts_per_page == '') {
                    $posts_per_page = 3;
                }
                $temp_wp_query = clone $wp_query;
                query_posts(array(
                    'post_type' => 'post',
                    'posts_per_page' => $posts_per_page,
                    'category_name' => $post_category,
                ));
                if (have_posts()):
                    ?>
                    <div class="row">
                        <div class="<?php echo $pageOptions['class']; ?>">  
                            <div class="listing post-listing">
                                <header class="listing-header">
                                    <?php
                                    $imic_custom_latest_news_title = get_post_meta($home_id,'imic_custom_latest_news_title', true);
                                    $imic_custom_latest_news_title = !empty($imic_custom_latest_news_title) ?$imic_custom_latest_news_title: __('Latest News', 'framework');
                                    echo'<h3>' . $imic_custom_latest_news_title . '</h3>';
                                    ?>
                                </header>
                                <section class="listing-cont">
                                    <ul>
                                        <?php
                                        while (have_posts()):the_post();
                                            if ('' != get_the_post_thumbnail()) {
                                                $class = "col-md-8";
                                            } else {
                                                $class = "col-md-12";
                                            }
                                            ?>
                                            <li class="item post">
                                                <div class="row">
                                                    <?php
                                                    if (has_post_thumbnail()):
                                                        echo '<div class="col-md-4">
                                                        <a href="' . get_permalink() . '" class="media-box">';
                                                        the_post_thumbnail('600x400');
                                                        echo '</a>
                                                </div>';
                                                    endif;
                                                    ?>
                                                    <div class="<?php echo $class; ?>">
                                                        <div class="post-title">
                                                            <?php
                                                            echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
                                                            echo '<span class="meta-data"><i class="fa fa-calendar"></i>' . __('on ', 'framework') . get_the_time(get_option('date_format')) . '</span></div>';
                                                            echo imic_excerpt(50);
                                                            echo'<p><a href="' . get_permalink() . '" class="btn btn-primary">' . __('Continue reading', 'framework') . '<i class="fa fa-long-arrow-right"></i></a></p>';
                                                            ?>
                                                        </div>
                                                    </div>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </section>
                            </div></div>
                        <?php
                    endif;
                    $wp_query = clone $temp_wp_query;
                }
                ?>
                <?php if(!empty($pageOptions['sidebar'])){ ?>
                <!-- Start Sidebar -->
                <div class="col-md-4 col-sm-6"> 
                    <?php dynamic_sidebar($pageOptions['sidebar']); ?>
                </div>
                <!-- End Sidebar -->
                <?php } ?>
            </div></div>
       	<div class="margin-50"></div>
        <!-- Parallax Section 1 -->
        <?php
        $imic_imic_galleries = get_post_meta($home_id, 'imic_imic_galleries', true);
        $posts_per_page = get_post_meta($home_id, 'imic_galleries_to_show_on', true);
        $posts_per_page = !empty($posts_per_page) ? $posts_per_page : 3;
        $temp_wp_query = clone $wp_query;
        $gallery_category = get_post_meta($home_id,'imic_home_gallery_taxonomy',true);
if(!empty($gallery_category)){
$gallery_categories= get_term_by('id',$gallery_category,'gallery-category');
if(!empty($gallery_categories)){
$gallery_category= $gallery_categories->slug;}
else{
  $gallery_category='';  
}}
        query_posts(array(
            'post_type' => 'gallery',
            'gallery-category' => $gallery_category,
            'posts_per_page' => $posts_per_page,
        ));
        if (have_posts() && $imic_imic_galleries == 1):
           $gallery_size = imicGetThumbAndLargeSize();
           $size_thumb =$gallery_size[0];
           $size_large =$gallery_size[1];
            $gallery_thumb_id = get_post_meta($home_id, 'imic_galleries_background_image', true);
            $large_src_i = wp_get_attachment_image_src($gallery_thumb_id, 'full');
            ?>
            <div class="parallax parallax1 padding-tb100" style="background-image:url(<?php echo $large_src_i[0]; ?>)">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 hidden-sm hidden-xs">
                            <?php
                            $imic_custom_gallery_title = get_post_meta($home_id,'imic_custom_gallery_title',true);
                            $imic_custom_gallery_title = !empty($imic_custom_gallery_title)?$imic_custom_gallery_title: __('Updates from our gallery', 'framework');
                            echo'<h4>' . $imic_custom_gallery_title . '</h4>';
                            $imic_custom_more_galleries_title = get_post_meta($home_id,'imic_custom_more_galleries_title',true);
                            $imic_custom_more_galleries_title = !empty($imic_custom_more_galleries_title) ? $imic_custom_more_galleries_title: __('More Galleries', 'framework');
                            $pages = get_pages(array(
                                'meta_key' => '_wp_page_template',
                                'meta_value' => 'template-gallery-pagination.php'
                            ));
                            $imic_custom_more_galleries_url = get_post_meta($home_id, 'imic_custom_more_galleries_url', true);
                            $imic_custom_more_galleries_url = !empty($imic_custom_more_galleries_url) ? $imic_custom_more_galleries_url : get_permalink($pages[0]->ID);
                            if (!empty($imic_custom_more_galleries_url) || !empty($pages[0]->ID)) {
                                echo'<a href="' . $imic_custom_more_galleries_url . '" class="btn btn-default btn-lg">' . $imic_custom_more_galleries_title . '</a>';
                            }
                            echo '</div>';
                            while (have_posts()):the_post();
                                $custom = get_post_custom(get_the_ID());
                               if (!empty($imic_gallery_images)) {
                                    $gallery_img = $imic_gallery_images;
                                } else {
                                    $gallery_img = '';
                                }
                                $image_data=  get_post_meta(get_the_ID(),'imic_gallery_images',false);
                    $thumb_id=get_post_thumbnail_id(get_the_ID());
                   $post_format_temp =get_post_format();
                 if (has_post_thumbnail() || ((count($image_data) > 0)&&($post_format_temp=='gallery'))):
                  $post_format =!empty($post_format_temp)?$post_format_temp:'image';
                                    echo '<div class="col-md-3 col-sm-3 post format-' . $post_format . '">';
                                    switch (get_post_format()) {
                                        case 'image':
                                            $large_src_i = wp_get_attachment_image_src($thumb_id,$size_large);
                                            echo'<a href="' . $large_src_i[0] . '" data-rel="prettyPhoto[Gallery]" class="media-box">';
                                            the_post_thumbnail($size_thumb);
                                            echo'</a>';
                                            break;
                                        case 'gallery':
                                            echo '<div class="media-box">';
                                            imic_gallery_flexslider(get_the_ID());
                                            if (count($image_data) > 0) {
                                                echo'<ul class="slides">';
                                                foreach ($image_data as $custom_gallery_images) {
                                                    $large_src = wp_get_attachment_image_src($custom_gallery_images,$size_large);
                                                    echo'<li class="item"><a href="' . $large_src[0] . '" data-rel="prettyPhoto[' . get_the_title() . ']">';
                                                    echo wp_get_attachment_image($custom_gallery_images,$size_thumb);
                                                    echo'</a></li>';
                                                }
                                                echo'</ul>';
                                            }
                                            echo'</div>
                                </div>';
                                            break;
                                        case 'link':
                                            if (!empty($custom['imic_gallery_link_url'][0])) {
                                                echo '<a href="' . $custom['imic_gallery_link_url'][0] . '" target="_blank" class="media-box">';
                                                 the_post_thumbnail($size_thumb);
                                                echo'</a>';
                                            }
                                            break;
                                        case 'video':
                                            if (!empty($custom['imic_gallery_video_url'][0])) {
                                                echo '<a href="' . $custom['imic_gallery_video_url'][0] . '" data-rel="prettyPhoto[Gallery]" class="media-box">';
                                                the_post_thumbnail($size_thumb);
                                                echo'</a>';
                                            }
                                            break;
                                        default:
                                           $large_src_i = wp_get_attachment_image_src($thumb_id,$size_large);
                                            echo'<a href="' . $large_src_i[0] . '" data-rel="prettyPhoto[Gallery]" class="media-box">';
                                            the_post_thumbnail($size_thumb);
                                            echo'</a>';
                                            break;
                                    }
                                    echo'</div>';
                                endif;
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="margin-50"></div>
                <?php
            endif;
            $wp_query = clone $temp_wp_query;
            $temp_wp_query = clone $wp_query;
            $imic_switch_album = get_post_meta($home_id, 'imic_switch_sermon_album', 'true');
            if ($imic_switch_album == 1) {
                $number_of_sermon_albums = get_post_meta($home_id, 'imic_number_of_sermon_albums', true);
                $number_of_sermon_albums = !empty($number_of_sermon_albums) ? $number_of_sermon_albums : 4;
                ?>
                <div class="container">
                    <div class="listing">
                        <header class="listing-header">
                            <?php
                            $pages_s_albums = get_pages(array(
                                'meta_key' => '_wp_page_template',
                                'meta_value' => 'template-sermons-albums.php'
                            ));
                            $imic_all_sermon_url = get_post_meta($home_id, 'imic_sermon_albums_url', 'true');
                            if (!empty($imic_all_sermon_url) || !empty($pages_s_albums[0]->ID)) {
                                $imic_all_sermon_url = !empty($imic_all_sermon_url) ? $imic_all_sermon_url : get_permalink($pages_s_albums[0]->ID);
                                echo '<a href="' . $imic_all_sermon_url . '" class="btn btn-primary pull-right push-btn">' . __('All Albums', 'framework') . '</a>';
                            }
                            $imic_custom_albums_title = get_post_meta($home_id, 'imic_custom_albums_title', 'true');
                            $imic_custom_albums_title = !empty($imic_custom_albums_title) ? $imic_custom_albums_title : __('Latest Sermon Albums', 'framework');
                            echo '<h3>' . $imic_custom_albums_title . '</h3>';
                            ?>
                        </header>
                        <?php
                        $taxonomies = array('sermons-category');
                        $args = array('orderby' => 'count', 'hide_empty' =>true);
                        $sermonterms = get_terms($taxonomies, $args);
                        if(!empty($sermonterms)){
                        ?>
                        <section class="listing-cont">
                            <ul class="album-blocks row">
                                <?php
                                $i = 1;
                                foreach($sermonterms as $sermonterms_data) {
                                    query_posts(array(
                                        'post_type' => 'sermons',
                                        'sermons-category' => $sermonterms_data->slug
                                    ));
                                    $imic_sermon_attach_full_audio_array = $imic_sermons_url_array = array();
                                    while (have_posts()):the_post();
                                        $imic_sermons_url = get_post_meta(get_the_ID(), 'imic_sermons_url', true);
                                        if (!empty($imic_sermons_url)) {
                                            array_push($imic_sermons_url_array, $imic_sermons_url);
                                        }
                                        $imic_sermon_attach_full_audio = imic_sermon_attach_full_audio(get_the_ID());
                                        if (!empty($imic_sermon_attach_full_audio)) {
                                            array_push($imic_sermon_attach_full_audio_array, $imic_sermon_attach_full_audio);
                                        }
                                    endwhile;
                                    $term_link = get_term_link($sermonterms_data->slug, 'sermons-category');
                                     ?> 
                                    <li class="col-md-3 col-sm-6">
                                        <div class="grid-item-inner">
                                            <?php 
                                            $t_id = $sermonterms_data->term_id; // Get the ID of the term we're editing
                                            $term_meta = get_option($sermonterms_data->taxonomy . $t_id . "_image_term_id"); // Do the check 
                                            if(!empty($term_meta)){ ?>
                                            <a href="<?php echo $term_link; ?>" class="album-cover">
                                               <span class="album-image"><img src="<?php echo $term_meta; ?>" alt=""></span>
                                            </a>
                                            <?php
                                            }
                                            if (count($imic_sermons_url_array) > 0) {
                                                echo '<div class="label label-primary album-count">' . count($imic_sermons_url_array) . __(' videos', 'framework') . '</div>';
                                                echo '&nbsp';
                                            }
                                            if (count($imic_sermon_attach_full_audio_array) > 0) {
                                                echo '<div class="label label-primary album-count">' . count($imic_sermon_attach_full_audio_array) . __(' audios', 'framework') . '</div>';
                                            }
                                           // If there was an error, continue to the next term.
                                            if (is_wp_error($term_link)) {
                                                continue;
                                            } else {
                                                echo '<h5><a href="' . $term_link . '">' . $sermonterms_data->name . '</a></h5>';
                                                echo '<a class="btn btn-default btn-sm" href="' . $term_link . '" >' . __('Play ', 'framework') . '<i class="fa fa-play"></i></a>';
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <?php
                                    if ($i == $number_of_sermon_albums)
                                        break;
                                    $i++;
                                }
                                ?>
                            </ul>
                        </section>
                        <?php }
                        $wp_query = clone $temp_wp_query;?>
                    </div>
                </div>
    <?php } ?>
        </div>
    </div>
<?php
get_footer();
?>