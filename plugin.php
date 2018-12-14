<?php
/*
Plugin Name: YOURLS TN
Plugin URI: https://github.com/sgiovagnoli/YOURLS-TN
Description: Display thumbnails on YOURLS admin page
Version: 1.0.181214
Author: sgiovagnoli
Author URI: https://github.com/sgiovagnoli/
*/

// Get your free API key at thumbnail.ws and write it here :
define( 'THUMBNAIL_WS_API_KEY', 'YOUR-FREE-API-KEY' );
// Width of the thumbnail on admin page (in pixel) :
define( 'ADM_THUMBNAIL_WS_WIDTH', '200' );
// Width of thumbnail on stat page (in pixel) :
define( 'STAT_THUMBNAIL_WS_WIDTH', '500' );

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// Start : add Translation
yourls_load_custom_textdomain( 'TN', dirname(__FILE__) . '/l10n/' );

function TN_translate__($message) { 
	$my_TN_domain = 'TN';
	return yourls_esc_html__($message, $my_TN_domain );
	}
// End : add translation

// Start : add table head column 'Preview'
yourls_add_filter( 'table_head_cells', 'tn_table_head' );

function tn_table_head( $headvalue ) { 
	$tnhead = array('preview'  => TN_translate__( 'Preview' ))+$headvalue;
	
	return $tnhead;
}
// End : add table head column 'Preview'

// Start : add cell with preview on each row
yourls_add_filter( 'table_add_row_cell_array', 'tn_table_row' );

function tn_table_row( $rowvalue ) {
	$tnrow = array('preview' => array(
			'template'      => '<img src="https://api.thumbnail.ws/api/'.THUMBNAIL_WS_API_KEY.'/thumbnail/get?url=%long_url%&width='.ADM_THUMBNAIL_WS_WIDTH.'" />',
			'long_url'      => $rowvalue[url][long_url]
		))+$rowvalue;
		
	return $tnrow;
}
// End : add cell with preview on each row

// Start : add preview on stat page
yourls_add_action( 'admin_menu', 'tn_stats' );

function tn_stats() {
	// Get request in YOURLS base (eg in 'http://sho.rt/yourls/abcd' get 'abdc')
	$request = yourls_get_request();
	
	// Make valid regexp pattern from authorized charset in keywords
	$pattern = yourls_make_regexp_pattern( yourls_get_shorturl_charset() );
	
	if( preg_match( "@^([$pattern]+)\+(all)?/?$@", $request) ) {
		echo '<img src="https://api.thumbnail.ws/api/'.THUMBNAIL_WS_API_KEY.'/thumbnail/get?url='.yourls_get_keyword_longurl($request).'&width='.STAT_THUMBNAIL_WS_WIDTH.'" />';
	}
}
// End : add preview on stat page