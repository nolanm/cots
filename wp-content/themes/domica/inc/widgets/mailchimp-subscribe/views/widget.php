<?php

/**
 * @var $number
 * @var $before_widget
 * @var $after_widget
 * @var $title
 * @var $flickr_id
 */

echo wp_kses_post($before_widget);
// echo wp_kses_post($title); ?>
<h4 class="widget_mailchimp footer-widget-title"><?php echo esc_html('Newsletter', 'domica'); ?></h4>
<div class="footer-email-widget flw">
	<p><?php echo esc_html('Subscribe to our newsletter system now to get latest news from us', 'domica'); ?></p>
	<form action="<?php echo esc_url($form_action) ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer-email-form flw">
		<!-- <label for="mce-NAME" class="footer-name-label flw wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			<input type="text" placeholder="<?php esc_attr_e('Your name', 'domica'); ?>" name="NAME" id="mce-NAME" required>
		</label> -->
		<label for="mce-EMAIL" class="footer-email-label flw wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			<input type="email" placeholder="<?php esc_attr_e('Enter your email', 'domica'); ?>" name="EMAIL" id="mce-EMAIL" required>
		</label>
		<button id="mc-embedded-subscribe" type="submit" name="subscribe" class="footer-email-submit flw wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;"><?php esc_html_e('Subscribe', 'domica' ); ?></button>
	</form>
</div>
<?php echo wp_kses_post($after_widget); ?>