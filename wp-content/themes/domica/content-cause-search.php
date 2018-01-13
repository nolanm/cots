<?php
/**
 * Campaign content block.
 *
 * This template is only used if Charitable is active.
 *
 */
$thumbnail_id = get_post_thumbnail_id($post->ID);
$campaign = charitable_get_current_campaign();
$progress = $campaign->get_percent_donated_raw();
?>
<div class="campaign block">

    <?php if(!empty($thumbnail_id)): ?>
       <div class="campaign-image">
            <a href="<?php esc_url(the_permalink()); ?>">
            <?php  
                    echo wp_get_attachment_image($thumbnail_id, 'domica-post-thumbnail-list');
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
                    <a href="<?php esc_url(the_permalink()) ?>" title="<?php the_title_attribute() ?>" target="_parent"><?php the_title() ?></a>
                </h5>
            </div>
            <div class="campaign-category">
                <?php domica_charitable_category() ?>
            </div>
            <div class="campaign-description">  
                <?php echo esc_attr($campaign->description); ?>
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
