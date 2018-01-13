<?php
/**
 *  Search for causes
 */

get_header();

$find = get_search_query();
$args = array(
    'post_type' =>'campaign',
    's'=>$find
);
$cause = new WP_Query( $args );
?>
	<div class="container page_search cause-list">
		<div class="row">
			<div class="col-md-8">
				<section id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<?php if ( $cause->have_posts() ) : ?>

						<header class="page-header">
							<h3 class="page-title"><?php printf( esc_html__( 'Search results for cause: %s', 'domica' ), get_search_query() ); ?></h3>
						</header><!-- .page-header -->
						<div class="campaign-loop campaign-list">
							<?php
								while ( $cause->have_posts() ) : $cause->the_post();

									/*
									 * Include the post format-specific template for the content. If you want to
									 * use this in a child theme, then include a file called called content-___.php
									 * (where ___ is the post format) and that will be used instead.
									 */
									get_template_part( 'content', 'cause-search');

								endwhile;
						?>
						</div>
						<?php else:
							// If no content, include the "No posts found" template.
							get_template_part( 'content', 'none' );

						endif; ?>
					</div><!-- #content -->
				</section><!-- #primary -->
			</div>
		
			<div class="col-md-4">
				<?php get_sidebar( 'cause' ); ?>
			</div>
		</div>
	</div>
<?php
get_footer();
