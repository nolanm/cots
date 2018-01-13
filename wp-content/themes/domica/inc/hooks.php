<?php
if ( ! isset( $content_width ) )
    $content_width = 640;
 
function domica_content_width() {
    global $content_width;
 
    if ( is_page_template( 'full-width.php' ) )
        $content_width = 780;
}
add_action( 'template_redirect', 'domica_content_width' );

/**
 * Filters and Actions
 */
if ( ! function_exists( 'domica_action_theme_setup' ) ) :
{
	function domica_action_theme_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'domica', get_template_directory() . '/languages' );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );
		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		add_theme_support('title-tag');
		add_image_size( 'bridge-post-thumbnail-standard', 770, 370, true );
		add_image_size( 'bridge-post-thumbnail-list', 370, 250, true );
		add_image_size( 'bridge-post-thumbnail-grid', 370, 215, true );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'audio',
			'quote',
			'link',
			'gallery',
		) );

		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
		
		add_theme_support( 'woocommerce' );
	    add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
}
endif;
add_action( 'after_setup_theme', 'domica_action_theme_setup' );


/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
function domica_filter_theme_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( function_exists('domica_sidebars_get_current_position') ) {
		$current_position = domica_sidebars_get_current_position();
		if ( in_array( $current_position, array( 'full', 'left' ) )
		     || empty($current_position)
		     || is_page_template( 'page-templates/full-width.php' )
		     || is_page_template( 'page-templates/contributors.php' )
		     || is_attachment()
		) {
			$classes[] = 'full-width';
		}
	} else {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'blog-widget' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}


	// $c_sticky_footer = (function_exists('fw_get_db_customizer_option')) ? fw_get_db_customizer_option('c_sticky_footer') : 'no';
	// if($c_sticky_footer == 'yes'){
	// 	$classes[] = 'sticky-footer';
	// }
	return $classes;
}

add_filter( 'body_class', 'domica_filter_theme_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
function domica_filter_theme_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}

add_filter( 'post_class', 'domica_filter_theme_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 *
 * @return string The filtered title.
 * @internal
 */
function domica_filter_theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'domica'), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'domica_filter_theme_wp_title', 10, 2 );


/**
 * Flush out the transients used in fw_theme_categorized_blog.
 * @internal
 */
function domica_action_theme_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'domica_theme_category_count' );
}

add_action( 'edit_category', 'domica_action_theme_category_transient_flusher' );
add_action( 'save_post', 'domica_action_theme_category_transient_flusher' );

/**
 * Theme Customizer support
 */
{
	/**
	* Disable/Enable default section in customizer
	*/
	global  $wp_customize;
	if ( isset($wp_customize) && $wp_customize->is_preview() ) {
		function domica_customizer_remove_sections( $wp_customize ) {
			$wp_customize->remove_section( 'featured_content' );
			$wp_customize->remove_control('header_textcolor');
			$wp_customize->remove_control('background_color');
			$wp_customize->remove_section('background_image');
			$wp_customize->remove_section('header_image');
		}
		add_action( 'customize_register' , 'domica_customizer_remove_sections' );
	}
}

/**
 * Register widget areas.
 * @internal
 */
function domica_action_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Widget Area', 'domica'),
		'id'            => 'blog-widget',
		'description'   => esc_html__( 'Appears in the blog sidebar section of the site.', 'domica'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'domica'),
		'id'            => 'footer-widget',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'domica'),
		'before_widget' => '<div class="col-md-3 col-lg-3"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
	) );

	// Register sidebar for shop page,
	// remove it if theme dose not support Woocomerce
	if(class_exists('Woocommerce')) {
		register_sidebar(array(
			'name' => esc_html__('Shop Widget Area', 'domica'),
			'id' => 'shop-widget',
			'description' => esc_html__('Appears in the sidebar of shop page.', 'domica'),
			'before_widget' => '<aside id="%1$s" class="widget shop %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="shop-widget-title">',
			'after_title' => '</h4>',
		));
	}

	// Register sidebar for cause page,
	register_sidebar( array(
		'id'            => 'sidebar_campaign',
		'name'          => esc_html__( 'Campaign sidebar', 'domica' ),
		'description'   => esc_html__( 'The campaign sidebar.', 'domica' ),
		'before_widget' => '<aside id="%1$s" class="widget-campaign cf %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="title-wrapper"><h6 class="widget-campaign-title">',
		'after_title'   => '</h6></div>',
	));

	register_sidebar( array(
		'id'            => 'sidebar_single_campaign',
		'name'          => esc_html__( 'Campaign Single sidebar', 'domica' ),
		'description'   => esc_html__( 'The campaign single sidebar.', 'domica' ),
		'before_widget' => '<aside id="%1$s" class="widget-campaign cf %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="title-wrapper"><h6 class="widget-campaign-title">',
		'after_title'   => '</h6></div>',
	));

}

