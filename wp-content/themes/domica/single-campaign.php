<?php
/**
 * The Template for displaying all single campaigns
 */
get_header();
?>

<main id="main" class="page_content flw campaign-page">
	<div class="container">
		<div class="theme-campaign-single">
			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					
				?>
				<div class="layout-wrapper">
					<div id="primary" class="content-area <?php if ( ! is_active_sidebar( 'sidebar_campaign' ) ) : ?>no-sidebar<?php endif ?>">
						<?php
						
						get_template_part( 'content', 'cause' );

						?>
					</div><!-- #primary -->
				</div><!-- .layout-wrapper -->
				<?php
			endwhile;
			else :
				get_template_part('content', 'none') ;
			endif; ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
