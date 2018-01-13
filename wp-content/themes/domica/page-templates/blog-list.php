<?php
/**
 *	Template Name: Blog List With sidebar
 */
get_header(); ?>
<main id="main" class="page_content blog-list-sb flw">
	<div class="container">
		<div class="row">
			<div class="col-md-8 blog-list-flex">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$query = new WP_Query(array(
						'post_type' => 'post',
						'post_status' => 'publish',					
	    				'ignore_sticky_posts' => 1,
						'paged' => $paged,
						'showposts' => 5,
					));
					if ($query->have_posts()) :
						
						while ($query->have_posts() ) : $query->the_post();
							echo '<div class="col-md-12 col-lg-12 blog-list-it">';
							get_template_part( 'content', get_post_format() );
							echo '</div>';
						endwhile;		
						// pagination
						domica_paging_nav($query);
					else :
						get_template_part( 'content', 'none' );
					endif;
					wp_reset_postdata(); ?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
