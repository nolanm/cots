<?php
/**
 * Campaign sharing options.
 *
 * @var string $before_widget
 * @var string $after_widget
 * @var string $title
 */

echo wp_kses_post($before_widget );
echo wp_kses_post($title);
$permalink  = urlencode( get_the_permalink() );
$title 	    = urlencode( get_the_title() );

?>
<ul class="widget_sharing">
	<li class="share-facebook">
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr($permalink) ?>" target="_blank" class="icon ion-social-facebook"></a>
	</li>
	<li class="share-googleplus">
		<a href="https://plus.google.com/share?url=<?php echo esc_attr($permalink) ?>" target="_blank" class="ion-social-googleplus"></a>
	</li>
	<li class="share-twitter">
		<a href="http://twitter.com/home?status=<?php echo esc_attr($title) ?>%20<?php echo esc_attr($permalink) ?>" target="_blank" class="icon ion-social-twitter"></a>
		<a href="https://twitter.com/share?text=Instagram%20Blog&url=http://blog.instagram.com/post/164717323080/170826-sza&hashtags=instagram&via=instagram"></a>
	</li>
	<li class="share-pinterest">
		<a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_attr($permalink) ?>&amp;description=<?php echo esc_attr($title) ?>" target="_blank" class="icon ion-social-pinterest"></a>
	</li>
</ul>

<?php
wp_reset_postdata();
echo wp_kses_post($after_widget);