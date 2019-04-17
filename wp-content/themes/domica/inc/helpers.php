<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Helper functions and classes with static methods for usage in theme
 */

/**
 * Register Lato Google font.
 *
 * @return string
 */
/*Register Lato Google font*/
if(!function_exists('domica_font_url')){
	function domica_font_url() {
		$fonts_url = '';
		/* Translators: If there are characters in your language that are not
	    * supported by Lato, translate this to 'off'. Do not translate
	    * into your own language.
	    */
		$lato = esc_html_x( 'on', 'Lato font: on or off', 'domica');

		/* Translators: If there are characters in your language that are not
	    * supported by Open Sans, translate this to 'off'. Do not translate
	    * into your own language.
	    */
		$montserrat = esc_html_x( 'on', 'Montserrat font: on or off', 'domica');

		if (  'off' !== $lato || 'off' !== $montserrat) {
			$font_families = array();

			if ( 'off' !== $lato ) {
				$font_families[] = 'Lato:700,400,800,600,300';
			}

			if ( 'off' !== $montserrat ) {
				$font_families[] = 'Montserrat:700,400,800,600';
			}

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
		}

		return esc_url_raw( $fonts_url );
	}
}

/*replace more excerpt text*/
function domica_replace_excerpt( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'domica_replace_excerpt' );


/**
 * Getter function for Featured Content Plugin.
 *
 * @return array An array of WP_Post objects.
 */
function domica_get_featured_posts() {
	/**
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'domica_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @return bool Whether there are featured posts.
 */
function domica_has_featured_posts() {
	return ! is_paged() && (bool) domica_get_featured_posts();
}

if ( ! function_exists('domica_the_attached_image') ) : /**
 * Print the attached image with a link to the next attached image.
 */ {
	function domica_the_attached_image() {
		$post = get_post();
		/**
		 * Filter the default attachment size.
		 *
		 * @param array $dimensions {
		 *     An array of height and width dimensions.
		 *
		 * @type int $height Height of the image in pixels. Default 810.
		 * @type int $width Width of the image in pixels. Default 810.
		 * }
		 */
		$attachment_size     = apply_filters( 'domica_attachment_size', array( 810, 810 ) );
		$next_attachment_url = wp_get_attachment_url();

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => - 1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );
			} // or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}

		printf( '<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url( $next_attachment_url ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
}
endif;

if ( ! function_exists( 'domica_list_authors' ) ) : /**
 * Print a list of all site contributors who published at least one post.
 */ {
	function domica_list_authors() {
		$contributor_ids = get_users( array(
			'fields'  => 'ID',
			'orderby' => 'post_count',
			'order'   => 'DESC',
			'who'     => 'authors',
		) );

		foreach ( $contributor_ids as $contributor_id ) :
			$post_count = count_user_posts( $contributor_id );

			// Move on if user has not published a post (yet).
			if ( ! $post_count ) {
				continue;
			}
			?>

			<div class="contributor">
				<div class="contributor-info">
					<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
					<div class="contributor-summary">
						<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name',
								$contributor_id ); ?></h2>

						<p class="contributor-bio">
							<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
						</p>
						<a class="button contributor-posts-link"
						   href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
							<?php printf( _n( '%d Article', '%d Articles', $post_count, 'domica' ), $post_count ); ?>
						</a>
					</div>
					<!-- .contributor-summary -->
				</div>
				<!-- .contributor-info -->
			</div><!-- .contributor -->

		<?php
		endforeach;
	}
}
endif;

