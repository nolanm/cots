<?php
/**
 * Displaying the page template infor
 */

/*Customizer/Metabox variable*/
$c_page_header = get_theme_mod('c_page_header', '1');
$c_breadcrumbs = get_theme_mod('c_crumbs', '1');
$c_header_text = get_theme_mod('c_header_text', '');
/*page id*/
$pid = get_queried_object_id();
$p_page_header = (function_exists('fw_get_db_post_option')) ? fw_get_db_post_option($pid, 'p_page_header') : '1';
$cs_page_header = (function_exists('fw_get_db_post_option')) ? fw_get_db_post_option($pid, 'cs_page_header') : '1';

/*custom post title*/
$post_title = (function_exists('fw_get_db_post_option')) ? fw_get_db_post_option($pid, 'spc_opt') : '';

/*Kirki customizer option*/
$c_header_bg = get_theme_mod( 'c_header_bg', 'bg_color' );
$c_header_bg_color = get_theme_mod( 'c_header_bg_color' , '#0b6070' );
$c_header_bg_image = get_theme_mod( 'c_header_bg_image' , false );
$c_header_text_color = get_theme_mod('c_header_text_color', '');
$img = wp_get_attachment_image_src($c_header_bg_image, 'full');
$c_blog_title = get_theme_mod('blog_title', $default = 'Blog');
/*set default value*/
$final_page_header = $c_page_header;
$final_header_text = $c_header_text;
$final_header_text_color = '';
$final_header = '';
$final_text_cus_color = '';

$final_bg_bread = '';

/*page title*/
$page_title = get_the_title();

/*blog header customizer*/
$b_header_title = get_theme_mod('b_header_title', 'Blog');
$b_header_text = get_theme_mod('b_header_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur suscipit nulla ligula, nec tincid unt tortor pulvinar a. Proin nunc leo, imperdiet nec risus non.');

/*========can be delete on kirki 3.0=======*/
if($c_header_bg_image == true){
   $final_bg_bread = 'style="background-image:url(' . $img[0] . ');"';
}
/*========//can be delete on kirki 3.0=======*/
$gadget = '';
if(function_exists('FW')){
    if(is_page() || is_single()){

        /*variables*/
        $gadget = $p_page_header['gadget'];
        /*page header value*/
        if(isset($gadget) && $gadget != 'default'){
            $final_page_header = $gadget;
        }

        /*page title*/        
        if($gadget == '1' && $p_page_header['1']['page_header_title'] != ''){
            $page_title = $p_page_header['1']['page_header_title'];
        }
        
        /*header text align*/
        if(isset($gadget) && $gadget == '1' && $p_page_header['1']['page_header_text'] != ''){
            $final_header_text = 'style="text-align: '.$p_page_header['1']['page_header_text'].'"';
        }
        /*header text color*/
        if(isset($gadget) && $gadget == '1' && $p_page_header['1']['page_header_text_color'] != ''){
            $final_header_text_color = 'style="color: '.$p_page_header['1']['page_header_text_color'].'"';
        }
        if(isset($gadget) && $gadget == '1' && $p_page_header['1']['page_header_text'] != '' && $p_page_header['1']['page_header_text_color'] != ''){
            $final_header = 'style="text-align: '.$p_page_header['1']['page_header_text'].';color: '.$p_page_header['1']['page_header_text_color'].'"';
        }
        /*Override value if enable custom page header*/
        if(isset($gadget) && $gadget == '1'){

            $p_breadcrumb_bg_select = $p_page_header['1']['page_header_bg'];

            if($p_breadcrumb_bg_select['gadget'] == 'color_bg'){
                $final_bg_bread = 'style="background:' . $p_breadcrumb_bg_select['color_bg']['color_bg_data'] . ';"';
            }else{
                if(!empty($p_breadcrumb_bg_select['img_bg']['img_bg_data'])):
                    $final_bg_bread = 'style="background-image:url(' . $p_breadcrumb_bg_select['img_bg']['img_bg_data']['url'] . ');"';
                endif;
            }
        }
    }
    /*custom title and header text on sing post*/
    if(is_single()){
        if(isset($post_title['gadget']) && $post_title['gadget'] == 'yes'){
            $final_header_text = $post_title['yes']['textarea_header'];
        }
    }
    if(is_home()){
        $final_header_text = $b_header_text;
    }
    if(class_exists( 'WooCommerce' ) && is_shop()){
        $final_header_text = get_theme_mod('shop_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur suscipit nulla ligula, nec tincid unt tortor pulvinar a. Proin nunc leo, imperdiet nec risus non.');
    }
    if(class_exists( 'WooCommerce' ) && is_product()){
        $final_header_text = get_theme_mod('shop_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur suscipit nulla ligula, nec tincid unt tortor pulvinar a. Proin nunc leo, imperdiet nec risus non.');
    }
    if(is_singular($post_types = 'campaign')) {
        /*variables*/
        $gadget = $cs_page_header['gadget'];
        /*page header value*/
        if(isset($gadget) && $gadget != 'default'){
            $final_page_header = $gadget;
        }

        /*page title*/        
        if($gadget == '1' && $cs_page_header['1']['page_header_title'] != ''){
            $page_title = $cs_page_header['1']['page_header_title'];
        }
        
        /*header text*/
        if(isset($gadget) && $gadget == '1' && $cs_page_header['1']['page_header_text'] != ''){
            $final_header_text = $cs_page_header['1']['page_header_text'];
        }

        /*Override value if enable custom page header*/
        if(isset($gadget) && $gadget == '1'){

            $p_breadcrumb_bg_select = $cs_page_header['1']['page_header_bg'];

            if($p_breadcrumb_bg_select['gadget'] == 'color_bg'){
                $final_bg_bread = 'style="background:' . $p_breadcrumb_bg_select['color_bg']['color_bg_data'] . ';"';
            }else{
                if(!empty($p_breadcrumb_bg_select['img_bg']['img_bg_data'])):
                    $final_bg_bread = 'style="background-image:url(' . $p_breadcrumb_bg_select['img_bg']['img_bg_data']['url'] . ');"';
                endif;
            }
        }
    }
}

