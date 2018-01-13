<?php
/**
 *	Template Name: Blog Grid
 */
get_header(); ?>
<main id="main" class="page_content blog-grid flw">
	<div class="container">
		<div class="row">
			
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$query = new WP_Query(array(
					'post_type' => 'post',
					'post_status' => 'publish',					
    				'ignore_sticky_posts' => 1,
					'paged' => $paged,
					'showposts' => 6,
				));
				if ($query->have_posts()) :
					?>
					<div class="load-more-wrapper">
	        			<div class="load-more-container">
							<?php
								while ($query->have_posts() ) : $query->the_post();
									echo '<div class="col-md-6 col-lg-12 blog-grid-it">';
									get_template_part( 'content', get_post_format() );
									echo '</div>';
								endwhile;
							?>
						</div>
						<?php
						// pagination
						domica_paging_nav($query);
						?>
					</div>
					
				<?php
				else :
					get_template_part( 'content', 'none' );
				endif;
				wp_reset_postdata();
			?>
			
		</div>
	</div>
</main>
<?php get_footer(); ?>
