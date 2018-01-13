<?php
/**
 * The Template for displaying all single posts
 */
get_header();
?>

<main id="main" class="page_content flw blog-page">
	<div class="container">
		<div class="row blog-list">
			<?php if(is_active_sidebar('blog-widget')): ?>
			<div class="col-md-8 col-lg-8">
				<div class="theme-blog-single">
					<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile;
					else :
						get_template_part('content', 'none') ;
					endif; ?>
				</div>
			</div>
			<div class="col-md-4 col-lg-4">
				<?php get_sidebar(); ?>
			</div>
		<?php else:  ?>
			<div class="col-md-8 not-active-sidebar">
				<div class="theme-blog-single">
					<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile;
					else :
						get_template_part('content', 'none') ;
					endif; ?>
				</div>
			</div>
		<?php endif; ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
