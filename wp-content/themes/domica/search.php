<?php
/**
 * The template for displaying Search Results pages
 */

get_header(); ?>
	<div class="page_content page_search_blogpost">
		<div class="container">
			<div class="row blog-list">
			<?php if(is_active_sidebar('blog-widget')): ?>
				<div class="col-md-8 content-archive-page">
					<section id="primary" class="content-area">
						<div id="content" class="site-content" role="main">
							<?php if ( have_posts() ) : ?>

							<header class="page-header">
								<h3 class="page-title"><?php printf( esc_html__( 'Search results for: %s', 'domica' ), get_search_query() ); ?></h3>
							</header><!-- .page-header -->

								<?php
									while ( have_posts() ) : the_post();

										/*
										* Include the post format-specific template for the content. If you want to
										* use this in a child theme, then include a file called called content-___.php
										* (where ___ is the post format) and that will be used instead.
										*/
										get_template_part( 'content', get_post_format() );

									endwhile;
									else :

									// If no content, include the "No posts found" template.
									get_template_part( 'content', 'none' );

								endif;
							?>

						</div><!-- #content -->
					</section><!-- #primary -->
				</div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			<?php else: ?>
				<div class="col-md-8 not-active-sidebar">
					<section id="primary" class="content-area">
						<div id="content" class="site-content" role="main">
							<?php if ( have_posts() ) : ?>

							<header class="page-header">
								<h3 class="page-title"><?php printf( esc_html__( 'Search results for: %s', 'domica' ), get_search_query() ); ?></h3>
							</header><!-- .page-header -->

								<?php
									while ( have_posts() ) : the_post();

										/*
										* Include the post format-specific template for the content. If you want to
										* use this in a child theme, then include a file called called content-___.php
										* (where ___ is the post format) and that will be used instead.
										*/
										get_template_part( 'content', get_post_format() );

									endwhile;
									else :

									// If no content, include the "No posts found" template.
									get_template_part( 'content', 'none' );

								endif;
							?>

						</div><!-- #content -->
					</section><!-- #primary -->
				</div>		
			<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php
get_footer();
