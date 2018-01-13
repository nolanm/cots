<?php
/**
 * Day View Loop
 * This file sets up the structure for the day loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/loop.php
 *
 * @version 4.4
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php

global $more, $post, $wp_query;
$more = false;
$current_timeslot = null;

?>

<div id="tribe-events-day" class="tribe-events-loop">
	<div class="tribe-events-day-time-slot">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php do_action( 'tribe_events_inside_before_loop' ); ?>

		<?php if ( $current_timeslot != $post->timeslot ) :
		$current_timeslot = $post->timeslot; ?>
	</div>
	<!-- .tribe-events-day-time-slot -->

	<div class="tribe-events-day-time-slot">
		<h5><?php echo esc_html($current_timeslot); ?></h5>
		<?php endif; ?>
		<!-- Event  -->
		<?php
		$postID = get_the_ID();
        $permalink  = urlencode( get_the_permalink());
        $title      = urlencode( get_the_title() );
        $thumbnail_id = get_post_thumbnail_id($post->ID);
		?>
		<div id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes() ?>">
			<div class="event-item">
				<div class="event-infor">
	                <?php echo domica_custom_tribe_event_dateformat($postID); ?>  
	                <div class="event-infor-group">
	                    <div class="event-infor-detail">
	                        <h4 class="event-title">
	                            <a href="<?php esc_url(the_permalink()); ?>" class="sv-custom-color"><?php the_title(); ?></a> 
	                        </h4>
	                        <div class="event-location">
	                            <span class="ev-tit"><?php echo esc_html__('Location:', 'domica') ;?></span>
	                            <span><?php echo tribe_get_address(); ?></span>
	                        </div>
	                        <div class="event-date">
	                            <span class="ev-tit"><?php echo esc_html__('Date:', 'domica') ;?></span>
	                            <span><?php echo tribe_get_start_date(null,true, 'M d, Y @ G:ia', null);?></span> 
	                        </div>
	                    </div>
	                    <div class="flex-parent-items">
	                        <a href="<?php esc_url(the_permalink()); ?>" class="event-register"><?php esc_html_e('Register', 'domica'); ?></a>
	                        <div class="social-share-btn">
	                            <span class="ion-android-share-alt"></span>
	                            <div class="group-btn">
	                                <div class="event-social-links">
	                                    <span class="fb-share">
	                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($permalink) ?>" target="_blank" class="icon ion-social-facebook"></a>
	                                    </span>
	                                    <span class="tw-share">
	                                        <a href="http://twitter.com/home?status=<?php echo esc_html($title) ?>%20<?php echo esc_url($permalink) ?>" target="_blank" class="icon ion-social-twitter"></a>
	                                        <a href="https://twitter.com/share?text=Instagram%20Blog&url=http://blog.instagram.com/post/164717323080/170826-sza&hashtags=instagram&via=instagram"></a>
	                                    </span>
	                                    <span class="mail-share">
	                                        <a href="mailto:?subject=Check this post - <?php echo esc_html($title) ?> &amp;body= <?php echo esc_url($permalink) ?>&amp;title="<?php echo esc_html($title) ?>" email"="" class="ion-ios-email"></a>
	                                    </span>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
			</div>
		</div>

		<?php do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile; ?>

	</div>
	<!-- .tribe-events-day-time-slot -->
</div><!-- .tribe-events-loop -->
