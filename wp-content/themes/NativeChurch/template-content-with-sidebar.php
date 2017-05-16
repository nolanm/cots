<?php
/*
  Template Name: Content with Sidebar
 */
get_header(); 
$pageOptions = imic_page_design(); //page design options ?>
<div class="container">
    <div class="row">
        <div class="<?php echo $pageOptions['class']; ?>">
	  	<?php if(have_posts()):
                while(have_posts()):the_post();
             	if($post->post_content!="") :
                              the_content();        
                              echo '<div class="spacer-20"></div>';
                      endif;
                endwhile;
            endif; ?>
			<?php if ($imic_options['switch_sharing'] == 1 && $imic_options['share_post_types']['2'] == '1') { ?>
                <?php imic_share_buttons(); ?>
            <?php } ?>
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