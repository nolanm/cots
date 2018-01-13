<?php
/**
 *	Template Name: Cause Standard
 */
get_header(); ?>
<main id="main" class="page_content cause-standard flw">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div id="primary" class="content-area">
					<?php

					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();

							?>
							<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
								<div class="shadow-wrapper">
									<div class="layout-wrapper">						
										<div class="entry">
											<?php the_content() ?>
										</div><!-- .entry -->
									</div><!-- .layout-wrapper -->
								</div><!-- .shadow-wrapper -->
							</article><!-- post-<?php the_ID() ?> -->
							<?php

						endwhile;
					endif;

					?>
				</div><!-- #primary -->
				<div class="layout-wrapper">			
					<?php get_template_part( 'content', 'cause-list' ) ?>
				</div><!-- .layout-wrapper -->
			</div>
			
			<div class="col-md-4">
				<?php get_sidebar( 'cause' ) ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