$shop_title = get_theme_mod('shop_title', 'Shop');

/*not display on 404 page*/
if(!is_404() && $final_page_header == '1'): ?>
    <nav class="bridge-breadcrumb flw" <?php echo wp_kses_post($final_bg_bread); ?>>
        <div class="container">
            <div class="bread flw" <?php echo wp_kses_post($final_header); ?> itemscope itemtype="http://schema.org/WebPage">
                <h1 class="page-title" itemprop="name" <?php echo wp_kses_post($final_header); ?> >
                    <?php
                    if ( is_day() ) :
                        printf( esc_html__( 'Daily Archives: %s', 'domica'), get_the_date() );
                    elseif ( is_month() ) :
                        printf( esc_html__( 'Monthly Archives: %s', 'domica'), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'domica') ) );
                    elseif (is_home()) :
                        echo esc_html($b_header_title);
                    elseif(is_author()):
                        $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
                        echo esc_html($curauth->display_name);
                    elseif ( is_year() ) :
                        printf( esc_html__( 'Yearly Archives: %s', 'domica'), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'domica') ) );
                    /*for shop page*/
                    elseif(class_exists( 'WooCommerce' ) && is_shop()):
                        // echo esc_html($shop_title);
                         esc_html_e('Shop', 'domica');
                     /*for shop detail*/
                    elseif(class_exists( 'WooCommerce' ) && is_product()) :
                        esc_html_e('Shop detail', 'domica');
                    /*event single page*/
                    elseif(is_singular($post_types = 'tribe_events')) :
                        single_post_title();
                    /*staff single page*/
                    elseif(is_singular($post_types = 'ht-staff')) :
                        esc_html_e('Pastor Single ', 'domica');
                    /*sermon single page*/
                    elseif(is_singular($post_types = 'ht-sermon')) :
                       single_post_title();
                        // echo get_the_title();
                    /*service single page*/
                    elseif(is_singular($post_types = 'ht-service')) :
                        esc_html_e('Service', 'domica');
                        // echo the_title();
                    /*campaign single page*/
                    elseif(is_singular($post_types = 'campaign')) :
                        // echo the_title();
                        if($gadget == '1' && $cs_page_header['1']['page_header_title'] != ''){
                            echo esc_html($page_title);
                        }else {
                            echo the_title();
                        }
                    elseif(is_page()) :
                        echo esc_html($page_title);
                    elseif( is_tax() ) :
                        global $wp_query;
                        $term = $wp_query->get_queried_object();
                        $title = $term->name;
                        echo esc_html($title);
                    elseif( is_search() ):
                        esc_html_e('Search results', 'domica');
                    /*single page*/
                    elseif(is_single()) :
                        if(isset($post_title['gadget']) && $post_title['gadget'] == 'yes'){
                            echo esc_html($post_title['yes']['spc_title']);
                        }elseif($gadget == '1' && $p_page_header['1']['page_header_title'] != ''){
                            echo esc_html($page_title);
                        }else{
                            // echo get_the_title();
                            esc_html_e('Blog Single', 'domica');
                            // echo esc_html($c_blog_title);
                        }
                    /*showing the category title*/
                    elseif (is_category()):
                        esc_html_e('Category : ', 'domica');
                        echo single_term_title();
                    /*end of showing category title*/
                    elseif(is_tag()) :
                        esc_html_e('Tags', 'domica');

                    elseif(is_404()) :
                        esc_html_e( '404 Page ', 'domica' );
                    else :
                        echo the_title();
                    endif;
                    ?>
                </h1>
                <?php /*breadcrumbs*/ ?>
                <?php
                    if (function_exists('fw_ext_breadcrumbs')) {
                        if($c_breadcrumbs == 1){
                            fw_ext_breadcrumbs();
                        }
                    }
                ?>
            </div>
        </div>
        <?php domica_bread_edit_location('bread');/*header edit location*/ ?>
    </nav>
<?php endif;

/*loading effect*/
$loading = get_theme_mod('loading', '0');
if($loading == 1): ?>
<div id="p-loading">
    <svg class="p-circular" viewBox="25 25 50 50">
        <circle class="p-path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<?php endif;