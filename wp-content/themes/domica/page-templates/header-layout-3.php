<?php
/*hide bread crumbs when install theme*/
$hide = '';
if(!function_exists('FW')){
    $hide = 'bread-hide';
}
?>
<div class="search-overlay">
</div>
<header class="header-layout-3 <?php echo esc_attr($hide); ?>" itemscope itemtype="http://schema.org/WPHeader">
    <?php 
        /*menu stick*/
        $has_stick = (get_theme_mod('c_menu_stick_3', false)) ? 'menu-stick' : '';
    ?>
    <div class="theme-header flw">
        <div class="theme-menu-box <?php echo esc_attr($has_stick); ?>">
            <?php domica_header_edit_location('hd3');/*header edit location*/ ?>
                <div class="">
                    <div class="theme-wrap-menu-flex">
                        <?php domica_logo_image('header-3');/*logo*/ ?>
                        <div class="theme-wrap-primary-menu" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                            <span class="screen-reader-text">
                                <?php esc_html_e( 'Primary Menu', 'domica' ); ?>
                            </span>
                            <?php
                                /*primary menu*/
                                if(has_nav_menu('primary')):
                                    wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'theme-primary-menu', 'container' => '' ) );
                                else: ?>
                                    <a class="add-menu-suggest" href="<?php echo esc_url( get_admin_url() . 'nav-menus.php' ); ?>"><?php esc_html_e( 'Add Menu', 'domica' ); ?></a>
                                <?php endif; ?>
                        </div>
                        <?php /*search button*/ ?>
                       <div class="right-btn">
                            <button class="ion-android-search" id="ht-btn-search"></button>
                        </div>
                    </div>
                </div>
        </div>      
        <?php get_template_part('page-templates/page', 'header');/* breadcrumbs */ ?>
    </div>
    <!--top search-->
    <div class="topsearch">
        <?php 
            /*search form*/ 
            domica_top_search_form();
        ?>
    </div>
    <!--end of top search-->
</header>
