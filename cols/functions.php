<?php
/**
 * Cols functions and definitions
 *
 * @package Cols
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 680; /* pixels */
}

if ( ! function_exists( 'cols_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cols_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Cols, use a find and replace
	 * to change 'cols' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cols', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'cols-featured-image', 680, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cols' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'chat', 'audio'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cols_custom_background_args', array(
		'default-color' => 'f6f5ed',
	) ) );
}
endif; // cols_setup
add_action( 'after_setup_theme', 'cols_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function cols_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cols' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'cols_widgets_init' );


/**
 * Returns the Google font stylesheet URL, if available.
 *
 * @since cols 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function cols_sourcesans_font_url() {

	$sourcesans_font_url = '';

	/* translators: If there are characters in your language that are not supported
	   by Arimo, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Source sans font: on or off', 'cols' ) ) {

		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Armio character subsets,
		 * translate this to 'devangari'.
		 * Do not translate these strings into your own langauge.
		 */
		$subset = _x( 'no-subset', 'Source Sans Pro: add new subset (vietnamese)', 'cols' );

		if ( 'vietnamese' == $subset ) {
			$subsets .= 'vietnamese';
		}

		$query_args = array(
			'family' => urlencode( 'Source Sans Pro:300,400,500,600,700' ),
			'subset' => urlencode( $subsets ),
		);

		$sourcesans_font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	}

	return $sourcesans_font_url;
}

/**
 * Returns the Google font stylesheet URL, if available.
 *
 * @since cols 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function cols_sourceserif_font_url() {

	$sourceserif_font_url = '';

	/* translators: If there are characters in your language that are not supported
	   by Arimo, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Source serif font: on or off', 'cols' ) ) {

		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Armio character subsets,
		 * translate this to 'devangari'.
		 * Do not translate these strings into your own langauge.
		 */
		$subset = _x( 'no-subset', 'Source Serif: add new subset (vietnamese)', 'cols' );

		if ( 'vietnamese' == $subset ) {
			$subsets .= 'vietnamese';
		}

		$query_args = array(
			'family' => urlencode( 'Source Serif Pro:300,400,500,600,700' ),
			'subset' => urlencode( $subsets ),
		);

		$sourceserif_font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	}

	return $sourceserif_font_url;
}

/**
 * Enqueue Google Fonts for admin
 */
function cols_admin_fonts() {
	wp_enqueue_style( 'cols-admin-sourcesans', cols_sourcesans_font_url(), array(), null );
	wp_enqueue_style( 'cols-admin-sourceserif', cols_sourceserif_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'cols_admin_fonts' );



/**
 * Enqueue scripts and styles.
 */
function cols_scripts() {
	wp_enqueue_style( 'cols-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'cols-ie', get_template_directory_uri() . '/css/ie.css', array(), '20142110' );
	wp_style_add_data( 'cols-ie', 'conditional', 'lt IE 9' );

	wp_enqueue_style( 'cols-sourcesans', cols_sourcesans_font_url(), array(), null );
	wp_enqueue_style( 'cols-sourceserif', cols_sourceserif_font_url(), array(), null );

	wp_enqueue_script( 'cols-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'cols-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cols_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



