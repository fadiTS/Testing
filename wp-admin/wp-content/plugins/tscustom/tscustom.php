<?php
/**
* Plugin Name: TS Custom
* Plugin URI: http://
* Description: Automatic css/js loading for site custom modifications
* Version: 1.1
* Author: Ryan Fleet
* Author URI: 
* License: 
*/

/*
	1.0 - Release
	1.1 - June 01 2016 - Added parent paths to file uri.
*/

define('TS_CUSTOM_CODE_LOAD_WEIGHT', 10000);
define('TS_CUSTOM_CODE_BASE_DIR', WP_CONTENT_DIR);
define('TS_CUSTOM_CODE_BASE_URL', WP_CONTENT_URL);
define('TS_CUSTOM_CODE_CSS_DIR', '/css/');
define('TS_CUSTOM_CODE_JS_DIR', '/js/');
define('TS_CUSTOM_ALL_PAGES', 'all-pages');
define('TS_CUSTOM_CSS_EXT', '.css');
define('TS_CUSTOM_JS_EXT', '.js');


add_action('init', 'tscustom_init');
add_action('wp_enqueue_scripts', 'tscustom_enqueue', TS_CUSTOM_CODE_LOAD_WEIGHT);

/* Fires after WordPress has finished loading but before any headers are sent. */
function tscustom_init() {
	wp_mkdir_p(TS_CUSTOM_CODE_BASE_DIR . TS_CUSTOM_CODE_CSS_DIR);
	$file = TS_CUSTOM_CODE_BASE_DIR . TS_CUSTOM_CODE_CSS_DIR . TS_CUSTOM_ALL_PAGES . TS_CUSTOM_CSS_EXT;
	if(!file_exists($file) ) {
		touch($file);
	}
	
	wp_mkdir_p(TS_CUSTOM_CODE_BASE_DIR . TS_CUSTOM_CODE_JS_DIR);
	$file = TS_CUSTOM_CODE_BASE_DIR . TS_CUSTOM_CODE_JS_DIR . TS_CUSTOM_ALL_PAGES . TS_CUSTOM_JS_EXT;
	if(!file_exists($file) ) {
		touch($file);
	}
}

function tscustom_enqueue() {
	global $post;
	$slug = get_page_uri($post->ID);
	tscustom_enqueue_css(TS_CUSTOM_ALL_PAGES);
	tscustom_enqueue_js(TS_CUSTOM_ALL_PAGES);
	tscustom_enqueue_css($slug);
	tscustom_enqueue_js($slug);
}

function tscustom_enqueue_css($name) {
	$file = TS_CUSTOM_CODE_CSS_DIR . $name . TS_CUSTOM_CSS_EXT;
	$path = TS_CUSTOM_CODE_BASE_DIR . $file;
	$url = TS_CUSTOM_CODE_BASE_URL . $file;
	
	if(file_exists($path)) {
		wp_enqueue_style($name, $url);
	}
}

function tscustom_enqueue_js($name) {
	$file = TS_CUSTOM_CODE_JS_DIR . $name . TS_CUSTOM_JS_EXT;
	$path = TS_CUSTOM_CODE_BASE_DIR . $file;
	$url = TS_CUSTOM_CODE_BASE_URL . $file;
	
	if(file_exists($path)) {
		wp_enqueue_script($name, $url, array(), false, true);
	}
}
