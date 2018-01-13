<?php
/**
 *	Template Name: Cause Grid
 */
get_header(); ?>
<main id="main" class="page_content cause-grid flw">
	<div class="container">
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
			<?php get_template_part( 'content', 'cause-grid' ) ?>
		</div><!-- .layout-wrapper -->
</div>
</main>
<?php get_footer(); ?>
