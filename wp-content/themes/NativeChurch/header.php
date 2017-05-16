<!DOCTYPE html>
<!--// OPEN HTML //-->
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <?php
        $options = get_option('imic_options');
        /** Theme layout design * */
        $bodyClass = ($options['site_layout'] == 'boxed') ? ' boxed' : '';
        $style='';
       if($options['site_layout'] == 'boxed'){
            if (!empty($options['upload-repeatable-bg-image']['id'])) {
            $style = ' style="background-image:url(' . $options['upload-repeatable-bg-image']['url'] . '); background-repeat:repeat; background-size:auto;"';
        } else if (!empty($options['full-screen-bg-image']['id'])) {
            $style = ' style="background-image:url(' . $options['full-screen-bg-image']['url'] . '); background-repeat: no-repeat; background-size:cover;"';
        }
           else if(!empty($options['repeatable-bg-image'])) {
            $style = ' style="background-image:url(' . get_template_directory_uri() . '/images/patterns/' . $options['repeatable-bg-image'] . '); background-repeat:repeat; background-size:auto;"';
        }
        }
        ?>
        <!--// SITE TITLE //-->
        <title>
            <?php wp_title('|', true, 'right'); ?>
<?php bloginfo('name'); ?>
        </title>
        <!--// SITE META //-->
        <meta charset="<?php bloginfo('charset'); ?>" />
        <!-- Mobile Specific Metas
        ================================================== -->
<?php if ($options['switch-responsive'] == 1) { ?>
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"><?php } ?>
        <meta name="format-detection" content="telephone=no">
        <!--// PINGBACK & FAVICON //-->
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php if (isset($options['custom_favicon']) && $options['custom_favicon'] != "") { ?><link rel="shortcut icon" href="<?php echo $options['custom_favicon']['url']; ?>" /><?php
        }
        $offset = get_option('timezone_string');
		if($offset=='') { $offset = "Australia/Melbourne"; }
	date_default_timezone_set($offset);
        ?>
        <!-- CSS
        ================================================== -->
        <!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/ie8.css" media="screen" /><![endif]-->
        <?php //  WORDPRESS HEAD HOOK 
         wp_head(); ?>
    </head>
    <!--// CLOSE HEAD //-->
    <body <?php body_class($bodyClass); echo $style;  ?>>
        <!--[if lt IE 7]>
                <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]--> 
        <div class="body header-style<?php echo $options['header_layout']; ?>">
            <?php
            $menu_locations = get_nav_menu_locations();
            if ($options['header_layout'] == 3):