/**
 * Custom template tags
 */
{
	if ( ! function_exists( 'domica_paging_nav' ) ) : /**
	 * Display navigation to next/previous set of posts when applicable.
	 */ {
		function domica_paging_nav( $wp_query = null ) {

			if ( ! $wp_query ) {
				$wp_query = $GLOBALS['wp_query'];
			}

			// Don't print empty markup if there's only one page.

			if ( $wp_query->max_num_pages < 2 ) {
				return;
			}

			$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
			$pagenum_link = html_entity_decode( get_pagenum_link() );
			$query_args   = array();
			$url_parts    = explode( '?', $pagenum_link );

			if ( isset( $url_parts[1] ) ) {
				wp_parse_str( $url_parts[1], $query_args );
			}

			$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
			$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

			$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link,
				'index.php' ) ? 'index.php/' : '';
			$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%',
				'paged' ) : '?paged=%#%';

			// Set up paginated links.
			$links = paginate_links( array(
				'base'      => $pagenum_link,
				'format'    => $format,
				'total'     => $wp_query->max_num_pages,
				'current'   => $paged,
				'mid_size'  => 1,
				'add_args'  => array_map( 'urlencode', $query_args ),
				'prev_text' => esc_html__( '&larr; Previous', 'domica' ),
				'next_text' => esc_html__( 'Next &rarr;', 'domica' ),
			) );

			if ( $links ) :

				?>
				<nav class="paging-navigation">
					<h1 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'domica'); ?></h1>
						<?php echo wp_kses($links,
						array(
							'ul' => array(
								'class' => array(),
							),
							'li' => array(),
							'span' => array(
								'class' => array(),
							),
							'a' => array(
								'class' => array(),
								'href' => array(),
							),
						)); ?>
				</nav>
			<?php
			endif;
		}
	}
	endif;

	if ( ! function_exists( 'domica_post_nav' ) ) : /**
	 * Display navigation to next/previous post when applicable.
	 */ {
		function domica_post_nav() {
			// Don't print empty markup if there's nowhere to navigate.
			$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '',
				true );
			$next     = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous ) {
				return;
			}

			?>
			<nav class="navigation post-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'domica' ); ?></h1>

				<div class="nav-links">
					<?php
					if ( is_attachment() ) :
						previous_post_link( '%link',
							__( '<span class="meta-nav">Published In</span>%title', 'domica' ) );
					else :
						previous_post_link( '%link',
							__( '<span class="meta-nav">Previous Post</span>%title', 'domica' ) );
						next_post_link( '%link', esc_html__( '<span class="meta-nav">Next Post</span>%title', 'domica' ) );
					endif;
					?>
				</div>
				<!-- .nav-links -->
			</nav><!-- .navigation -->
		<?php
		}
	}
	endif;

	if ( ! function_exists( 'domica_posted_on' ) ) : /**
	 * Print HTML with meta information for the current post-date/time and author.
	 */ {
		function domica_posted_on() {
			if ( is_sticky() && is_home() && ! is_paged() ) {
				echo '<span class="featured-post">' . esc_html__( 'Sticky', 'domica' ) . '</span>';
			}

			// Set up and print post meta information.
			printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
				esc_url( get_permalink() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}
	}
	endif;

	/**
	 * Find out if blog has more than one category.
	 *
	 * @return boolean true if blog has more than 1 category
	 */
	function domica_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'fw_category_count' ) ) ) {
			// Create an array of all the categories that are attached to posts
			$all_the_cool_cats = get_categories( array(
				'hide_empty' => 1,
			) );

			// Count the number of categories that are attached to the posts
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'fw_category_count', $all_the_cool_cats );
		}

		if ( 1 !== (int) $all_the_cool_cats ) {
			// This blog has more than 1 category so domica_categorized_blog should return true
			return true;
		} else {
			// This blog has only 1 category so domica_categorized_blog should return false
			return false;
		}
	}

	/**
	 * Display an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index
	 * views, or a div element when on single views.
	 */
	function domica_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$current_position = false;
		if (function_exists('domica_sidebars_get_current_position')) {
			$current_position = domica_sidebars_get_current_position();
		}



		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php
				if ( ( in_array( $current_position,
						array( 'full', 'left' ) ) || is_page_template( 'page-templates/full-width.php' )
					|| empty($current_position)
				)
				) {
					the_post_thumbnail( 'bridge-theme-full-width' );
				} else {
					the_post_thumbnail();
				}
				?>
			</div>

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>">
				<?php
				if ( ( in_array( $current_position,
						array( 'full', 'left' ) ) || is_page_template( 'page-templates/full-width.php' ) )
						|| empty($current_position)
				) {
					the_post_thumbnail( 'bridge-theme-full-width' );
				} else {
					the_post_thumbnail();
				}
				?>
			</a>

		<?php endif; // End is_singular()
	}
}

