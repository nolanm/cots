<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * @var $number
 * @var $before_widget
 * @var $after_widget
 * @var $title
 * @var $tweets
 */

echo wp_kses_post($before_widget );
echo esc_html( $title);
?>
	<div class="wrap-flickr">
		<ul>
			<?php
			foreach ( $tweets as $tweet ) {
				echo '<li>' . esc_html($tweet->text) . '</li>';
			}
			?>
		</ul>
	</div>
<?php echo wp_kses_post($after_widget) ?>