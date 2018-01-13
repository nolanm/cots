<?php
/**
 * The template for displaying the campaign thumbnail within a loop of campaigns.
 *
 * Override this template by copying it to your-child-theme/charitable/campaign-loop/campaign.php
 *
 * @author  Studio 164a
 * @package Charitable/Templates/Campaign
 * @since   1.0.0
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

/**
 * @var     Charitable_Campaign
 */
$campaign = $view_args['campaign'];

?>
<div class="campaign-image">    
	<a href="<?php esc_url(the_permalink()) ?>" title="<?php the_title_attribute() ?>" target="_parent">
		<?php 
			if ( is_page_template('page-templates/cause-grid.php') ) {
				echo get_the_post_thumbnail( $campaign->ID, 'bridge-post-thumbnail-grid' );
			}
			elseif ( is_page_template('page-templates/cause-list.php') ) {
				echo get_the_post_thumbnail( $campaign->ID, 'bridge-post-thumbnail-list' );
			}
			else {
				echo get_the_post_thumbnail( $campaign->ID, 'bridge-post-thumbnail-standard' );
			}
		?>
	</a>
</div>