/*Custom comment output*/
function domica_comment_list($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
		<div class="comment-post-pingback">
			<?php esc_html_e( 'Pingback:', 'domica' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'domica' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	<?php
		break;
		default :
	?>
	<div id="comment-<?php comment_ID(); ?>" class="comment-item" itemscope itemtype="http://schema.org/Comment">
		<div class="comment-avatar">
			<?php echo get_avatar($comment,$size='60'); ?>
		</div>
		<div class="comment-content">
			<a href="#comment-<?php comment_ID(); ?>" itemprop="discussionUrl"><strong class="comment-author-name" itemprop="creator"><?php echo get_comment_author(); ?></strong></a>
			<div class="comment-text" itemprop="about">
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php esc_html_e('Your comment is awaiting moderation.', 'domica') ?></em>
				<?php endif; ?>
				<?php comment_text() ?>
			</div>
			<div class="flex-it">
				<div class="comment-time" itemprop="datePublished" content="<?php echo get_the_time('c'); ?>"><?php echo get_comment_date("F j, Y"); ?></div>
					<?php edit_comment_link(esc_html__('Edit', 'domica'), '  ', '') ?>
					<?php echo get_comment_reply_link(array_merge($args,array(
						'depth' => $depth,
						'reply_text' => 'Reply',
						'max_depth' => $args['max_depth'])));
					?>
			</div>
		</div>
	</div>
<?php
	break;
	endswitch;
}
/*logo*/
if(!function_exists('domica_logo_image')){
	function domica_logo_image($id){
		$pid = get_queried_object_id();
		$p_lg = function_exists('fw_get_db_post_option') ? fw_get_db_post_option($pid, 'p_lg') : '';
		
		if($id == 'header-3'){
			$c_lg = get_theme_mod('logo_transparent', '');
		}else{
			$c_lg = get_theme_mod('logo_img', '');
		}
		
		$lg_img = '';

		$tag = 'div';
		if( is_front_page() ){
			$tag = 'h1';
		}
		
		if(isset($p_lg['gadget']) && $p_lg['gadget'] == 'custom'){
			$lg_img = $p_lg['custom']['lg_data']['url'];
		?>
			<<?php echo esc_attr($tag); ?> itemscope itemtype="http://schema.org/Organization" class="ht-logo">
				<a class="lg" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url">
	                <img
	                	src="<?php echo esc_url($lg_img); ?>"
	                	alt="<?php esc_attr_e('Logo image', 'domica'); ?>"
	                	itemprop="logo"
	                	width="161"
	                	height="43" >
	            </a>
	            <span class="screen-reader-text"><?php echo esc_attr( bloginfo( 'name' ) ); ?></span>
            </<?php echo esc_attr($tag); ?>>
        <?php
			}else{
				$lg_img = ($c_lg != '') ? $c_lg : get_template_directory_uri().'/images/lg.png';
		?>
			<<?php echo esc_attr($tag); ?> itemscope itemtype="http://schema.org/Organization" class="ht-logo">
				<a class="lg" href="<?php echo esc_url(home_url("/")); ?>" itemprop="url">
	                <img
	                	src="<?php echo esc_url($lg_img); ?>"
	                	alt="<?php esc_attr_e('Logo image', 'domica'); ?>"
	                	itemprop="logo"
	                	width="161"
	                	height="43" >
	            </a>
	            <span class="screen-reader-text"><?php echo esc_attr( bloginfo( 'name' ) ); ?></span>
			</<?php echo esc_attr($tag); ?>>
		<?php
		}
	}
}

/* header layout */
if(!function_exists('domica_header_layout')){
	function domica_header_layout(){
		/*PAGE OPTIONS*/
		$pid = get_queried_object_id();
		$p_header_layout = (function_exists('fw_get_db_post_option')) ? fw_get_db_post_option($pid, 'page_header_layout') : '';
		
		/*CUSTOMIZER*/
		$c_header_layout = get_theme_mod('header_layout_cfg', 'layout-2');

		if(isset($p_header_layout['gadget']) && $p_header_layout['gadget'] != 'default' ){
			switch($p_header_layout['gadget']){
				case 'layout-1' :
					get_template_part('page-templates/header', 'layout-1');
					break;
				case 'layout-2' :
					get_template_part('page-templates/header', 'layout-2');
					break;
				case 'layout-3' :
					get_template_part('page-templates/header', 'layout-3');
				break;
			}
		}else{
			switch($c_header_layout){
				case 'layout-1' :
					get_template_part('page-templates/header', 'layout-1');
					break;
				case 'layout-2' :
					get_template_part('page-templates/header', 'layout-2');
					break;
				case 'layout-3' :
					get_template_part('page-templates/header', 'layout-3');
				break;
				default :
					get_template_part('page-templates/header', 'layout-2');
					break;

			}
		}
	}
}
/* Edit location *******************************************************************/
/*hader layout edit*/
if(!function_exists('domica_header_edit_location')){
	function domica_header_edit_location($id = ''){
		$option = $id.'_edit_location';
		if(is_customize_preview()):
			echo '<div id="'. esc_attr($id) .'-edit-location" class="header-edit-location">';
				if ( class_exists( 'Kirki' ) ){
					echo Kirki::get_option($option);
				}
			echo '</div>';
		endif;
	}
}

/*breadcrumbs layout edit location*/
if(!function_exists('domica_bread_edit_location')){
	function domica_bread_edit_location($id = ''){
		$option = $id.'_edit_location';
		if(is_customize_preview()):
			echo '<div id="' . esc_attr($id) . '-edit-location">';
				if ( class_exists( 'Kirki' ) ){
					echo Kirki::get_option($option);
				}
			echo '</div>';
		endif;
	}
}

/*footer layout edit location*/
if(!function_exists('domica_footer_edit_location')){
	function domica_footer_edit_location($id = ''){
		$option = $id.'_edit_location';
		if(is_customize_preview()): ?>
			<div id="<?php echo esc_attr($id); ?>-edit-location">
				<?php
					if ( class_exists( 'Kirki' ) ){
						echo Kirki::get_option($option);
					}
				?>
			</div>
		<?php endif;
	}
}
/*custom search form widget*/
add_filter( 'get_search_form', 'domica_search_form_widget', 100 );
function domica_search_form_widget( $form ) {
    $form =
    '<form role="search" method="get" class="search-form" action="' . esc_url(home_url( '/' )) . '" >
	    <label class="screen-reader-text" for="s">' . esc_html__( 'Search for:', 'domica' ) . '</label>
	    <input type="text" class="search-field" placeholder="'.esc_attr__('Enter keyword...', 'domica').'" value="' . get_search_query() . '" name="s" id="s" />
	    <button type="submit" class="search-submit ion-android-search"></button>
    </form>';
    return $form;
}

/*post date*/
if ( ! function_exists( 'domica_post_date' ) ) :
	function domica_post_date() {
		$post_date = get_the_date('d');
		$post_m = get_the_date('M');
		$post_y = get_the_date('Y');

		$post_info = '<span class="date-month">'.$post_m.'</span>';
		$post_info .= '<span class="date-day">'.$post_date.',</span>';
		$post_info .= '<span class="date-year">'.$post_y.'</span>';

		return $post_info;
	}
endif;
if(! function_exists('domica_custom_tribe_event_dateformat')):
	function domica_custom_tribe_event_dateformat(){
		$dateformat = tribe_get_start_date(null,true, 'l F d',null);
		$arr = explode(" ",$dateformat);
		$ev_dayofweek = $arr[0];
		$ev_month = $arr[1];
		$ev_day = $arr[2];
		
		$event_custom_dateformat = '<div class="tribe-date-custom">';
		$event_custom_dateformat .= '<span class="ev-day">'.$ev_day.'</span>';
		$event_custom_dateformat .= '<div class="event-flex-items">';
		$event_custom_dateformat .= '<span class="ev-month">'.$ev_month.'</span>';
		$event_custom_dateformat .= '<span class="ev-dayofweek">'.$ev_dayofweek.'</span>';
		$event_custom_dateformat .= '</div>';
		$event_custom_dateformat .= '</div>';

		return $event_custom_dateformat;

	}
endif;
/*blog categories*/
if(!function_exists('domica_blog_categories')):
	function domica_blog_categories(){
		$categories_string = '';
		$categories = get_the_category();
		$separator = ', ';
		$output = '';
		if ( ! empty( $categories ) ) {
			foreach( $categories as $category ) {
				$output .= '<a  href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( 'View all posts in %s', 'domica'), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
			}
			$categories_string .= trim( $output, $separator );
		}
		return $categories_string;
	}
endif;
/*sermon cate*/
if(!function_exists('domica_sermon_categories')):
	function domica_sermon_categories(){
		$categories = get_the_terms('','ht-sermon-filter');
		$categories_string = '';
		$separator = ', ';
		$output = '';
		if ( ! empty( $categories ) ) {
			foreach( $categories as $category ) {
				$output .= '<a  href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( 'View all posts in %s', 'domica'), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
			}
			$categories_string .= trim( $output, $separator );
		}
		return $categories_string;
	}	
endif;
/*sermon tags*/
if(!function_exists('domica_sermon_series')):
	function domica_sermon_series(){
		$series = get_the_terms('','ht-sermon-filter-2');
		$series_string = '';
		$separator = ',';
		$output = '';
		if ( ! empty( $series ) ) {
			foreach( $series as $category) {
				$output .= '<a  href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( 'View all posts in %s', 'domica'), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
			}
			$series_string .= trim( $output, $separator );
		}
		return $series_string;
	}	
endif;

/*Author Card*/
if(!function_exists('domica_author_card')){
	function domica_author_card(){
		if ( empty( $post ) && isset( $GLOBALS['post'] ) )
		$post = $GLOBALS['post'];
		$authordesc = get_the_author_meta( 'description' );
		if(!empty($authordesc)): ?>
			<div class="flw" itemscope itemtype="https://schema.org/CreativeWork">
				<div class="post-author-info-single" itemprop="author" itemscope itemtype="http://schema.org/Person">
					<div class="author-av"><?php echo get_avatar( $post->ID, $size = 123 ); ?></div>
					<div class="post-author-detail">
						<strong class="author-name" itemprop="name"><?php the_author(); ?></strong>
						<p class="author-desc" itemprop="description"><?php the_author_meta('description'); ?></p>
					</div>
				</div>
			</div><?php
		endif;
	}
}
/*post navigation*/
if ( ! function_exists('domica_theme_post_nav') ) :
	function domica_theme_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		if(!empty($previous)){
			$pre_link = get_permalink($previous);
			$pre_post_id = $previous->ID;
			$pre_post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($pre_post_id), 'thumbnail' );
		}
		if(!empty($next)){
			$next_link = get_permalink($next);
			$next_post_id = $next->ID;
			$next_post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($next_post_id), 'thumbnail' );
		}

		?>

		<div class="blog-related-post flw">
			<?php
			if( is_attachment() ):
			?>
			<?php if(!empty($previous)){ ?>
				<div class="prev-post">
					<?php if($pre_post_thumb != false) : ?>
						<div class="control-post-img">
							<img src="<?php echo esc_url($pre_post_thumb[0]); ?>"
								 alt="<?php esc_attr_e('Post nav thumb', 'domica'); ?>">
						</div>
					<?php endif; ?>
					<div class="control-post-desc">
						<h3 class="control-post-name"><?php previous_post_link('%link'); ?></h3>
						<a href="<?php echo esc_url($pre_link); ?>" class="control-post-btn"><?php esc_html_e('Previous', 'domica'); ?></a>
					</div>
				</div>
			<?php } ?>
			<?php else : ?>
			<?php if(!empty($previous)){ ?>
				<div class="prev-post">
					<?php if($pre_post_thumb != false) : ?>
						<div class="control-post-img">
							<img src="<?php echo esc_url($pre_post_thumb[0]); ?>"
								 alt="<?php esc_attr_e('Post nav thumb', 'domica'); ?>">
						</div>
					<?php endif; ?>
					<div class="control-post-desc">
						<h3 class="control-post-name"><?php previous_post_link('%link'); ?></h3>
						<a href="<?php echo esc_url($pre_link); ?>" class="control-post-btn"><?php esc_html_e('Previous', 'domica'); ?></a>
					</div>
				</div>
			<?php } ?>
			<?php if(!empty($next)){ ?>
				<div class="next-post">
					<?php if($next_post_thumb != false) : ?>
						<div class="control-post-img">
							<img src="<?php echo esc_url($next_post_thumb[0]); ?>"
								 alt="<?php esc_attr_e('Post nav thumb', 'domica'); ?>">
						</div>
					<?php endif; ?>
					<div class="control-post-desc">
						<h3 class="control-post-name"><?php next_post_link('%link'); ?></h3>
						<a href="<?php echo esc_url($next_link); ?>" class="control-post-btn"><?php esc_html_e('Next', 'domica'); ?></a>
					</div>
				</div>
			<?php } ?>
			<?php endif; ?>
		</div>
		<?php
	}
