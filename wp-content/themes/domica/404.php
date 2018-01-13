<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>
<main id="main" class="flw">
	<div class="error-page flw">
		<div class="container">
			<div class="row error-ct">
				<div class="col-md-6 col-lg-6">
					<div class="error-content flw">
						<h1 class="error-title"><?php esc_html_e('Oops!', 'domica'); ?></h1>
						<h2 class="error-subtitle"><?php esc_html_e('Page not found', 'domica'); ?></h2>
						<p><?php esc_html_e('Page you are looking for is not available. Sorry for this inconvenience. Please go back to homepage or search for anything else.', 'domica'); ?></p>

						<a href="<?php echo esc_url(home_url('/')); ?>" class="page-error-btn theme-btn-animation"><?php esc_html_e('BACK TO HOMEPAGE', 'domica'); ?></a>
					</div>
				</div>
				<div class="col-md-6">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/error-bg.png" alt="error-image"> 
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>

