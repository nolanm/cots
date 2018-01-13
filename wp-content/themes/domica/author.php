<?php
/**
 * The template for displaying Archive pages
 */

get_header(); ?>

	<main id="main" class="page_content flw">
		<div class="container">
			<div class="row blog-list">
				<?php if(is_active_sidebar('blog-widget')): ?>
					<div class="col-md-8 col-lg-8 content-archive-page">
						<?php
							if (have_posts()) :
							
								while ( have_posts() ) : the_post();
									get_template_part( 'content', get_post_format() );
								endwhile;
								// pagination
								domica_paging_nav();
							else :
								get_template_part( 'content', 'none' );
							endif;
						?>
					</div>
					<div class="col-md-4 col-lg-4">
						<?php get_sidebar(); ?>
					</div>
				<?php else: ?>
					<div class="col-md-8 not-active-sidebar">
						<?php if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'content', get_post_format() );
							endwhile;
							domica_paging_nav();
						else :
							get_template_part('content', 'none') ;
						endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</main>

<?php
get_footer();