endif;
// blog sticky post
if(!function_exists('domica_sticky_post')){
	function domica_sticky_post(){
		if(!is_single()){
			if(is_sticky()): ?>
				<div class="sticky-post theme-sticky"><span><?php esc_html_e('STICKY', 'domica'); ?></span></div>
			<?php
			endif;
		}
	}
}
/*Show related page by category*/
if(!function_exists('domica_related_post')){
	function domica_related_post(){
		global $post;
		$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 2, 'post__not_in' => array($post->ID) ) );
		if(!empty($related) ) {
			?>
			<h4 class="related-post-title">
				<?php esc_html_e('Related Posts', 'domica'); ?>
			</h4>
			<div class="related-items">
				<?php
					foreach( $related as $post ) {
					setup_postdata($post); ?>
					<div class="related-item-cate"> 
						<!-- <div class="post-thumbnail">
							<?php 
								$thumbnail_id = get_post_thumbnail_id($post->ID);
							?>
							<a href="<?php the_permalink(); ?>" class="sc-blog-link">
								<?php  
									echo wp_get_attachment_image($thumbnail_id, 'large' );
								?>
							</a>  
						</div> -->
						<div class="blog-it-content">
							<div class="flex-it">
								<span class="post-cat"><?php echo domica_blog_categories();/*post categories*/ ?></span>
								<span class="blog-post-date" itemprop="datePublished" content="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></span>
							</div>
							<div class="blog-it-detail">
								<a class="blog-title" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								<div class="des"><?php the_excerpt(); ?></div>
								<a href="<?php the_permalink(); ?>" class="blog-btn-more"><?php esc_html_e('continue', 'domica'); ?></a>
							</div>
						</div>
						
					</div>   
					<?php }
				?>
			</div>
		<?php
		}
		wp_reset_postdata();
	}
}
	