//                <!-- Start Top Row -->
                echo '<div class="toprow">
                    <div class="container">
    	          <div class="row">
          	 <div class="col-md-6 col-sm-6">
            	<nav class="top-menus">
                	<ul>';
                $socialSites = $options['header_social_links'];
                foreach ($socialSites as $key => $value) {
                    if (filter_var($value, FILTER_VALIDATE_URL)) {
                        echo '<li><a href="' . $value . '" target="_blank"><i class="fa ' . $key . '"></i></a></li>';
                    }
                }
                echo'</ul>
              	</nav>
         	</div>';
                if (!empty($menu_locations['top-menu'])) {
                    echo'<div class="col-md-6 col-sm-6">
            	<nav class="top-menus pull-right">';
                    wp_nav_menu(array('theme_location' => 'top-menu', 'container' => ''));
                    echo'</nav>
         	</div>';
                }
                echo'</div></div></div>';
            //            <!-- End Top Row -->
            endif;
            ?>
            <!-- Start Site Header -->
            <header class="site-header">
                <div class="topbar">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-8">
                                <h1 class="logo">
                                    <?php
                                    global $imic_options;
                                    if (!empty($imic_options['logo_upload']['url'])) {
                                        echo '<a href="' . site_url() . '" title="' . site_url() . '"><img src="' . $imic_options['logo_upload']['url'] . '" alt="Logo"></a>';
                                    } else {
                                        echo '<a href="' . site_url() . '" title="' . site_url() . '"><img src="' . get_template_directory_uri() . '/images/logo.png" alt="Logo"></a>';
                                    }
                                    ?>
                                </h1>
                            </div>
                            <?php
                            if (!empty($options['header_layout'])):
                                echo '<div class="col-md-8 col-sm-6 col-xs-4">';
                                if ($options['header_layout'] != 3):
                                    if (!empty($menu_locations['top-menu'])):
                                        wp_nav_menu(array('theme_location' => 'top-menu', 'menu_class' => 'top-navigation hidden-sm hidden-xs', 'container' => ''));
                                    endif;
                                else:
                                    echo '<div class="top-search hidden-sm hidden-xs">
            	           <form method="get" id="searchform" action="' . home_url() . '">
                	    <div class="input-group">
                 		<span class="input-group-addon"><i class="fa fa-search"></i></span>
                		<input type="text" class="form-control" name="s" id="s" placeholder="' . __('Type your keywords...', 'framework') . '">
                 	   </div>
              	          </form>
                          </div>';
                                endif;
                                echo '<a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a>
                            </div>';
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
<?php if (!empty($menu_locations['primary-menu'])) { ?>
                    <div class="main-menu-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <nav class="navigation">
    <?php wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => 'sf-menu', 'container' => '', 'walker' => new imic_mega_menu_walker)); ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php } ?>
            </header>
            <!-- End Site Header -->
            <?php
             $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
             $flag=imic_cat_count_flag();
             $page_for_posts = get_option('page_for_posts');
			 $show_on_front = get_option('show_on_front');
			  if (is_home()) {
                $id = $page_for_posts;
            } elseif (is_404() || is_search()) {
                $id = '';
            }
     elseif(function_exists( 'is_shop' )&& is_shop()) {
                  $id= get_option('woocommerce_shop_page_id');
               } 
               elseif ($flag==0) {
                  $id=''; 
               }
 else {
                $id = get_the_ID();
            }
             if ((!is_front_page()) || $show_on_front == 'posts'||(!is_page_template('template-home.php')&&!is_page_template('template-h-second.php')&&!is_page_template('template-h-third.php'))) {
                if (is_404() || is_search()||$flag==0) {
                    $custom = array();
                } else {
                    $custom = get_post_custom($id);
                }
				 $header_image = get_post_meta($id,'imic_header_image',true);
				
                                 if (is_category() || !empty($term->term_id)) {
                                   global $cat;
                                      if(!empty($cat)){
                                       $term_taxonomy='category';
                                       $t_id = $cat; // Get the ID of the term we're editing
                                   }else{
                                       $term_taxonomy=get_query_var('taxonomy');
                                       $t_id = $term->term_id; // Get the ID of the term we're editing
                                   }
                                    $header_image  = get_option($term_taxonomy . $t_id . "_image_term_id"); // Do the check
                                  }
                                 $default_header_image = $imic_options['header_image']['url'];
                if (!empty($header_image)) {
                   if (is_category() || !empty($term->term_id)) {
                        $src[0] = $header_image;
                    }
                     else {
                        $src = wp_get_attachment_image_src($header_image, 'Full');
                    }
                } else {
		  $src[0] = $default_header_image;
		}?>
                <!-- Start Nav Backed Header -->
                <?php $header_options = get_post_meta($id,'imic_pages_Choose_slider_display',true); 
						if($header_options==0||$header_options=='') { ?>
                <div class="nav-backed-header parallax" style="background-image:url(<?php echo $src[0]; ?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <ol class="breadcrumb">
                                    <?php
                                    if (function_exists('bcn_display_list')) {
                                        bcn_display_list();
                                    }
                                    ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else { 
			include(locate_template('pages_slider.php')); } ?>
                <!-- End Nav Backed Header --> 
                <!-- Start Page Header -->
                <div class="page-header">
                    <div class="container">
                        <div class="row">
                            <?php
                            if (is_search()) {
                                echo '<div class="col-md-12 col-sm-12"><h1>';
                                printf(__('Search Results for :  %s', 'framework'), get_search_query());
                                echo'</h1>
                                  </div>';
                            } else if (is_404()) {
                                echo '<div class="col-md-12 col-sm-12"><h1>';
                                _e('Error 404 - Not Found', 'framework');
                                echo'</h1>
                                  </div>';
                            } elseif (is_author()) {
                                global $author;
                                $userdata = get_userdata($author);
                                echo '<div class="col-md-8 col-sm-8">
                                    <h1>' . __('All Posts For - ', 'framework') . $userdata->display_name . '</h1>
                                  </div>';
                            } else if (get_post_type($id) == 'page') {
                                $gallery_filter_columns_layout = get_post_meta(get_the_ID(),'imic_gallery_filter_columns_layout',true);
                                if (($gallery_filter_columns_layout == 2) || ($gallery_filter_columns_layout == 3) || ($gallery_filter_columns_layout == 4)) {
                                    $colmd_class = "col-md-6";
                                } else {
                                    $colmd_class = "col-md-12";
                                }
                                 $imic_post_custom_title = !empty($custom['imic_post_page_custom_title'][0]) ? $custom['imic_post_page_custom_title'][0] : get_the_title($id);
                                     $event_cat= get_query_var('event_cat');
                                     $event_cat= !empty($event_cat)?$event_cat:'';
                                         echo '<div class="' . $colmd_class . '">';
                                        if (!empty($event_cat)) {
                                            echo'<h1>' . __('All Posts For ', 'framework') . strtoupper($event_cat) . '</h1>';
                                        } else {
                                            echo'<h1>' . $imic_post_custom_title . '</h1>';
                                        }
                                        echo '</div>';
                                if (($gallery_filter_columns_layout == 2) || ($gallery_filter_columns_layout == 3) || ($gallery_filter_columns_layout == 4)) {
                                    ?>
                                    <div class="gallery-filter">
                                        <ul class="nav nav-pills sort-source" data-sort-id="gallery" data-option-key="filter">
                                        <?php $gallery_cats = get_terms("gallery-category");?>
                                            <li data-option-value="*" class="active"><a href="#"><i class="fa fa-th"></i> <span><?php _e('Show All', 'framework'); ?></span></a></li>
                                     	<?php foreach($gallery_cats as $gallery_cat) { ?>
                                            <li data-option-value=".format-<?php echo $gallery_cat->slug; ?>"><a href="#"><i class="fa <?php echo $gallery_cat->description; ?>"></i> <span><?php echo $gallery_cat->name; ?></span></a></li>
                                    	<?php } ?>
                                        </ul>
                                    </div>
                                    <?php
                                }
                            }
                           
                             else if (get_post_type($id) == 'post') {
                                            if (is_category() || is_tag()) {
                                                echo '<div class="col-md-8 col-sm-8">
                                    <h1>' . __('All Posts For - ', 'framework') . single_term_title("", false) . '</h1>
                                  </div>';
                                            } else {
                                                if ($page_for_posts == 0 && !is_single()) {
                                                    $imic_post_custom_title = __('Blog', 'framework');
                                                } else if ($page_for_posts > 0 && !is_single()) {
                                                    $imic_post_custom_title = get_the_title($page_for_posts);
                                                } else {
                                                    $imic_post_custom_title = !empty($custom['imic_post_page_custom_title'][0]) ? $custom['imic_post_page_custom_title'][0] : 'Blog';
                                                }
                                                echo '<div class="col-md-8 col-sm-8">
                                    <h1>' . $imic_post_custom_title . '</h1>
                                  </div>';
                                                if (!empty($custom['imic_post_custom_description'][0])) {
                                                    echo'<div class="col-md-4 col-sm-4">
                                        <p>' . $custom['imic_post_custom_description'][0] . '</p>
                                     </div>';
                                                } } }
                                       else if(get_post_type($id) == 'sermons') {
                                $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                                if (!empty($term->term_id)) {
                                    echo '<div class="col-md-12">
                                        <h1>' . __('All Posts For - ', 'framework') . $term->name . '</h1>
                                      </div>';
                                } else {
                                    $imic_post_custom_title = !empty($custom['imic_post_page_custom_title'][0]) ? $custom['imic_post_page_custom_title'][0] : __('Sermons','framework');
                                    $sterm = get_the_terms(get_the_ID(), 'sermons-category');
                                    echo '<div class="col-md-10 col-sm-10 col-xs-8">
                                            <h1>' . $imic_post_custom_title . '</h1>
                                          </div>';
                                    if (!empty($sterm)) {
                                        $i = 1;
                                        foreach ($sterm as $terms) {
                                            if ($i == 1) {
                                           $term_link = get_term_link($terms, 'sermons-category');
                                           echo'<div class="col-md-2 col-sm-2 col-xs-4">
                                                <a href="' . $term_link . '" class="pull-right btn btn-primary">' . __('All sermons', 'framework') . '</a>
                                                </div>';
                                                }
                                            $i++;
                                        } }} }
										else if(get_post_type($id) == 'causes') {
                                $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                                if (!empty($term->term_id)) {
                                    echo '<div class="col-md-12">
                                        <h1>' . __('All Posts For - ', 'framework') . $term->name . '</h1>
                                      </div>';
                                } else {
                                    $imic_post_custom_title = !empty($custom['imic_post_page_custom_title'][0]) ? $custom['imic_post_page_custom_title'][0] : get_the_title();
                                    $sterm = get_the_terms(get_the_ID(), 'causes-category');
                                    echo '<div class="col-md-10 col-sm-10 col-xs-8">
                                            <h1>' . $imic_post_custom_title . '</h1>
                                          </div>';
                                    if (!empty($sterm)) {
                                        $i = 1;
                                        foreach ($sterm as $terms) {
                                            if ($i == 1) {
                                           $term_link = get_term_link($terms, 'causes-category');
                                           echo'<div class="col-md-2 col-sm-2 col-xs-4">
                                                <a href="' . $term_link . '" class="pull-right btn btn-primary">' . __('All causes', 'framework') . '</a>
                                                </div>';
                                                }
                                            $i++;
                                        } }} }
                                else if(get_post_type($id) == 'staff') {
                                $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                                if (!empty($term->term_id)) {
                                    echo '<div class="col-md-12">
                                        <h1>' . __('All Posts For - ', 'framework') . $term->name . '</h1>
                                      </div>';
                                } else {
                                    $imic_post_custom_title = !empty($custom['imic_post_page_custom_title'][0]) ? $custom['imic_post_page_custom_title'][0] :__('Team','framework');
                                    $sterm = get_the_terms(get_the_ID(), 'staff-category');
                                    echo '<div class="col-md-10 col-sm-10 col-xs-8">
                                            <h1>' . $imic_post_custom_title . '</h1>
                                          </div>';
                                    if (!empty($sterm)) {
                                        $i = 1;
                                        foreach ($sterm as $terms) {
                                            if ($i == 1) {
                                           $term_link = get_term_link($terms, 'staff-category');
                                           echo'<div class="col-md-2 col-sm-2 col-xs-4">
                                                <a href="' . $term_link . '" class="pull-right btn btn-primary">' . __('All staff', 'framework') . '</a>
                                                </div>';
                                                }
                                            $i++;
                                        }}} }
                                       else if(get_post_type($id) == 'event') {
				       $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                                if (!empty($term->term_id)) {
                                    echo '<div class="col-md-12">
                                        <h1>' . __('All Posts For - ', 'framework') . $term->name . '</h1>
                                      </div>';
                                } else {
                                $imic_post_custom_title = !empty($custom['imic_post_page_custom_title'][0]) ? $custom['imic_post_page_custom_title'][0] :__('Events','framework');
                                $eterm = get_the_terms(get_the_ID(), 'event-category');
                                  echo '<div class="col-md-10 col-sm-10 col-xs-8">
                                    <h1>' . $imic_post_custom_title . '</h1>
                                  </div>';
								}
                                if (!empty($eterm)) {
                                    $i = 1;
                                    foreach ($eterm as $terms) {
                                        if ($i == 1) {
                                            $term_link = get_term_link($terms, 'event-category');
                                       echo'<div class="col-md-2 col-sm-2 col-xs-4">
                                     <a href="' . $term_link . '" class="pull-right btn btn-primary">' . __('All events', 'framework') . '</a></div>';
                                            }
                                        $i++;
                                    } } }
                                  else if (get_post_type($id) == 'product') {
                                $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                                if (!empty($term->term_id)) {
                                    echo '<div class="col-md-12">
                                        <h1>' . __('All Posts For - ', 'framework') . $term->name . '</h1>
                                      </div>';
                                } else {
                                    $variable_post_id ='';
                                    if(is_single()):
                                        $variable_post_id= get_the_ID();
                                        else:
                                        $variable_post_id= get_option('woocommerce_shop_page_id');
                                    endif;
                                    $imic_post_page_custom_title= get_post_meta($variable_post_id,'imic_post_page_custom_title',true);
                                    $imic_post_custom_title = !empty($imic_post_page_custom_title) ? $imic_post_page_custom_title : get_the_title($variable_post_id);
                                    echo '<div class="col-md-12">
                                            <h1>' . $imic_post_custom_title . '</h1>
                                          </div>';
                                   }
                            }
                            else {
                               if ($flag==1) {
                                            $imic_post_page_custom_title = get_post_meta(get_the_ID(), 'imic_post_page_custom_title', true);
                                            $imic_post_custom_title = !empty($imic_post_page_custom_title) ? $imic_post_page_custom_title : get_the_title(get_the_ID());
                                                echo '<div class="col-md-12">
                                            <h1>' . $imic_post_custom_title . '</h1>
                                          </div>'; 
                                }} ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header --> 
                    <?php
                    /**   Start Content* */
                    echo'<div class="main" role="main">
                     <div id="content" class="content full">';
                } ?>