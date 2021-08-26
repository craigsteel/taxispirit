<?php
/**
 * Taxi Spirit functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package taxispirit
 */

// No direct access, please
if (!defined('ABSPATH')) exit; // Exit if accessed directly

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


if ( ! function_exists( 'taxispirit_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function taxispirit_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on taxispirit, use a find and replace
		 * to change 'taxispirit' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'taxispirit', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'taxispirit-full-bleed', 2000, 1200, true );
		add_image_size('taxispirit-index-img', 800, 350, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Header', 'taxispirit' ),
			'top' => esc_html__( 'Top', 'Top Menu', 'taxispirit' ),
			'social' => esc_html__( 'Social', 'Media Menu', 'taxispirit' ),
			'footer' => esc_html__( 'Footer', 'Navigation', 'taxispirit' ),

		) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 
			'html5', 
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 
			'custom-background', 
			apply_filters( 
				'taxispirit_custom_background_args', 
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				) 
			) 
		);

		//add SVG to allowed file uploads
		function add_file_types_to_uploads($file_types)
		{

		$new_filetypes = array();
		$new_filetypes['svg'] = 'dist/assets/images/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes);

		return $file_types;
		}
	
		add_action('upload_mimes', 'add_file_types_to_uploads');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 
			'custom-logo', 
			array(
				'height'      => 100,
				'flex-height' => true,
				'width'       => 129,
				'flex-width'  => true,
			) 
		);
	}
endif;
add_action( 'after_setup_theme', 'taxispirit_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function taxispirit_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'taxispirit_content_width', 640 );
}
add_action( 'after_setup_theme', 'taxispirit_content_width', 0 );

/**
 * Filter the excerpt length to 30 words.
 *
 * @param int $length Excerpt length.
 */
function taxispirit_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'taxispirit_custom_excerpt_length', 999 );


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function taxispirit_content_image_sizes_attr($sizes, $size) {
	$width = $size[0];

	if (900 <= $width) {
		$sizes = '(min-width: 900px) 700px, 900px';
	}

	if (is_active_sidebar('sidebar-1') || is_active_sidebar('sidebar-2')) {
		$sizes = '(min-width: 900px) 600px, 900px';
	}

	return $sizes;
}
add_filter('wp_calculate_image_sizes', 'taxispirit_content_image_sizes_attr', 10, 2);

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function taxispirit_header_image_tag($html, $header, $attr) {
	if (isset($attr['sizes'])) {
		$html = str_replace($attr['sizes'], '100vw', $html);
	}
	return $html;
}
add_filter('get_header_image_tag', 'taxispirit_header_image_tag', 10, 3);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function taxispirit_post_thumbnail_sizes_attr($attr, $attachment, $size) {
	if (!is_singular()) {
		if (is_active_sidebar('sidebar-1')) {
			$attr['sizes'] = '(max-width: 900px) 90vw, 800px';
		} else {
			$attr['sizes'] = '(max-width: 1000px) 90vw, 1000px';
		}
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'taxispirit_post_thumbnail_sizes_attr', 10, 3);

/**
 * Enqueue scripts and styles.
 */
function taxispirit_scripts() {
	wp_enqueue_style( 'taxispirit-fonts', taxispirit_fonts_url() );
	wp_enqueue_style( 'taxispirit-style', get_stylesheet_uri() );
	wp_enqueue_style( 'taxispirit-customstyle', get_template_directory_uri() . '/dist/assets/css/style.css', array(), 'all' );

	wp_enqueue_script( 'taxispirit-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', array('jquery'), '1.0.0', true );
	wp_localize_script( 'taxispirit-navigation', 'taxispiritScreenReaderText', array(
		'expand' => __( 'Expand child menu', 'taxispirit' ),
		'collapse' => __('Collapse child menu', 'taxispirit'),
	));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'taxispirit_scripts');

function taxispirit_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'taxispirit_add_woocommerce_support' );

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns');
	if (!function_exists('loop_columns')) {
		function loop_columns() {
		return 3; // 3 products per row
	}
}

/**
 * Removes postal code validation from WC.
 */
add_filter('woocommerce_validate_postcode', 'postal_code_validation', 10, 3);

	function postal_code_validation($valid, $postcode, $country) {
		$gateways = WC()->payment_gateways->get_available_payment_gateways();

		if (!isset($gateways['eh_stripe_pay'])) {
			return $valid;
		}

		if ('GB' === $country || 'CA' === $country) {
			return true;
		}
		return $valid;
	}

/**
 * Implement the Custom admin functions.
 */
require get_template_directory() . '/inc/cleanup.php';

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * Remove default WooCommerce wrappersidebar.
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

/**
 * Customizer Additions Add Cart to Menu.
 */
require get_template_directory() . '/inc/woocommerce-menu-cart.php';

/**
 * Insure that a featured image is required.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Register widget area..
 */
require get_template_directory() . '/inc/sidebars.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Implement the Custom Fonts
 */
require get_template_directory() . '/inc/custom-fonts.php';

/**
 * Add social icons to customizer additions.
 */
require get_template_directory() . '/inc/social-icons-menu.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * google analytics.
 */
require get_template_directory() . '/inc/google_analytics.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