// blog masonry
if(!function_exists('domica_blog_masonry_script')){
	function domica_blog_masonry_script(){
		$page_template = get_page_template_slug(get_queried_object_id());
		if($page_template == 'page-templates/blog-masonry.php'){
			wp_enqueue_script(
	 			'jquery-blog-masonry',
	 			get_template_directory_uri() . '/js/blog.masonry.js',
	 			array('jquery'),
	 			'1.0',
	 			true
	 		);
		}
	}
	add_action('wp_enqueue_scripts', 'domica_blog_masonry_script', 100);
}
/*footer widget*/
if(!function_exists('domica_footer_sidebar')){
	function domica_footer_sidebar(){
		if(is_active_sidebar('footer-widget')): ?>
			<div class="theme-footer-widget flw">
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar('footer-widget'); ?>
					</div>
				</div>
			</div>
		<?php endif;
	}
}
/*footer display*/
if(!function_exists('domica_footer_display')){
	function domica_footer_display(){
		// page id
		$pid = get_queried_object_id();
		$footer_data = (function_exists('fw_get_db_post_option')) ? fw_get_db_post_option($pid, 'footer_data') : '';
		$c_footer_display = get_theme_mod('c_footer_display', '1');
		
		if(isset($footer_data) && $footer_data != 'default'){
			switch($footer_data){
				case 'enable' :
					domica_footer_sidebar();
					break;
				case 'disable' :
					break;
				}
		}else{
			switch($c_footer_display){
				case '1' :
				domica_footer_sidebar();
					break;
				case '0' :
					break;
				default :
					domica_footer_sidebar();
					break;
				}
		}
	}
}

