<?php
/*
  Template Name: Staff
 */
get_header();
$variable_post_id =  get_the_ID();
$number= get_post_meta(get_the_ID(),'imic_staff_to_show_on',true);
$order= get_post_meta(get_the_ID(),'imic_staff_select_orderby',true);
$pageOptions = imic_page_design(); //page design options 
?>
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
        <div class="row">
				<?php if($order=="ID") {$sort_order = "DESC"; } else { $sort_order = "ASC"; }
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        query_posts(array(
                    'post_type' => 'staff',
                    'posts_per_page' => $number,
                    'orderby' => $order,
                    'order' => $sort_order,
                    'paged' => $paged
                ));
                if (have_posts()):
                    while (have_posts()):the_post();
                        $custom = get_post_custom(get_the_ID());
                      	echo '<div class="col-md-4 col-sm-4">
                            <div class="grid-item staff-item"> 
                                <div class="grid-item-inner">';
                        if (has_post_thumbnail()):
                            echo '<div class="media-box"><a href="'.get_permalink(get_the_ID()).'">';
                             echo get_the_post_thumbnail(get_the_ID(), '600x400');
                            echo '</a></div>';
                        endif;
                        $job_title = get_post_meta(get_the_ID(),'imic_staff_job_title',true);
                        $job = '';
                        if(!empty($job_title)) { $job = '<div class="meta-data">'.$job_title.'</div>'; }
                        echo '<div class="grid-content">
                                   <h3> <a href="'.get_permalink(get_the_ID()).'">'. get_the_title() . '</a></h3>';
                        echo $job;
                        $staff_icons = get_post_meta(get_the_ID(), 'imic_social_icon_list', false);
                        echo imic_social_staff_icon();
                        $description = imic_excerpt();
                        if (!empty($description)) {
                            echo $description;
                        }
                        echo'</div></div>
                            </div>
                        </div>';
                    endwhile;
                 endif;
                 echo '<div class="clear"></div>';
                 if(function_exists("pagination")) {
                     pagination();
                 }
                 wp_reset_query();
                ?>
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