<?php
/**
 * @var string $before_widget
 * @var string $after_widget
 * @var string $title
 * @var string $number
 */

echo wp_kses_post($before_widget );
echo wp_kses_post($title);

$query = new WP_Query('post_type=campaign&post_status=publish&ignore_sticky_posts=true&posts_per_page='.$number);

if( $query->have_posts() ):
    echo '<div class="flw">';
    while($query->have_posts()): $query->the_post();
?>
    <div class="widget_related_causes_thumbnail_item flw">
	    	<div class="related-causes-thumbnail-img">
	        <a href="<?php esc_url(the_permalink()); ?>">
	         	<?php
	                if(has_post_thumbnail()){
	                    the_post_thumbnail(
	                        array(70,70, true),
	                        array('alt' => get_the_title())
	                    );
	                }else{
	                	echo '<img class="widget-cause-thumbnail-default-img" alt="'. get_the_title() .'" src="'. get_template_directory_uri().'/images/thumbnail-default.jpg' .'">';
	                }
	            ?>
	       </a>
	    </div>
	    <dl class="related-causes-thumbnail-sumary">
			<dt><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></dt>
			<dd>
				<?php $campaign = charitable_get_current_campaign(); ?>
				<?php echo charitable_format_money( $campaign->get_donated_amount() ); ?>
				of
				<?php echo charitable_format_money( $campaign->get_goal() ); ?>
			</dd>
		</dl>
    </div>
<?php
    endwhile;
    echo '</div>';
endif;
wp_reset_postdata();
echo wp_kses_post($after_widget);