 <?php
/**
 * Sample implementation for Registering Custom fonts
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package taxispirit
 */
 

function taxispirit_fonts_url() {

	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Poppins, translate this to 'off'. Do not translate
	 * into your own language.
	 */

	$poppins = _x( 'on', 'Poppins font: on or off', 'taxispirit' );

	if ( 'off' !== $poppins ) {
		$font_families = array();

		$font_families[] = 'Poppins:300,400,500,600,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function taxispirit_resource_hints($urls, $relation_type) {
	if (wp_style_is('taxispirit-fonts', 'queue') && 'preconnect' === $relation_type) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}

add_filter('wp_resource_hints', 'taxispirit_resource_hints', 10, 2);