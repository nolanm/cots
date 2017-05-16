<?php
/*
Template Name: Events Grid old
*/ 
get_header();
$pageSidebar = get_post_meta(get_the_ID(),'imic_select_sidebar_from_list', true);
if(!empty($pageSidebar)&&is_active_sidebar($pageSidebar)) {
$column_class = 9;  
}else{
$column_class = 12;  
}
$pageOptions = imic_page_design(); //page design options
echo '<div class="container">
<div class="row">'; ?>
<div class="col-md-<?php echo $column_class ?>">
  <?php 
  
  while(have_posts()):the_post();
  if($post->post_content!="") :
                              the_content();        
                              echo '<div class="spacer-20"></div>';
                      endif;	
  endwhile; ?> 
<?php
$event_add = array();
$rec = 1;
$no_event = 0;
$today = date('Y-m-d');
$event_category = get_post_meta(get_the_ID(),'imic_advanced_event_list_taxonomy',true);
if(!empty($event_category)){
$event_categories= get_term_by('id',$event_category,'event-category');
$event_category= $event_categories->slug; }
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts(array('post_type' => 'event','event-category' => $event_category, 'meta_key' => 'imic_event_start_dt','meta_query' => array( array( 'key' => 'imic_event_frequency_end', 'value' => $today, 'compare' => '>=') ), 'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page'=>50));
if(have_posts()):while(have_posts()):the_post();
$frequency = get_post_meta(get_the_ID(), 'imic_event_frequency', true);
$frequency_count = 0;
$frequency_count = get_post_meta(get_the_ID(), 'imic_event_frequency_count', true);
if ($frequency_count > 0) {
$frequency_count = $frequency_count;
}
else {
$frequency_count = 0;
}
$date_diff = $frequency * 86400;
$sinc = 0;
while ($sinc <= $frequency_count) {
$diff_date = $sinc * $date_diff;
$st_date = get_post_meta(get_the_ID(), 'imic_event_start_dt', true);
$eventTime = get_post_meta(get_the_ID(), 'imic_event_start_tm', true);
$eventTime = ($eventTime!='')?$eventTime:'23:59';
if($frequency==30) {
$st_date = strtotime($st_date.' '.$eventTime);
$diff_date = strtotime("+".$sinc." month", $st_date);
}
else {
$st_date = strtotime($st_date.' '.$eventTime);
$diff_date = $st_date + $diff_date;
}
if($diff_date>=date('U')&&  has_post_thumbnail()) {
$event_add[$diff_date + $rec] = get_the_ID();
$no_event++;
}
$sinc++; $rec++; }
endwhile; endif;
wp_reset_query();
if($no_event==0):
echo '<article class="post">';
if (current_user_can('edit_posts')) :
echo '<h3>'.__('There are no future events to show.', 'framework').'</h3>';
echo '</article>';
endif;
endif; // end have_posts()
$now = date('U');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$count = 1;
$grid_item = 1;
$perPage = get_option('posts_per_page');
$paginate = 1;
if($paged>1) {
$paginate = ($paged-1)*$perPage; $paginate = $paginate+1; }
 $google_events = getGoogleEvent();
 $new_events = $google_events+$event_add; 
