<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$cause_link_grid = get_theme_mod( 'cause_link_grid' );
$cause_link_list = get_theme_mod( 'cause_link_list' );


/*set columns*/
$col = '';
$cause_class = '';
if($cause_style == 'cause-list' || $cause_style == 'cause-standard') :
    $col = 1;
    $wrapper = 'list';
    $active_list = 'current';
else :
    $wrapper = 'grid';
    $active_grid = 'current';
    $class = 'campaign-grid campaign-grid-'.$cause_per;
endif;
$cause_class = $class.' '.$cause_style;

if($cause_count != ''): 
    /*query*/
    global $post;
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    $query = new WP_Query('post_type=campaign&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$cause_count.'&paged='.$paged);
    ?>
    <div class="campaigns-<?php echo esc_attr($wrapper); ?>-wrapper">

        <div class="campaigns-topbar-filter">
            <div class="campaigns-result-count">
                <?php
                $paged    = max( 1, $query->get( 'paged' ) );
                $per_page = $query->get( 'posts_per_page' );
                $total    = $query->found_posts;
                $first    = ( $per_page * $paged ) - $per_page + 1;
                $last     = min( $total, $query->get( 'posts_per_page' ) * $paged );

                if ( $total <= $per_page || -1 === $per_page ) {
                    /* translators: %d: total results */
                    printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'domica' ), $total );
                } else {
                    /* translators: 1: first result 2: last result 3: total results */
                    printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'domica' ), $first, $last, $total );
                }
                ?>
            </div>
            <form class="campaigns-sorting">
                <span>Sort By:</span>
                <select name="sortby" class="consult-dropdown-list">
                    <?php 
                        $orderby_options = array(
                            'default' => 'Default',
                            'post_date' => 'Date',
                            'post_title' => 'Title',
                        );
                        foreach( $orderby_options as $value => $label ) {
                            echo "<option ".selected( $_GET['sortby'], $value )." value='$value'>$label</option>";
                        }

                        $modifications = array();
                        if( empty( $_GET['sortby'] ) && $_GET['sortby'] == 'default' ) {
                            $modifications = array(
                                'orderby' => 'ID',
                                'order' => 'ASC'
                            );
                        }
                        if( !empty( $_GET['sortby'] ) && $_GET['sortby'] == 'post_date' ) {
                            $modifications = array(
                                'orderby' => 'date',
                                'order' => 'DSC'
                            );
                        }
                        if( !empty( $_GET['sortby'] ) && $_GET['sortby'] == 'post_title' ) {
                            $modifications = array(
                                'orderby' => 'title',
                                'order' => 'ASC'
                            );
                        }

                        $args = array_merge( 
                            $query->query_vars, 
                            $modifications 
                        );
                        $campaigns = new WP_Query($args);
                    ?>
                </select>
            </form>

            <?php if($cause_style == 'cause-grid') : ?>
            <form class="campaigns-category-filter">
                <span>Category:</span>
                <select name="category-filter" class="consult-dropdown-list" id="category-filter">
                    <option value="all-cate">All</option>
                    <?php
                        $cate_options = get_terms('campaign_category');

                        foreach ( $cate_options as $cate ) {
                            $cate_label = $cate->name;
                            $cate_value = $cate->slug;
                            echo "<option ".selected( $_GET['category-filter'], $cate_value )." value='$cate_value'>$cate_label</option>";
                        }

                        $modifications_cate = array();
                        if ( !empty( $_GET['category-filter'] ) && $_GET['category-filter'] !== 'all-cate' ) {
                            $selected_cate =  $_GET['category-filter'];
                            $modifications_cate = array(
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'campaign_category',
                                        'field' => 'slug',
                                        'terms' => ".$selected_cate."
                                    )
                                )
                            );
                        }
                        $args = array_merge( 
                            $query->query_vars,
                            $modifications_cate,
                            $modifications
                        );
                        $campaigns = new WP_Query($args);
                    ?>
                </select>
            </form>
            <?php endif; ?>

            <div class="campaigns-view">
                <a href="<?php echo esc_attr($cause_link_list); ?>" class="ion-ios-list-outline <?php echo esc_attr($active_list); ?>"></a>
                <a href="<?php echo esc_attr($cause_link_grid); ?>" class="ion-grid <?php echo esc_attr($active_grid); ?>"></a>
            </div>
        </div><!-- .campaigns-topbar-filter  -->
        
        
        <div class="">
            <div class="campaign-loop <?php echo esc_attr($cause_class); ?>">
            <?php
                   
                if( $campaigns->have_posts() ):
                    while($campaigns->have_posts()): $campaigns->the_post();
                    /*thumbnail id*/
                        $thumbnail_id = get_post_thumbnail_id($post->ID);
                        if($cause_style == 'cause-grid') :
                            $thumbnail = wp_get_attachment_image($thumbnail_id, 'bridge-post-thumbnail-grid');
                        endif;
                        if($cause_style == 'cause-list') :
                            $thumbnail = wp_get_attachment_image($thumbnail_id, 'bridge-post-thumbnail-list');
                        endif;
                        if($cause_style == 'cause-standard') :
                            $thumbnail = wp_get_attachment_image($thumbnail_id, 'bridge-post-thumbnail-standard');
                        endif;
                        $campaign = charitable_get_current_campaign();
                        $progress = $campaign->get_percent_donated_raw();
                        ?>
                        <div class="campaign block">

                            <?php if(!empty($thumbnail_id)): ?>
                               <div class="campaign-image">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php  
                                            echo wp_kses($thumbnail,array(
                                                'img' => 'src'
                                            ));
                                        ?>  
                                    </a>
                               </div>
                                <?php endif; 

                                if ( false === $progress ) :
                                    return;
                                endif;
                                ?>
                                <div class="campaign-box">
                                    <div class="title-wrapper">
                                        <h5 class="block-title">
                                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" target="_parent"><?php the_title() ?></a>
                                        </h5>
                                    </div>
                                    <div class="campaign-category">
                                        <?php domica_charitable_category() ?>
                                    </div>
                                    <div class="campaign-description">  
                                        <?php echo esc_attr($campaign->description)?>
                                    </div>
                                    <ul class="campaign-stats">
                                        <li class="progress progress-charitable">
                                            <div class="progress-bar" role="progress-bar" aria-valuenow="<?php echo esc_attr( $progress ) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </li>
                                        <li class="campaign-pledged">
                                            <span><?php echo charitable_format_money( $campaign->get_donated_amount() ) ?></span>
                                            <?php _e( 'RAISED', 'domica' ) ?>               
                                        </li>
                                        <li class="campaign-pledged">
                                            <span><?php echo charitable_format_money( $campaign->get_goal() ) ?></span>
                                            <?php _e( 'GOAL', 'domica' ) ?>               
                                        </li>
                                        <li class="campaign-raised">
                                            <span><?php echo number_format( $progress, 2 ) ?>%</span>
                                            <?php _e( 'COMPLETED', 'domica' ) ?>
                                        </li>
                                    </ul>
                                </div>
                        </div>

            <?php   endwhile;
                endif;
                /*reset query*/
                wp_reset_postdata();
                ?>
            </div><!-- campaign-loop -->
        </div>

        <!-- navigation -->
        <?php
            if ( $query->max_num_pages > 1 ) :
        ?>
        <div class="">
            <nav class="campaign-pagination">
                <?php
                    if (!$current = get_query_var('paged')) :
                        $current = 1;
                    endif;
                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
                        'format'       => '',
                        'current'      => $current,
                        'total'        => $query->max_num_pages,
                        'prev_text'    => '&lt; PREV',
                        'next_text'    => 'NEXT &gt;',
                        'type'         => 'list',
                    ) );
                ?>
            </nav>
        </div>

    </div>
    <?php endif ?>
<?php endif; ?>