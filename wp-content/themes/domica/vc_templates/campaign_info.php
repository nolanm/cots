<?php

$campaign = charitable_get_current_campaign();
$progress = $campaign->get_percent_donated_raw();

if ( false === $progress ) :
	return;
endif;
?>
<aside class="widget-campaign widget-sharing">
	<div class="widget_campaign_info">
		<div class="campaign-stats">
			<div class="campaign-numbers">	
				<div class="campaign-pledged">
					<h4><?php echo charitable_format_money( $campaign->get_donated_amount() ) ?></h4>
					<span><?php esc_html_e( 'RAISED', 'domica' ) ?></span>
				</div>
				<div class="campaign-pledged text-right">
					<h4><?php echo charitable_format_money( $campaign->get_goal() ) ?></h4>
					<span><?php esc_html_e( 'GOAL', 'domica' ) ?></span>             
				</div>
			</div>
			<div class="progress progress-charitable">
				<div class="progress-bar" role="progress-bar" aria-valuenow="<?php echo esc_attr( $progress ) ?>" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
		<p class="campaign-note">* This cause will end on <?php echo esc_html( $campaign->get_end_date( 'j F Y' ) ) ?></p>

		<?php domica_charitable_get_donate_button(); ?>
	</div>
</aside>
<?php
wp_reset_postdata();
