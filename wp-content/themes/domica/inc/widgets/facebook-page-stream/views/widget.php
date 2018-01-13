<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * @var $number
 * @var $before_widget
 * @var $after_widget
 * @var $title
 * @var $posts
 */
echo wp_kses_post($before_widget );
echo wp_kses_post($title);
?>
	<div class="wrap-flickr">
		<ul>
			<?php
			foreach ( $posts as $post ) {
				if ( isset( $post->message ) ) {
					echo esc_attr('<li>' . $post->message . '</li>');
				}
			}
			?>
		</ul>
	</div>
<?php echo wp_kses_post($after_widget); ?>