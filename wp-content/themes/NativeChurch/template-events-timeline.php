<?php
/*
  Template Name: Events Timeline
 */
get_header();
$pageSidebar = get_post_meta(get_the_ID(),'imic_select_sidebar_from_list', true);
if(!empty($pageSidebar)&&is_active_sidebar($pageSidebar)) {
$column_class = 9;  
}else{
$column_class = 12;  
}
$pageOptions = imic_page_design(); //page design options
?>
      <div class="container">
      <div class="row">
        	<div class="col-md-<?php echo $column_class ?>">
        	<?php 
			
			while(have_posts()):the_post();
			if($post->post_content!="") :
                              the_content();        
                              echo '<div class="spacer-20"></div>';
                      endif;	
			endwhile; ?> 
        <ul class="timeline">
      <?php $temp_wp_query = clone $wp_query;
$today = date('Y-m-d');
$currentTime = date(get_option('time_format'));
$upcomingEvents = '';
$event_category = get_post_meta(get_the_ID(),'imic_advanced_event_list_taxonomy',true);
						if(!empty($event_category)){
						$event_categories= get_term_by('id',$event_category,'event-category');
						$event_category= $event_categories->slug; }
query_posts(array('post_type' => 'event', 'event-category' => $event_category, 'meta_key' => 'imic_event_start_dt', 'meta_query' => array(array('key' => 'imic_event_frequency_end', 'value' => $today, 'compare' => '>=')), 'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page' => 50));
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
		if($eventTime!='') { $eventTime = date('h:i A',$eventTime); }
        $frequency = get_post_meta(get_the_ID(), 'imic_event_frequency', true);
        $frequency_count = '';
        $frequency_count = get_post_meta(get_the_ID(), 'imic_event_frequency_count', true);
        if ($frequency > 0) {
            $frequency_count = $frequency_count;
        } else { $frequency_count = 0; }
        $seconds = $frequency * 86400;
        $fr_repeat = 0;
        while ($fr_repeat <= $frequency_count) {
            $eventDate = get_post_meta(get_the_ID(), 'imic_event_start_dt', true);
            $eventTime = get_post_meta(get_the_ID(), 'imic_event_start_tm', true);
				$eventTime = ($eventTime!='')?$eventTime:'23:59';
            $eventDate = strtotime($eventDate.' '.$eventTime);
			if($frequency==30) {
			$eventDate = strtotime("+".$fr_repeat." month", $eventDate);
			$eventDate = date('Y-m-d',$eventDate);
			$eventDate = $eventDate.' '.$eventTime;
			$eventDate = strtotime($eventDate);
			}
			else {
            $new_date = $seconds * $fr_repeat;
            $eventDate = $eventDate + $new_date;
			$eventDate = date('Y-m-d',$eventDate);
			$eventDate = $eventDate.' '.$eventTime;
			$eventDate = strtotime($eventDate);
			}
            $date_sec = date('Y-m-d', $eventDate);
            $exact_time = strtotime($date_sec . ' ' . $eventTime);
            if ($exact_time >= date('U')) {
                $event_add[$eventDate + $sinc] = get_the_ID();
                $sinc++;
            } $fr_repeat++;
        }
    endwhile; endif; 
	$nos_event = 1;
	$month_check = 1;
        $google_events = getGoogleEvent();
     $new_events = $google_events+$event_add;
     ksort($new_events);
	$month_tag = '';
    foreach ($new_events as $key => $value) {
		$frequency = get_post_meta(get_the_ID(), 'imic_event_frequency', true);
       	$frequency_count = get_post_meta(get_the_ID(), 'imic_event_frequency_count', true);
		
		if($month_tag!=imic_global_month_name($key)) { $month_check=1; }
		$year_tag = date_i18n('Y',$key);
		if($month_check==1) {
		$month_tag = imic_global_month_name($key); } if($month_check==1) { $tag = '<div class="timeline-badge">'.$month_tag.'<span>'.$year_tag.'</span></div>'; } else { $tag = ''; } $month_check++;
		 if(preg_match('/^[0-9]+$/',$value)){
		$eventAddress = get_post_meta($value,'imic_event_address',true);
		$eventContact = get_post_meta($value,'imic_event_contact',true);
                $date_converted=date('Y-m-d',$key);
                $custom_event_url =imic_query_arg($date_converted,$value);    
                $eventTime = get_post_meta($value, 'imic_event_start_tm', true);
		$eventEndTime = get_post_meta($value,'imic_event_end_tm',true);
		$eventTime = strtotime($eventTime);
		if($eventTime!='') { $eventTime = date_i18n( get_option( 'time_format' ),$eventTime); }
		$eventEndTime = strtotime($eventEndTime);
		if($eventEndTime!='') { $eventEndTime = ' - '.date_i18n( get_option( 'time_format' ),$eventEndTime); }
        
        $stime = '';
        $setime = '';
        if ($eventTime != '') {
            $stime = ' | ' . $eventTime;
            $setime = $eventTime;
        }
                 $event_title=get_the_title($value);
        }
               else{
             $google_data =(explode('!',$value)); 
             $event_title=$google_data[0];
           $custom_event_url=$google_data[1];
           $eventTime =$key;
           if($eventTime!='') { $eventTime = date_i18n( get_option( 'time_format' ),$key); }
         $eventEndTime =$google_data[2];
      if($eventEndTime!='') { $eventEndTime = ' - '.date_i18n( get_option( 'time_format' ),strtotime($eventEndTime)); }
      $eventAddress=$google_data[3];
      }
		if($nos_event%2==0) { $class = 'timeline-inverted'; } else { $class = ''; }
        echo '<li class="'.$class.'">
              '.$tag.'
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h3 class="timeline-title"><a href="'.$custom_event_url.'">'.$event_title.'</a> '.imicRecurrenceIcon($value).'</h3>
                </div>
                <div class="timeline-body">
				
                    <ul class="info-table">
                      <li><i class="fa fa-calendar"></i> <strong>'.date_i18n( 'l',$key ).'</strong> | '.date_i18n( get_option( 'date_format' ),$key ).'</li>';
					  if(!empty($eventTime)) { 
                      echo '<li><i class="fa fa-clock-o"></i>'.$eventTime.$eventEndTime.'</li>'; }
					  if(!empty($eventAddress)) {
                      echo '<li><i class="fa fa-map-marker"></i> '.$eventAddress.'</li>'; }
					  if(!empty($eventContact)) {
                      echo '<li><i class="fa fa-phone"></i> '.$eventContact.'</li>'; }
                    echo '</ul>
                </div>
              </div>
            </li>';
    $nos_event++; } ?>
            
        </ul>
	</div>
        <?php if(is_active_sidebar($pageSidebar)) { ?>
            <!-- Start Sidebar -->
            <div class="col-md-3 sidebar">
                <?php dynamic_sidebar($pageOptions['sidebar']); ?>
            </div>
            <!-- End Sidebar -->
         <?php }
         echo '</div></div>';
get_footer(); ?>