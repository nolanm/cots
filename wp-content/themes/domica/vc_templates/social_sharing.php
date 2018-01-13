<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$permalink  = urlencode( get_the_permalink() );
$title 	    = urlencode( get_the_title() );

?>
<aside class="widget-campaign widget-sharing">
	<div class="title-wrapper">
		<h6 class="widget-campaign-title"><?php echo esc_html($social_sharing_title); ?></h6>
	</div>

	<ul class="widget_sharing">
		<li class="share-facebook">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($permalink) ?>" target="_blank" class="icon ion-social-facebook"></a>
		</li>
		<li class="share-googleplus">
			<a href="https://plus.google.com/share?url=<?php echo esc_url($permalink) ?>" target="_blank" class="ion-social-googleplus"></a>
		</li>
		<li class="share-twitter">
			<a href="http://twitter.com/home?status=<?php echo esc_url($title); ?>%20<?php echo esc_url($permalink) ?>" target="_blank" class="icon ion-social-twitter"></a>
			<a href="https://twitter.com/share?text=Instagram%20Blog&url=http://blog.instagram.com/post/164717323080/170826-sza&hashtags=instagram&via=instagram"></a>
		</li>
		<li class="share-pinterest">
			<a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url($permalink) ?>&amp;description=<?php echo esc_url($title); ?>" target="_blank" class="icon ion-social-pinterest"></a>
		</li>
	</ul>
</aside>

<?php
wp_reset_postdata();