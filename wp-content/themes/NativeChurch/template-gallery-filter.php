<?php
/*
  Template Name: Gallery  Filter
 */
get_header();
$pageSidebar = get_post_meta(get_the_ID(),'imic_select_sidebar_from_list', true);
if(!empty($pageSidebar)&&is_active_sidebar($pageSidebar)) {
$column_class = 9;  
}else{
$column_class = 12;  
}
$pageOptions = imic_page_design(); //page design options
$gallery_size = imicGetThumbAndLargeSize();
$size_thumb =$gallery_size[0];
$size_large =$gallery_size[1];
$custom_gallery_filter = get_post_custom(get_the_ID());
$gallery_filter_columns_layout = $custom_gallery_filter['imic_gallery_filter_columns_layout'][0];
$gallery_category = get_post_meta(get_the_ID(),'imic_advanced_gallery_taxonomy',true);
$show_gallery_title_filter = get_post_meta(get_the_ID(),'imic_show_gallery_title_filter',true);
if(!empty($gallery_category)){
$gallery_categories= get_term_by('id',$gallery_category,'gallery-category');
if(!empty($gallery_categories)){
$gallery_category= $gallery_categories->slug;}
else{
$gallery_category='';    
}}
if ($gallery_filter_columns_layout == 3) {
$class = 'col-md-4 col-sm-4';
} elseif ($gallery_filter_columns_layout == 4) {
$class = 'col-md-3 col-sm-3';
} else {
$class = 'col-md-6 col-sm-6';
}
echo '<div class="container">';
echo '<div class="row">'; ?>
<div class="col-md-<?php echo $column_class ?>">
<?php
while(have_posts()):the_post();
the_content();		
endwhile;
$temp_wp_query = clone $wp_query;
query_posts(array(
'post_type' => 'gallery',
'gallery-category' => $gallery_category,
'posts_per_page' => -1,
));
if (have_posts()): ?>
<div class="row">
<ul class="sort-destination" data-sort-id="gallery">
<?php
while (have_posts()):the_post();
$custom = get_post_custom(get_the_ID());
$image_data=  get_post_meta(get_the_ID(),'imic_gallery_images',false);
$thumb_id=get_post_thumbnail_id(get_the_ID());
$post_format_temp =get_post_format();
if (has_post_thumbnail() || ((count($image_data) > 0)&&($post_format_temp=='gallery'))):
$post_format =!empty($post_format_temp)?$post_format_temp:'image';
$term_slug = get_the_terms(get_the_ID(), 'gallery-category');
echo '<li class="' . $class . ' grid-item post';
if (!empty($term_slug)) {
foreach ($term_slug as $term) {
  echo ' format-'.$term->slug.' ';
}
}
echo '">';
echo'<div class="grid-item-inner">';
switch (get_post_format()) {
case 'image':
$large_src_i = wp_get_attachment_image_src($custom['_thumbnail_id'][0], $size_large);
echo'<a href="' . $large_src_i[0] . '" data-rel="prettyPhoto" class="media-box">';
the_post_thumbnail($size_thumb);
echo'</a>';
break;
case 'gallery':
echo '<div class="media-box">';
imic_gallery_flexslider(get_the_ID());  
if (count($image_data) > 0) {
echo'<ul class="slides">';
foreach ($image_data as $custom_gallery_images) {
$large_src = wp_get_attachment_image_src($custom_gallery_images, $size_large);
echo'<li class="item"><a href="' . $large_src[0] . '" data-rel="prettyPhoto[postname]">';
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
echo '<a href="' . $custom['imic_gallery_video_url'][0] . '" data-rel="prettyPhoto" class="media-box">';
the_post_thumbnail($size_thumb);
echo'</a>';
}
break;
default:
if(!empty($thumb_id)){
$large_src_i = wp_get_attachment_image_src($thumb_id, $size_large);
echo'<a href="' . $large_src_i[0] . '" data-rel="prettyPhoto[Gallery]" class="media-box">';
the_post_thumbnail($size_thumb);
echo'</a>';
}
break;
}
echo'</div>';
if($show_gallery_title_filter==1) {
	echo '<h3 class="gallery_title_meta">'.get_the_title().'</h3>';
};
echo'</li>';
endif;
endwhile; ?>
</ul>
</div>
<?php endif;
$wp_query = clone $temp_wp_query;
echo'</div>';
if(is_active_sidebar($pageSidebar)) { ?>
    <!-- Start Sidebar -->
   	<div class="col-md-3 sidebar">
    	<?php dynamic_sidebar($pageOptions['sidebar']); ?>
   	</div>
	<!-- End Sidebar -->
 <?php }
 echo '</div></div>';
get_footer(); ?>