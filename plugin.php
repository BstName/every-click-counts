<?php
/*
Plugin Name: Every Click Counts 
Plugin URI: http://github/bstname/every-click-counts
Description: Plugin to count every click, that is, including multiple clicks for the same client.
Version: 1.0
Author: BestNa.me Labs (@bstname)
Author URI: http://BestNa.me/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();
   
yourls_add_action( 'pre_redirect', 'bstname_ecc_redirect_dont_cache_301' );
 
/** 
 * Redirect to another page and prevent caching of HTTP 301 redirects
 *
 * Largely based on yourls_redirect().
 * 
 * Prevents browser caching of HTTP 301 redirects. 
 * That way, multiple clicks for the same client are included in the clicks statistics.
 *
 * @param array $args array of arguments, string $args[0] the location to redirect to, int $args[1] status header code
 * @return void
 */ 
function bstname_ecc_redirect_dont_cache_301( $args ) {
	$location = $args[0];
	$code     = $args[1];
	if( $code != 301 )
		return;
	$location = yourls_apply_filter( 'redirect_location', $location, $code );
	$code     = yourls_apply_filter( 'redirect_code', $code, $location );
	// Redirect, either properly if possible, or via Javascript otherwise
	if( !headers_sent() ) {
		yourls_status_header( $code );
		header( 'Expires: Thu, 23 Mar 1972 07:00:00 GMT' );
		header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
		header( 'Cache-Control: no-cache, must-revalidate, max-age=0' );
		header( 'Pragma: no-cache' ); 
		header( "Location: $location" );
	} else {
		yourls_redirect_javascript( $location );
	}
	die();
}

