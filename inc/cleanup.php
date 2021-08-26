<?php
/**
 *  Remove Generator Version Number
 *
 * @package taxispirit
 */

 /* remove version string from js and css */
 function taxispirit_remove_wp_version_string( $src ) {

 	global $wp_version;
 	parse_str( parse_url($src, PHP_URL_QUERY), $query );
 	if ( !empty( $qury['ver'] ) && $query['ver'] === $wp_version ) {
 		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
 }
 add_filter( 'script_loader_src', 'taxispirit_remove_wp_version_string' );
 add_filter( 'style_loader_src', 'taxispirit_remove_wp_version_string' );

 /* remove metatag generator from header */
 function taxispirit_remove_meta_version() {
 	return '';
 }
 add_filter( 'the_generator', 'taxispirit_remove_meta_version');