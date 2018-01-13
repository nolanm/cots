<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package bridge
 */

if ( ! is_active_sidebar( 'blog-widget' ) ) {
	return;
}
?>

<div id="theme-right-sidebar" class="widget-area flw" role="complementary">
	<?php dynamic_sidebar( 'blog-widget' ); ?>
</div>