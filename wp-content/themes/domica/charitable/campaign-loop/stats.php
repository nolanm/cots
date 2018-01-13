<?php
/**
 * Campaign stats.
 *
 * Override this template by copying it to your-child-theme/charitable/campaign-loop/stats.php
 *
 * @package Reach
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

/**
 * @var 	Charitable_Campaign
 */
$campaign = $view_args['campaign'];

/**
 * Get the progress as a number. i.e. 66 = 66%.
 *
 * If the campaign does not have a goal, this will equal false.
 *
 * @var 	int|false
 */
$progress = $campaign->get_percent_donated_raw();

if ( false === $progress ) :
	return;
endif;
?>

<ul class="campaign-stats">	
	<li class="progress progress-charitable">
		<div class="progress-bar" role="progress-bar" aria-valuenow="<?php echo esc_attr( $progress ) ?>" aria-valuemin="0" aria-valuemax="100"></div>
	</li>
	<li class="campaign-pledged">
		<span><?php echo charitable_format_money( $campaign->get_donated_amount() ) ?></span>
		<?php _e( 'RAISED', 'domica' ) ?>               
	</li>
	<li class="campaign-pledged">
		<span><?php echo charitable_format_money( $campaign->get_goal() ) ?></span>
		<?php _e( 'GOAL', 'domica' ) ?>               
	</li>
	<li class="campaign-raised">
		<span><?php echo number_format( $progress, 2 ) ?>%</span>
		<?php _e( 'COMPLETED', 'domica' ) ?>
	</li>
</ul>