add_action( 'widgets_init', 'domica_action_theme_widgets_init' );

if ( defined( 'FW' ) ):
	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( 'domica_action_theme_display_form_errors' ) ):
		function domica_action_theme_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'jquery-show-form-errors',
				get_template_directory_uri() . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'bridge-theme-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action('wp_enqueue_scripts', 'domica_action_theme_display_form_errors');
endif;

/**
 * Filter to wp_editor
 * to optimize fw_resize function
 */
add_filter( 'jpeg_quality', 'domica_filter_theme_image_full_quality' );
add_filter( 'wp_editor_set_quality', 'domica_filter_theme_image_full_quality' );

function domica_filter_theme_image_full_quality( $quality ) {
	return 100;
}

// Register new option types
function domica_include_custom_option_types() {
    get_template_part('/inc/includes/option-types/ht-switch/class-fw-option-type', 'ht-switch');
}
add_action('fw_option_types_init', 'domica_include_custom_option_types');


/**
 * Custom css for admin
 * @return [type] [description]
 */
function domica_load_custom_wp_admin_style() {
    wp_register_style( 'domica_custom_admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
    wp_enqueue_style( 'domica_custom_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'domica_load_custom_wp_admin_style' );

add_action( 'admin_enqueue_scripts', 'domica_deregister_woocommerce_setting', 99 );
/**
 * Fixed problem Unyson & YITH
 * conflict color picker
 * @return [type] [description]
 */
function domica_deregister_woocommerce_setting(){
	$screen = get_current_screen();
	if ( $screen->post_type == 'page' ){
			//wp_deregister_script( 'woocommerce_settings' );
	}
}

/**
 * Install Demo content
 */
function domica_backups_demos($demos) {
	$demos_array = array(
		'domica' => array(
			'title' => esc_html__('Domica Demo', 'domica'),
			'screenshot' => get_template_directory_uri().'/screenshot.png',
			'preview_link' => 'haintheme.com/demo/wp/bridge/',
		),
	);

	$download_url = 'http://haintheme.com/ht-demos/';

	foreach ($demos_array as $id => $data) {
		$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
			'url' => $download_url,
			'file_id' => $id,
		));
		$demo->set_title($data['title']);
		$demo->set_screenshot($data['screenshot']);
		$demo->set_preview_link($data['preview_link']);

		$demos[ $demo->get_id() ] = $demo;

		unset($demo);
	}

	return $demos;
}

add_filter('fw:ext:backups-demo:demos', 'domica_backups_demos');

/* *
 * Custom checkout fields
 * $fields is passed via the filter
 */
function domica_custom_checkout_fields( $fields ) {
     $fields['billing']['billing_first_name']['placeholder'] = 'FIRST NAME';
     $fields['billing']['billing_first_name']['label'] = '';
     $fields['billing']['billing_last_name']['placeholder'] = 'LAST NAME';
     $fields['billing']['billing_last_name']['label'] = '';
     $fields['billing']['billing_phone']['placeholder'] = 'PHONE NUMBER';
     $fields['billing']['billing_phone']['label'] = '';
     $fields['billing']['billing_email']['placeholder'] = 'EMAIL ID';
     $fields['billing']['billing_email']['label'] = '';
     $fields['billing']['billing_country']['placeholder'] = 'COUNTRY';
     $fields['billing']['billing_country']['label'] = '';
     $fields['billing']['billing_state']['placeholder'] = 'STATE';
     $fields['billing']['billing_state']['label'] = '';
     $fields['billing']['billing_address_1']['placeholder'] = 'STREET';
     $fields['billing']['billing_address_1']['label'] = '';
     $fields['billing']['billing_address_2']['placeholder'] = 'APARTMENT';
     $fields['billing']['billing_address_2']['label'] = '';
     $fields['billing']['billing_city']['placeholder'] = 'CITY';
     $fields['billing']['billing_city']['label'] = '';
     $fields['billing']['billing_postcode']['placeholder'] = 'POSTAL CODE';
     $fields['billing']['billing_postcode']['label'] = '';
     $fields['billing']['billing_company']['placeholder'] = 'COMPANY NAME';
     $fields['billing']['billing_company']['label'] = '';
     $fields['order']['order_comments']['label'] = 'ORDER NOTE';
     return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'domica_custom_checkout_fields' );

/* *
 * Search for cause template
 */

function domica_search_campaign_template($template) {
	global $wp_query;
	$post_type = get_query_var('post_type');
	if( isset($_GET['s']) && $post_type =='campaign' ) {
		$template = locate_template('search-cause.php');
	}
	return $template;
}
add_filter('template_include', 'domica_search_campaign_template');

/* *
 * Add campaign title as form header
 */
function domica_charitable_show_campaign_title( $form ) {
    if ( ! is_a( $form, 'Charitable_Donation_Form_Interface' ) ) {
        return;
    }
    echo '<div class="donation-form-modal-header"><h6>DONATE THIS CAUSE</h6>';
    echo '<h4>' . get_the_title( $form->get_campaign()->ID ) . '</h4></div>';
}
add_action( 'charitable_form_before_fields', 'domica_charitable_show_campaign_title' );

/* *
 * 	Customize donation form fields
 */
function domica_charitable_change_form_labels( $fields ) {
    
    // Change fields label.
	
    $fields['first_name']['label'] =esc_html__( '', 'domica' );
    $fields['first_name']['placeholder'] =esc_html__( 'Your name *', 'domica' );
    $fields['email']['label'] =esc_html__( '', 'domica' );
    $fields['email']['placeholder'] =esc_html__( 'Email *', 'domica' );
    $fields['address']['label'] =esc_html__( '', 'domica' );
    $fields['address']['placeholder'] =esc_html__( 'Address *', 'domica' );
    $fields['phone']['label'] =esc_html__( '', 'domica' );
    $fields['phone']['placeholder'] =esc_html__( 'Phone', 'domica' );

    // Remove some fields.
    
    unset( $fields[ 'address_2' ],$fields[ 'last_name' ],$fields[ 'city' ],$fields[ 'state' ],$fields[ 'postcode' ],$fields[ 'country' ]  );

    return $fields;
}
add_filter( 'charitable_donation_form_user_fields', 'domica_charitable_change_form_labels' );

/**
 * Add some text before donation form's amount section fields.
 *
 * @param   Charitable_Form $form
 * @return  void
 */
function domica_add_description_to_donation_amount( $fields ) {
    $fields[ 'description_field' ] = array(
        'type'          => 'paragraph',
        'priority'      => 0, 
        'fullwidth'     => true, 
        'content'       => esc_html__( 'Please specify the amount of money you want to donate for this cause. You can choose one of these options below:', 'domica' )
    );
    return $fields;
}
add_filter( 'charitable_donation_form_donation_fields', 'domica_add_description_to_donation_amount' );


/**
 * Add checkbox field to donation form
 * Collect a checkbox field in the donation form. 
 *
 * @param   array[] $fields
 * @param   Charitable_Donation_Form $form
 * @return  array[]
 */
function domica_charitable_collect_checkbox_field( $fields, Charitable_Donation_Form $form ) {
    $fields['checkbox_field'] = array(
        'label'     => esc_html__( 'Make this a monthly donate', 'domica' ), 
        'type'      => 'checkbox', 
        'priority'  => 24,
        'value'     => 1,
        'checked'   => array_key_exists( 'donor_checkbox_field', $_POST ) ? $_POST['donor_checkbox_field'] : $form->get_user_value( 'donor_checkbox_field' ),
        'required'  => true, 
        'data_type' => 'user'
    );
    return $fields;
}
add_filter( 'charitable_donation_form_donation_fields', 'domica_charitable_collect_checkbox_field', 10, 2 );

/**
 * Add checkbox field to donation form
 * Display the Checkbox Field # in the admin donation details box.
 *
 * @param   array[] $meta
 * @param   Charitable_Donation $donation
 * @return  array[]
 */
function domica_charitable_show_checkbox_field_in_admin( $meta, $donation ) {
    $meta['checkbox_field'] = array(
        'label'     => esc_html__( 'Monthly Donate', 'domica' ),
        'value'     => domica_charitable_donation_get_checkbox_field( $donation )
    );
    return $meta;
}
add_filter( 'charitable_donation_admin_meta', 'domica_charitable_show_checkbox_field_in_admin', 10, 2 );

/**
 * Add checkbox field to donation form
 * Display the Checkbox Field # in emails. 
 *
 * @param   string $value
 * @param   array $args
 * @param   Charitable_Email $email
 * @return  string
 */
function domica_charitable_show_checkbox_field_in_email( $value, $args, Charitable_Email $email ) {
    if ( $email->has_valid_donation() ) {
        $value = domica_charitable_donation_get_checkbox_field( $email->get_donation() );
    }
    return $value;
}
add_filter( 'charitable_email_content_field_value_checkbox_field', 'domica_charitable_show_checkbox_field_in_email', 10, 3 );

/**
 * Add checkbox field to donation form
 * Include the Checkbox Field as a column in the Donations export.
 *
 * @param   array $columns
 * @return  array
 */
function domica_charitable_donation_export_add_checkbox_field_column( $columns ) {
    $columns['checkbox_field'] = esc_html__( 'Checkbox Field', 'domica' );
    return $columns;
}
add_filter( 'charitable_export_donations_columns', 'domica_charitable_donation_export_add_checkbox_field_column' );

/**
 * Add checkbox field to donation form
 * Add the Checkbox Field value for donation.
 * 
 * @param   mixed  $value
 * @param   string $key
 * @param   array  $data
 * @return  mixed
 */
function domica_charitable_donation_export_add_checkbox_field_value( $value, $key, $data ) {
    if ( 'checkbox_field' != $key ) {
        return $value;
    }
    return domica_charitable_donation_get_checkbox_field( charitable_get_donation( $data['donation_id'] ) );
}
add_filter( 'charitable_export_data_key_value', 'domica_charitable_donation_export_add_checkbox_field_value', 10, 3 );


/* *
 * 	Add Note Field to donation form
 */
function domica_charitable_add_note_field( $fields, Charitable_Donation_Form $form ) {
    /**
     * Add the field to the array of fields.
     */
    $fields['note_field'] = array(
        'label'     =>esc_html__( '', 'domica' ), 
        'type'      => 'textarea',
        'priority'  => 50,
        'placeholder' =>esc_html__( 'Additional Note', 'domica' ),
        'checked'   => array_key_exists( 'donor_note_field', $_POST ) ? $_POST['donor_note_field'] : $form->get_user_value( 'note_field' ),
        'data_type' => 'user',
    );
    return $fields;
}
add_filter( 'charitable_donation_form_user_fields', 'domica_charitable_add_note_field', 10, 2 );

/**
 * Add Note field to donation form
 * Display the Note Field # in the admin donation details box.
 */
function domica_charitable_show_note_field_in_admin( $meta, $donation ) {
    $meta['note_field'] = array(
        'label'     =>esc_html__( 'Additional Note', 'domica' ),
        'value'     => domica_charitable_donation_get_note_field( $donation )
    );
    return $meta;
}
add_filter( 'charitable_donation_admin_meta', 'domica_charitable_show_note_field_in_admin', 10, 2 );

/**
 * Add Note field to donation form
 * Display the Checkbox Field # in emails. 
 *
 * @param   string $value
 * @param   array $args
 * @param   Charitable_Email $email
 * @return  string
 */
function domica_charitable_show_note_field_in_email( $value, $args, Charitable_Email $email ) {
    if ( $email->has_valid_donation() ) {
        $value = domica_charitable_donation_get_note_field( $email->get_donation() );
    }
    return $value;
}
add_filter( 'charitable_email_content_field_value_checkbox_field', 'domica_charitable_show_note_field_in_email', 10, 3 );

/**
 * Add Note field to donation form
 * Include the Checkbox Field as a column in the Donations export.
 */
function domica_charitable_donation_export_add_note_field_column( $columns ) {
    $columns['note_field'] = esc_html__( 'Note Field', 'domica' );
    return $columns;
}
add_filter( 'charitable_export_donations_columns', 'domica_charitable_donation_export_add_note_field_column' );

/**
 * Add Note field to donation form
 * Add the Checkbox Field value for donation.
 * 
 */
function domica_charitable_donation_export_add_note_field_value( $value, $key, $data ) {
    if ( 'note_field' != $key ) {
        return $value;
    }
    return domica_charitable_donation_get_checkbox_field( charitable_get_donation( $data['donation_id'] ) );
}
add_filter( 'charitable_export_data_key_value', 'domica_charitable_donation_export_add_note_field_value', 10, 3 );

/**
 * Campaign hooks
 */
function domica_customize_default_template_functions() {
	/**
	 * Campaigns loop, before title.
	 *
	 * @see domica_template_campaign_loop_stats
	 * @see domica_template_campaign_loop_creator
	 */
	add_action( 'charitable_campaign_content_loop_after', 'domica_template_campaign_loop_stats', 6 );
	remove_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_progress_bar', 6 );
	remove_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_loop_donation_stats', 8 );
	remove_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_loop_donate_link', 10 );

	/**
	 * Single campaign, top of the page.
	 *
	 * @see domica_template_campaign_summary
	 */

	add_action( 'charitable_single_campaign_before', 'domica_template_campaign_summary', 2 );

	/**
	 * Single campaign, before summary.
	 *
	 * @see domica_template_campaign_title
	 * @see charitable_template_campaign_description
	 * @see charitable_campaign_summary_before
	 */
	add_action( 'charitable_campaign_summary_before', 'domica_template_campaign_title', 2 );
	add_action( 'charitable_campaign_summary_before', 'charitable_template_campaign_description', 4 );
	add_action( 'charitable_campaign_summary_before', 'domica_template_campaign_media_before_summary', 6 );


	/**
	 * Single campaign summary.
	 *
	 * @see charitable_template_campaign_finished_notice
	 * @see domica_template_campaign_progress_barometer
	 * @see domica_template_campaign_stats
	 */
	add_action( 'charitable_campaign_summary', 'charitable_template_campaign_finished_notice', 2 );
	add_action( 'charitable_campaign_summary', 'domica_template_campaign_progress_barometer', 4 );
	add_action( 'charitable_campaign_summary', 'domica_template_campaign_stats', 6 );
	remove_action( 'charitable_campaign_summary', 'charitable_template_campaign_percentage_raised', 4 );
	remove_action( 'charitable_campaign_summary', 'charitable_template_campaign_donation_summary', 6 );
	remove_action( 'charitable_campaign_summary', 'charitable_template_campaign_donor_count', 8 );
	remove_action( 'charitable_campaign_summary', 'charitable_template_donate_button', 12 );

	/**
	 * Single campaign, before content.
	 *
	 * @see domica_template_campaign_media_before_content
	 */
	// add_action( 'charitable_campaign_content_before', 'domica_template_campaign_media_before_content', 6 );
	remove_action( 'charitable_campaign_content_before', 'charitable_ambassadors_template_edit_campaign_link', 2 );
	remove_action( 'charitable_campaign_content_before', 'charitable_template_campaign_description', 4 );
	remove_action( 'charitable_campaign_content_before', 'charitable_template_campaign_summary', 6 );


}
add_action( 'after_setup_theme', 'domica_customize_default_template_functions', 11 ); 