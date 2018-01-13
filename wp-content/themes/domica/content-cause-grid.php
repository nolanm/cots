<?php
/**
 * Campaign grid template.
 *
 * This template is used to display a grid of Charitable campaigns. It will
 * not be used if Charitable is not active.
 *
 */

$cause_link_grid = get_theme_mod( 'cause_link_grid' );
$cause_link_list = get_theme_mod( 'cause_link_list' );
// $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$campaigns = Charitable_Campaigns::query( array(
	'posts_per_page' => 9,
	'paged' => $paged,
));
?>
<div class="campaigns-grid-wrapper">
	<div class="campaigns-topbar-filter">
	<div class="campaigns-result-count">
		<?php
		$paged    = max( 1, $campaigns->get( 'paged' ) );
		$per_page = $campaigns->get( 'posts_per_page' );
		$total    = $campaigns->found_posts;
		$first    = ( $per_page * $paged ) - $per_page + 1;
		$last     = min( $total, $campaigns->get( 'posts_per_page' ) * $paged );

		if ( $total <= $per_page || -1 === $per_page ) {
			/* translators: %d: total results */
			printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'domica' ), $total );
		} else {
			/* translators: 1: first result 2: last result 3: total results */
			printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'domica' ), $first, $last, $total );
		}
		?>
	</div>
	<form class="campaigns-sorting">
		<span>Sort By:</span>
		<select name="sortby" class="consult-dropdown-list">
			<?php 
				$orderby_options = array(
					'default' => 'Default',
					'post_date' => 'Date',
					'post_title' => 'Title',
				);
				foreach( $orderby_options as $value => $label ) {
					echo "<option ".selected( $_GET['sortby'], $value )." value='$value'>$label</option>";
				}

				$modifications = array();
				if( empty( $_GET['sortby'] ) && $_GET['sortby'] == 'default' ) {
					$modifications = array(
						'orderby' => 'ID',
						'order' => 'ASC',
					);
				}
				if( !empty( $_GET['sortby'] ) && $_GET['sortby'] == 'post_date' ) {
					$modifications = array(
						'orderby' => 'date',
						'order' => 'DSC'
					);
				}
				if( !empty( $_GET['sortby'] ) && $_GET['sortby'] == 'post_title' ) {
					$modifications = array(
						'orderby' => 'title',
						'order' => 'ASC'
					);
				}
			?>
		</select>
	</form>

	<form class="campaigns-category-filter">
		<span>Category:</span>
		<select name="category-filter" class="consult-dropdown-list" id="category-filter">
			<option value="all-cate">All</option>
			<?php
				$cate_options = get_terms('campaign_category');

				foreach ( $cate_options as $cate ) {
				    $cate_label = $cate->name;
				    $cate_value = $cate->slug;
				    echo "<option ".selected( $_GET['category-filter'], $cate_value )." value='$cate_value'>$cate_label</option>";
				}

				$modifications_cate = array();
				if ( !empty( $_GET['category-filter'] ) && $_GET['category-filter'] !== 'all-cate' ) {
					$selected_cate =  $_GET['category-filter'];
					$modifications_cate = array(
						'tax_query' => array(
							array(
								'taxonomy' => 'campaign_category',
								'field' => 'slug',
								'terms' => ".$selected_cate."
							)
						)
					);
				}
				$args = array_merge( 
					$campaigns->query_vars,
					$modifications,
					$modifications_cate
				);

				$filter = new WP_Query( $args);

			?>
		</select>
	</form>

	<div class="campaigns-view">
			<a href="<?php echo esc_attr($cause_link_list); ?>" class="ion-ios-list-outline"></a>
			<a href="<?php echo esc_attr($cause_link_grid); ?>" class="ion-grid current"></a>
		</div>
	</div>

	<div class="row">
	<?php
		charitable_template_campaign_loop( $filter, 3 );

		wp_reset_postdata();
	?>
	</div>

	<!-- Pagination -->
	<div class="row">
	<?php
		if ( $campaigns->max_num_pages > 1 ) :
	?>
		<nav class="campaign-pagination">
			<?php
				if (!$current = get_query_var('paged')) :
	      			$current = 1;
	      		endif;
				echo paginate_links( array(
					'base'         => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
					'format'       => '',
					'current'      => $current,
					'total'        => $campaigns->max_num_pages,
					'prev_text'    => '&lt; PREV',
					'next_text'    => 'NEXT &gt;',
					'type'         => 'list',
				) );
			?>
		</nav>

	<?php endif ?>
	</div>
	</div>
</div><!-- .campaigns-grid-wrapper -->
