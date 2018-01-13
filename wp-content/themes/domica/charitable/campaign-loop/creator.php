<?php
/**
 * Campaign creator.
 *
 * Override this template by copying it to yourtheme/charitable/campaign-loop/creator.php
 *
 * @package Reach
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

/**
 * @var 	Charitable_Campaign
 */
$campaign  = $view_args['campaign'];

/**
 * User ID of the campaign creator.
 *
 * @var 	int
 */
$author_id = $campaign->get_campaign_creator();

?>
