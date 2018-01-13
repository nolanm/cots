<?php
/**
 * The template for displaying Archive pages
 */

get_header(); ?>

<main id="main" class="page_content flw">
	<div class="container">
		<div class="row blog-list">
			<?php if(is_active_sidebar('blog-widget')): ?>
			<div class="col-md-8 col-lg-8">
				<div class="theme-blog-single">
					<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile;
						// pagination
						domica_paging_nav();
					else :
						get_template_part('content', 'none') ;
					endif; ?>
				</div>
			</div>
			<div class="col-md-4 col-lg-4">
				<?php get_sidebar('blog-widget'); ?>
			</div>
			<?php else: ?>
				<div class="col-md-8 not-active-sidebar">
					<div class="theme-blog-single">
						<?php if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'content', get_post_format() );
							endwhile;
							// pagination
							domica_paging_nav();
						else :
							get_template_part('content', 'none') ;
						endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php
get_footer();
