<?php
/*
  Template Name: Events List
 */
get_header();
$pageOptions = imic_page_design(); //page design options ?>
<div class="container">
      <div class="row">
        	<div class="<?php echo $pageOptions['class']; ?>">
        	<?php 
			
			while(have_posts()):the_post();
			if($post->post_content!="") :
                              the_content();        
                              echo '<div class="spacer-20"></div>';
                      endif;	
			endwhile; ?> 
        <div id="ajax_events"> 
        	<!-- Events Listing -->
            <div class="listing events-listing">
            <header class="listing-header">
            	<div class="row">
                	<div class="col-md-6 col-sm-6">
          				<h3><?php _e('All events', 'framework'); ?></h3>
                  </div>
                  <div class="listing-header-sub col-md-6 col-sm-6">
                    <?php 
						$currentEventTime = date('Y-m');
						$prev_month = date('Y-m', strtotime('-1 month', strtotime($currentEventTime)));
						$next_month = date('Y-m', strtotime('+1 month', strtotime($currentEventTime)));
						$event_category = get_post_meta(get_the_ID(),'imic_advanced_event_list_taxonomy',true);
						if($event_category!=''){
                                                 $event_categories= get_term_by('id',$event_category,'event-category');
						if(!empty($event_categories)){
                                                $event_category= $event_categories->slug; }}
					?>
                  	<h5><?php echo date_i18n('F', strtotime($currentEventTime)); ?></h5>
                    	<nav class="next-prev-nav">
                    		<a href="javascript:" class="upcomingEvents" rel="<?php echo $event_category; ?>" id="<?php echo $prev_month; ?>"><i class="fa fa-angle-left"></i></a>
                    		<a href="javascript:" class="upcomingEvents" rel="<?php echo $event_category; ?>" id="<?php echo $next_month; ?>"><i class="fa fa-angle-right"></i></a>
                     	</nav>
                  </div>
              </div>
            </header>
            <section class="listing-cont">
              <ul>
              	<?php
				  $temp_wp_query = clone $wp_query;
				  $today = date('Y-m-d');				  
				  $before_week = date('Y-m-d', strtotime("-7 days"));
				  $currentTime = date('Y-m-d');
				  
				  query_posts(array(
								'post_type' => 'event',
								'meta_key' => 'imic_event_start_dt',
								'event-category' => $event_category,
								'meta_query' => array(
										'relation' => 'AND',
										array(
											'key' => 'imic_event_frequency_end',
											'value' => $today,
											'compare' => '>='
										),
										array(
											'key' => 'imic_event_start_dt',
											'value' => date('Y-m-t 23:59'),
											'compare' => '<='
										)
								),
								'orderby' => 'meta_value',
								'order' => 'ASC',
								'posts_per_page' => -1
							)
				  ); $count = 0;
				  $events = array();
				  $sinc = 1;
				  if(have_posts()){ 
					while (have_posts()):the_post();
					$custom_event = get_post_custom(get_the_ID()); 
					$frequency = get_post_meta(get_the_ID(),'imic_event_frequency',true);
					$frequency_count = '';
					$frequency_count = get_post_meta(get_the_ID(),'imic_event_frequency_count',true);
					if($frequency>0) { $frequency_count = $frequency_count; } else { $frequency_count = 0; }
					$seconds = $frequency*86400;
					$eve_time = get_post_meta(get_the_ID(),'imic_event_start_tm',true);
					$eve_time = strtotime($eve_time);
					if($eve_time!='') { $eve_time = date('h:i A',$eve_time); }
					$rec = 0;
					while($rec<=$frequency_count) {
					$eventStartDate = $custom_event['imic_event_start_dt'][0];
					$eventStartDate = strtotime($eventStartDate.' '.$eve_time);
					if($frequency==30) {
					$eventStartDate = strtotime("+".$rec." month", $eventStartDate);
					}
					else {
					$sv = $rec*$seconds;
					$eventStartDate = $eventStartDate+$sv;
					}
					$sd = date('Y-m-d',$eventStartDate);
					$sndate = $sd.' '.$eve_time;
					$sndate = strtotime($sndate);
					$sn = date('Y-m-t',strtotime($currentEventTime));
					if(($sndate > strtotime($currentTime)) && ($eventStartDate >= strtotime($today))&& ($eventStartDate <= strtotime(date('Y-m-t 23:59')))){
					$events[$eventStartDate+$sinc] = get_the_ID();
					$sinc++;
					$count++;  }
					$rec++; } 
					endwhile;
				  }
				  $wp_query = clone $temp_wp_query; 
                                $this_month_last = strtotime(date('Y-m-t 23:59'));
	                        $google_events = getGoogleEvent($this_month_last);
                               $new_events = $google_events+$events;
				  ksort($new_events);
                                  if(!empty($new_events)){
                                 foreach($new_events as $key=>$value) {
                                if(preg_match('/^[0-9]+$/',$value)){
                                $eventStartTime = get_post_meta($value,'imic_event_start_tm',true); 
				  $eventStartTime = strtotime($eventStartTime);
				  if($eventStartTime!='') { $eventStartTime = date(get_option('time_format'),$eventStartTime); }
				  $date_converted=date('Y-m-d',$key );
                                 $custom_event_url =imic_query_arg($date_converted,$value);
                                 $event_title=get_the_title($value);
                                 $stime = ''; if($eventStartTime!='') { $stime = ' | '.$eventStartTime; }
                                  } else{
                                   $google_data =(explode('!',$value)); 
                                     $event_title=$google_data[0];
                                   $custom_event_url=$google_data[1];
                                  $stime = ' | ' . date(get_option('time_format'), $key);
                                } if($key>date('U')) { ?>
                    <li id="<?php echo date('y-n-d',$key); ?>" class="item event-item event-id">	
                      <div class="event-date"> <span class="date"><?php echo date('d',$key); ?></span> <span class="month"><?php echo imic_global_month_name($key); ?></span> </div>
                      <div class="event-detail">
                      <h4><a href="<?php echo $custom_event_url; ?>"><?php echo $event_title; ?> </a><?php echo imicRecurrenceIcon($value); ?></h4>
                     <span class="event-dayntime meta-data"><?php echo date_i18n('l',$key); echo $stime; ?></span> </div>
                      <div class="to-event-url">
                        <div><a href="<?php echo $custom_event_url; ?>" class="btn btn-default btn-sm"><?php _e('Details','framework'); ?></a></div>
                      </div>
                    </li> 
                                  <?php } }}
                else{ ?>
			<li class="item event-item">	
                      <div class="event-detail">
                        <h4><?php _e('Sorry, there are no events for this month.','framework'); ?></h4>
                      </div>
                    </li>  
				<?php }?>
              </ul>
            </section>
          </div>
        </div>
     </div>
        <?php if(!empty($pageOptions['sidebar'])){ ?>
        <!-- Start Sidebar -->
        <div class="col-md-3 sidebar">
            <?php dynamic_sidebar($pageOptions['sidebar']); ?>
        </div>
        <!-- End Sidebar -->
        <?php } ?>
      </div>
    </div>    
<?php get_footer(); ?>