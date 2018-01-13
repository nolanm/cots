<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class ) . $this->getCSSAnimation( $css_animation );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
/*set columns*/
$col = '';
if($blog_ppr == 1){
    $col = 12;
}elseif($blog_ppr == 2){
    $col = 6;
}elseif($blog_ppr == 3){
    $col = 4;
}else{
    $col = 3;
}
global $post;
$sticky = $ignore_sticky_posts == 'yes' ? true : false;
$query = null;   // re-sets query
$temp = $query;  // re-sets query
$args = array(
    'post_type' => 'post',
    'showposts' => $count,
    'ignore_sticky_posts' => $sticky,
    'orderby' => $order_by,
    'order' => $sort_order
);
$query = new WP_Query();
$query->query( $args );

if ( ! $query ) {
    return;
}

if(empty($count))
    $count = -1;

if(empty($color1))
    $color1 = 'rgba(1,83,229,0.75)';
if(empty($color2))
    $color2 = 'rgba(183,12,255,0.75)';

?>
<?php if( $query->have_posts() ): ?>
    <div class="row">
        <div class="consult-blog-sc <?php echo esc_attr($blog_style); ?> flw">
            <?php
                /*query*/
                
                // $query = new WP_Query('post_type=post&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$count);
                while($query->have_posts()): $query->the_post();
                    /*thumbnail id*/
                    $thumbnail_id = get_post_thumbnail_id($post->ID);
                    /*image size*/
                    if($blog_ppr == 1){
                        $thumbnail = wp_get_attachment_image($thumbnail_id, 'large' );
                    }
                    elseif ($blog_ppr == 2) {
                        $thumbnail = wp_get_attachment_image($thumbnail_id, 'large' );
                    }elseif ($blog_ppr == 3) {
                        $thumbnail = wp_get_attachment_image($thumbnail_id, 'medium' );
                    }else{
                        $thumbnail = wp_get_attachment_image($thumbnail_id, 'thumbnail' );
                    }       
            ?>
            
            <article class="blog-news-item  col-md-<?php echo esc_attr($col); ?>" itemid="<?php echo get_permalink(); ?>" itemscope itemtype="http://schema.org/BlogPosting">
                <div class="sc-blog-item" itemprop="mainEntityOfPage">
                    <!-- Modified date -->
                    <span itemprop="dateModified" class="screen-reader-text">
                        <time datetime="<?php echo esc_attr( get_the_modified_time( 'Y-m-d' ) ); ?>">
                            <?php the_modified_date(); ?>
                        </time>
                    </span>
                    <!-- //Modified date -->
                    <span class="screen-reader-text" itemprop="author"><?php the_author(); ?></span>

                    <!--blog style 1-->
                    <?php if($blog_style == 'consult-blog-style-1' ): ?>    
                        <?php /*blog info*/ ?>
                        <div class="blog-post-info">
                            <div class="post-cat">
                                <span class="cate"><?php echo domica_blog_categories();/*post categories*/ ?></span>
                                <span class="ion-calendar"></span>
                                    <span class="blog-post-date" itemprop="datePublished" content="<?php echo get_the_time('c'); ?>"><?php echo domica_post_date();/*post date*/ ?></span>
                            </div>
                            <div class="blog-post-name">
                                <h3 class="post-tit" itemprop="headline"><a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                            <div class="blog-post-sumary" itemprop="description"><?php the_excerpt(); ?></div>
                            <?php if(!is_single()) : ?>
                                <a href="<?php the_permalink(); ?>" class="blog-btn-more"><?php esc_html_e('Continue', 'domica'); ?></a>
                            <?php endif; ?>
                            
                        </div>
                    <?php  elseif($blog_style == 'consult-blog-carousel-style'):  ?>
                        <?php /*blog info*/ ?>
                        <div class="blog-post-info">
                            <div class="post-cat">
                                <span class="cate"><?php echo domica_blog_categories();/*post categories*/ ?></span>
                                <span class="ion-calendar"></span>
                                    <span class="blog-post-date" itemprop="datePublished" content="<?php echo get_the_time('c'); ?>"><?php echo domica_post_date();/*post date*/ ?></span>
                            </div>
                            <div class="blog-post-name">
                                <h3 class="post-tit" itemprop="headline"><a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                            <div class="blog-post-sumary" itemprop="description"><?php the_excerpt(); ?></div>
                            <?php if(!is_single()) : ?>
                                <a href="<?php the_permalink(); ?>" class="blog-btn-more"><?php esc_html_e('Continue', 'domica'); ?></a>
                            <?php endif; ?>
                            
                        </div>
                    <?php endif; ?>
                    <!--end of blog style 1-->
                </div>
            </article>
            <?php
                endwhile;
            ?>
        </div>
    </div>
<?php 
    endif;
    $query = null;
    $query = $temp; // Reset
?>