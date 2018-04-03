<?php
/**
* Plugin Name: TS Patch
* Plugin URI: http://
* Description: Site patches
* Version: 1.1
* Author: Tyger Shark
* Author URI: 
* License: 
*/

/*
	1.0 - Release
	1.1 - June 30 2016  - Added remove update notifications.
 						- Enable/Disable Google maps API check option.
*/

/* Remove any opportunity to edit plugins from inside wordpress */
define('DISALLOW_FILE_EDIT', true);

/* Google API Key */
define('TS_API_KEY', 'AIzaSyCz6wG96bVgKtBbF9QV0E4jBcBC9Dv_oEA');



add_action('init', 'tspatch_init', 10000);
add_action('wp_print_scripts', 'tspatch_dequeue_script', 10000);
add_action('admin_menu', 'tspatch_admin_menu');
add_action('after_setup_theme','tspatch_remove_updates');


/* Fires after WordPress has finished loading but before any headers are sent. */
function tspatch_init() {
	$key = esc_attr(get_option('tspatch_google_maps_key', TS_API_KEY));
	if(strlen($key) < 1) {
		$key = TS_API_KEY;
	}
	
	/* disable the wordpress meta generator */
	remove_action('wp_head', 'wp_generator');
	
	wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . $key);   
}

function tspatch_dequeue_script() {
	$maps_api_enabled = esc_attr(get_option('tspatch_google_maps_enabled', 1));
	
	if($maps_api_enabled) {
		/* remove google map api from loading in bridge functions.php */
		wp_dequeue_script('google_map_api');
		wp_deregister_script('google_map_api');
		
		/* Visual Composer Ultimate Addon's google map */	
		wp_dequeue_script('googleapis');
		wp_deregister_script('googleapis');
	}
}

function tspatch_admin_menu() {
	add_options_page('TS Patch Options', 'TS Patch', 'manage_options', 'ts-patch-options', 'tspatch_admin_page');
	add_action('admin_init', 'tspatch_register_settings' ); //call register settings function
}

function tspatch_register_settings() {
	register_setting('tspatch-settings-group', 'tspatch_google_maps_key');
	register_setting('tspatch-settings-group', 'tspatch_google_maps_enabled');
	register_setting('tspatch-settings-group', 'tspatch_remove_notifications');
}

function tspatch_admin_page() {
	$key = esc_attr(get_option('tspatch_google_maps_key', TS_API_KEY));
	if(strlen($key) < 1) {
		$key = TS_API_KEY;
	}
	
	$maps_api_enabled = esc_attr(get_option('tspatch_google_maps_enabled', 1));
	$remove_notifications = esc_attr(get_option('tspatch_remove_notifications', 0));
	
	$values = array();
	$values['google_maps_api_key'] = $key;
	$values['google_maps_enabled'] = $maps_api_enabled;
	
	$values['remove_notifications'] = $remove_notifications;
	
	require "tspatch_admin_view.php";
}

function tspatch_remove_updates() {
	$remove_notifications = esc_attr(get_option('tspatch_remove_notifications', 0));
	
	if($remove_notifications) {
		if(! current_user_can('update_core')){ return; }
	  	add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
	  	add_filter('pre_option_update_core','__return_null');
	  	add_filter('pre_site_transient_update_core','__return_null');
		remove_action('load-update-core.php','wp_update_plugins');
		add_filter('pre_site_transient_update_plugins','__return_null');
	}
}