$TotalEvents = count($new_events);
if($TotalEvents%$perPage==0) {
$TotalPages = $TotalEvents/$perPage;
}
else {
$TotalPages = $TotalEvents/$perPage;
$TotalPages = $TotalPages+1;
}
if(!empty($new_events)){
ksort($new_events);
echo '<ul class="grid-holder col-3 events-grid">';
foreach ($new_events as $key => $value) {
if(preg_match('/^[0-9]+$/',$value)){
$google_flag =1;
}else{
$google_flag =2;
}
if($google_flag==1){
setup_postdata(get_post($value));
$eventStartDate = strtotime(get_post_meta($value,'imic_event_start_dt',true));
$eventStartTime = strtotime(get_post_meta($value,'imic_event_start_tm',true));
$eventEndTime = strtotime(get_post_meta($value,'imic_event_end_tm',true));
$registration_status = get_post_meta($value,'imic_event_registration_status',true);
/** Event Details Manage **/
if($registration_status==1&&(function_exists('imic_get_currency_symbol'))) {
$eventDetailIcons = array('fa-calendar', 'fa-map-marker','fa-money');	
}else {
$eventDetailIcons = array('fa-calendar', 'fa-map-marker'); }
$stime = ""; $etime = "";
if($eventStartTime!='') { $stime = ' | ' .date_i18n(get_option('time_format'), $eventStartTime) ; }
if($eventEndTime!='') { $etime =  ' - '. date_i18n(get_option('time_format'),$eventEndTime); }
if($registration_status==1&&(function_exists('imic_get_currency_symbol'))) {
	$event_registration_fee = get_post_meta($value,'imic_event_registration_fee',true);
	$registration_charge = ($event_registration_fee=='')?'Free':imic_get_currency_symbol(get_option('paypal_currency_options')).get_post_meta($value,'imic_event_registration_fee',true);
$eventDetailsData = array(date_i18n('j M, ',$key).date_i18n('l',$key). $stime .  $etime, get_post_meta($value,'imic_event_address',true),$registration_charge);	
}else {
$eventDetailsData = array(date_i18n('j M, ',$key).date_i18n('l',$key). $stime .  $etime, get_post_meta($value,'imic_event_address',true)); }
$eventValues = array_filter($eventDetailsData, 'strlen');
}
if($count==$paginate&&$grid_item<=$perPage) { $paginate++; $grid_item++;
if($google_flag==1){
$frequency = get_post_meta($value,'imic_event_frequency',true); 
}
//if ('' != get_the_post_thumbnail($value)) {
echo '<li class="grid-item format-standard">';
if($google_flag==1){
$date_converted=date('Y-m-d',$key );
$custom_event_url =imic_query_arg($date_converted,$value); 
}
if($google_flag==2){
         $google_data =(explode('!',$value)); 
           $event_title=$google_data[0];
           $custom_event_url=$google_data[1];
           $stime = ""; $etime = "";
         $etime=$google_data[2];
     if($key!='') { $stime = ' | ' .date_i18n(get_option('time_format'), $key) ; }
if($etime!='') { $etime =  ' - '. date_i18n(get_option('time_format'),strtotime($etime)); }
      $eventAddress=$google_data[3];
      $eventDetailsData = array(date_i18n('j M, ',$key).date_i18n('l',$key). $stime .  $etime,$eventAddress); 
$eventValues = array_filter($eventDetailsData, 'strlen');
$eventDetailIcons = array('fa-calendar', 'fa-map-marker'); 
}
echo '<div class="grid-item-inner">';
if($google_flag==1){
echo '<a href="'.$custom_event_url.'" class="media-box">';
echo get_the_post_thumbnail($value, 'full');
echo '</a>';
$event_title=get_the_title($value);
}
echo '<div class="grid-content">';
echo '<h3><a href="' . $custom_event_url. '">'.$event_title.'</a>'.imicRecurrenceIcon($value).'</h3>';
if($google_flag==1){
echo imic_excerpt(25);
}
echo'</div>';
if(!empty($eventValues)){ 
echo '<ul class="info-table">';
$flag = 0;
foreach($eventDetailsData as $edata){
if(!empty($edata)){
echo '<li><i class="fa '.$eventDetailIcons[$flag].'"></i> '.$edata.' </li>';
}				
$flag++;	
}
echo '</ul>';
//}
echo '</div>
</li>';
 }} $count++; }
echo '</ul>';
wp_reset_postdata();
pagination($TotalPages,$perPage);
}
echo '</div>';
?>
            <?php if(is_active_sidebar($pageSidebar)) { ?>
            <!-- Start Sidebar -->
            <div class="col-md-3 sidebar">
                <?php dynamic_sidebar($pageOptions['sidebar']); ?>
            </div>
            <!-- End Sidebar -->
         <?php }
         echo '</div></div>';
get_footer(); ?>