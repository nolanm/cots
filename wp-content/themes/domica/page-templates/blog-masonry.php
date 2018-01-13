<?php
/**
 *	Template Name: Blog Masonry
 */
get_header();
?>
<main id="main" class="page_content blog-masonry flw">
	<div class="container">
		<div class="row ipad-width">
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$query = new WP_Query(array(
					'post_type' => 'post',
					'post_status' => 'publish',					
    				'ignore_sticky_posts' => 1,
					'paged' => $paged,
					'showposts' => 9,
				));
				if ($query->have_posts()) :
					?>
	        			<div class="blog-masonry-grid-items">
							<?php
								while ($query->have_posts() ) : $query->the_post();
									echo '<div class="blog-masonry-it">';
									get_template_part( 'content', get_post_format() );
									echo '</div>';
								endwhile;
							?>
						</div>
						<?php
						// pagination
						domica_paging_nav($query);
				else :
					get_template_part( 'content', 'none' );
				endif;
				wp_reset_postdata();
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>