/* VISUAL COMPOSER *******************************************************************/
/*Extend VC*/
if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {
	function domica_require_VC() {
		require_once get_template_directory() . '/inc/vc-include.php';
	}
	add_action( 'init', 'domica_require_VC', 2 );
}
/*footer menu 2*/
register_nav_menus( array(  
  'Footer Menu 2' => esc_html__('Footer Menu 2', 'domica')  
) );
// top search
if(!function_exists('domica_top_search_form')){
	function domica_top_search_form(){
		?>
		<form action="<?php echo esc_url(home_url('/')); ?>" class="header-search-form">
	        <input required class="header-search-form-input" name="s" type="text" placeholder="<?php esc_attr_e('What are you looking for?', 'domica'); ?>" >
	    </form>
	     <span class="ion-close close-form-btn"></span>
	    <?php
	}
}

/**
 * Return category of current campaign
 */
if(!function_exists('domica_charitable_category')):
	function domica_charitable_category() {
		global $post;
	   	$terms = get_the_terms($post->ID ,'campaign_category');
	   	if (is_array($terms) || is_object($terms)) {
			foreach ( $terms as $term ) {
			   echo '<a  href="'.esc_url( get_category_link( $term->term_id ) ) .'">'.$term->name.'</a><br />';
			}
		}
	}
