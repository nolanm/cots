<?php
/**
 * The template for displaying featured posts on the front page
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="post-thumbnail" href="<?php esc_url(the_permalink()); ?>">
	<?php
		// Output the featured image.
		if ( has_post_thumbnail() ) :
			if ( 'grid' == get_theme_mod( 'featured_content_layout' ) ) {
				the_post_thumbnail();
			} else {
				the_post_thumbnail( 'bridge-theme-full-width' );
			}
		endif;
	?>
	</a>

	<header class="entry-header">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && fw_theme_categorized_blog() ) : ?>
		<div class="entry-meta">
			<span class="cat-links"><?php echo get_the_category_list( esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'domica' ) ); ?></span>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ); ?>
		<?php
		if( function_exists('fw_ext_breadcrumbs') && is_single() ) {
			fw_ext_breadcrumbs();
		}
		?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->