<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>
<aside class="widget-campaign widget_search">
	<div class="title-wrapper">
		<h6 class="widget-campaign-title">
			<?php echo esc_html($search_causes_title); ?>
		</h6>
	</div>
	<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>" >
	    <input type="text" class="search-field" placeholder="<?php esc_attr__('Enter keyword...', 'domica') ?>" value="<?php get_search_query() ?>" name="s" id="s" />
	    <input type="hidden" name='post_type' value="campaign">
	    <button type="submit" class="search-submit ion-android-search"></button>
	</form>
</aside>
<?php
wp_reset_postdata();