endif;

/**
 * Return donation button
 */
function domica_charitable_get_donate_button() {
	$campaign = charitable_get_current_campaign();
	charitable_template_donate_button( $campaign );
	charitable_template( 'campaign/donate-modal-window.php', array( 'campaign' => $campaign ) );
	Charitable_Public::get_instance()->enqueue_donation_form_scripts();
}

/**
 * A helper function to get the Checkbox Field for a donation.
 * Display checkbox status Admin
 *
 * @param   Charitable_Donation $donation
 * @return  string
 */
function domica_charitable_donation_get_checkbox_field( $donation ) {
    $data = $donation->get_donor_data();
    if ( is_array($data) && array_key_exists( 'checkbox_field', $data ) && $data['checkbox_field'] ) {
        return esc_html__( 'Yes', 'domica' );
    }
    return esc_html__( 'No', 'domica' );
}

/**
 * A helper function to get the Note Field for a donation.
 * Display checkbox status Admin
 */
function domica_charitable_donation_get_note_field( $donation ) {
    $data = $donation->get_donor_data();
    if ( is_array($data) && array_key_exists( 'note_field', $data ) && $data['note_field'] ) {
        return  $data['note_field'];
    }
}

/**
 * Cause Template tags
 */
if ( ! function_exists( 'domica_template_campaign_loop_stats' ) ) :

	/**
	 * Display the campaign stats inside the campaign.
	 *
	 * @param   Charitable_Campaign $campaign
	 * @return  void
	 */
	function domica_template_campaign_loop_stats( Charitable_Campaign $campaign ) {
		charitable_template( 'campaign-loop/stats.php', array( 'campaign' => $campaign ) );
	}

endif;
/*convert address to lat and long*/
function get_latlong_geocode($address){
        
    $address = str_replace(" ", "+", $address); //google doesn't like spaces in urls, but who does?

    $url = "http://maps.googleapis.com/maps/api/geocode/json?address=$address&sensor=false"; 
    $google_api_response = wp_remote_get( $url );    

    $results = json_decode( $google_api_response['body'] ); //grab our results from Google
    $results = (array) $results; //cast them to an array
    $status = $results["status"]; //easily use our status
    $location_all_fields = (array) $results["results"][0];
    $location_geometry = (array) $location_all_fields["geometry"];
    $location_lat_long = (array) $location_geometry["location"];

    echo "<!-- GEOCODE RESPONSE " ;
    var_dump( $location_lat_long );
    echo " -->";

    if( $status == 'OK'){
        $latitude = $location_lat_long["lat"];
        $longitude = $location_lat_long["lng"];
    }else{
        $latitude = '';
        $longitude = '';
    }

    $return = $latitude.','.$longitude;
    return $return;
}
function custom_text_header() {
		wp_enqueue_style(
			'custom-style',
			get_template_directory_uri() . '/style.css'
		);
		$pid = get_queried_object_id();
		$p_page_header = (function_exists('fw_get_db_post_option')) ? fw_get_db_post_option($pid, 'p_page_header') : '1';
		$page_options =  (function_exists('fw_get_db_post_option')) ? fw_get_db_post_option($pid, 'p_page_header') : '';
		$color_text = $page_options[1]['page_header_text_color'];
		
        $custom_css = "
                .header-layout-3 .theme-wrap-menu-flex .theme-primary-menu > li > a, .header-layout-3 .theme-menu-box .theme-wrap-menu-flex #ht-btn-search:before{
                        color: {$color_text} !important;
                }";
        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'custom_text_header' );
