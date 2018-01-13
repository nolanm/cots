<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Include static files: javascript and css
 */

if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */

// Add Lato font, used in the main stylesheet.
wp_enqueue_style(
	'lato',
	domica_font_url(),
	array(),
	'1.0'
);

// Add Genericons font, used in the main stylesheet.
wp_enqueue_style(
	'genericons',
	get_template_directory_uri() . '/css/genericons.css',
	array(),
	'1.0'
);

// // Load our main stylesheet.
wp_enqueue_style(
	'style',
	get_stylesheet_uri(),
	array( 'genericons' ),
	'1.0'
);

// Load the Internet Explorer specific stylesheet.
wp_enqueue_style(
	'ie',
	get_template_directory_uri() . '/css/ie.css',
	array( 'bridge-style', 'genericons' ),
	'1.0',
	'all'
);
wp_style_add_data( 'bridge-ie', 'conditional', 'lt IE 9' );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

if ( is_singular() && wp_attachment_is_image() ) {
	wp_enqueue_script(
		'jquery-keyboard-image-navigation',
		get_template_directory_uri() . '/js/keyboard-image-navigation.js',
		array( 'jquery' ),
		'1.0',
		true
	);
}

if ( is_active_sidebar( 'sidebar-1' ) ) {
	wp_enqueue_script( 'jquery-masonry' );
}

if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
	wp_enqueue_script(
		'jquery-slider',
		get_template_directory_uri() . '/js/slider.js',
		array( 'jquery' ),
		'1.0',
		true
	);
	wp_localize_script( 'bridge-slider', 'featuredSliderDefaults', array(
		'prevText' => esc_html__( 'Previous', 'domica' ),
		'nextText' => esc_html__( 'Next', 'domica' )
	) );
}

wp_enqueue_script(
	'jquery-ui-tabs',
	get_template_directory_uri() . '/js/jquery-ui-1.10.4.custom.js',
	array( 'jquery' ),
	'1.0',
	true
);

//superfish style menu dropdown
wp_enqueue_script(
	'jquery-superfish',
	get_template_directory_uri() . '/js/superfish.js',
	array( 'jquery' ),
	'1.0',
	true
);
wp_enqueue_script(
	'masonry'
);

wp_enqueue_script(
	'bridge-script',
	get_template_directory_uri() . '/js/functions.js',
	array( 'jquery' ),
	'1.0',
	true
);

// Font Awesome stylesheet
wp_enqueue_style(
	'font-awesome',
	get_template_directory_uri() . '/css/font-awesome.min.css',
	array(),
	'1.0',
	'all'
);


wp_enqueue_script(
	'custom-input',
	get_template_directory_uri() . '/js/customInput.js',
	array( 'jquery' ),
	'1.0',
	true
);
wp_enqueue_script(
	'buster-counter-plugins',
	get_template_directory_uri() . '/js/counter.min.js',
	array( 'jquery' ),
	'1.0',
	true
);
wp_enqueue_script(
	'buster-dropkick-plugins',
	get_template_directory_uri() . '/js/dropkick.min.js',
	array( 'jquery' ),
	'1.0',
	true
);
wp_enqueue_script(
	'buster-enquire-plugins',
	get_template_directory_uri() . '/js/enquire.min.js',
	array( 'jquery' ),
	'1.0',
	true
);
wp_enqueue_script(
	'buster-fancybox-plugins',
	get_template_directory_uri() . '/js/fancybox.min.js',
	array( 'jquery' ),
	'1.0',
	true
);
wp_enqueue_script(
	'buster-isotope-plugins',
	get_template_directory_uri() . '/js/isotope.min.js',
	array( 'jquery' ),
	'1.0',
	true
);
wp_enqueue_script(
	'buster-plyr-plugins',
	get_template_directory_uri() . '/js/plyr.min.js',
	array( 'jquery' ),
	'1.0',
	true
);
wp_enqueue_script(
	'buster-slick-plugins',
	get_template_directory_uri() . '/js/slick.min.js',
	array( 'jquery' ),
	'1.0',
	true
);
wp_enqueue_script(
	'buster-slimmenu-plugins',
	get_template_directory_uri() . '/js/slimmenu.min.js',
	array( 'jquery' ),
	'1.0',
	true
);
wp_enqueue_script(
	'buster-themetab-plugins',
	get_template_directory_uri() . '/js/themetab.min.js',
	array( 'jquery' ),
	'1.0',
	true
);

wp_enqueue_script(
	'blog-masonry',
	get_template_directory_uri() . '/js/blog.masonry.js',
	array( 'jquery' ),
	'1.0',
	true
);

wp_enqueue_script(
	'gmap3',
	get_template_directory_uri() . '/js/gmap3.min.js',
	array( 'jquery' ),
	'1.0',
	true
);
/*enqueue loading post nav js*/
wp_enqueue_style( 'wp-mediaelement');

wp_enqueue_script( 'wp-mediaelement');

/*enqueue jquery custom file*/
wp_enqueue_script(
	'bridge-custom-js',
	get_template_directory_uri() . '/js/custom.js',
	array( 'jquery' ),
	'1.0',
	true
);