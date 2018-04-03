<?php
/*
Plugin Name: Qode Restaurant
Description: Plugin that adds features to our theme
Author: Qode Themes
Version: 1.0.1
*/

include_once 'load.php';

add_action('after_setup_theme', array(QodeRestaurant\CPT\PostTypesRegister::getInstance(), 'register'));

if(!function_exists('qode_restaurant_load_assets')) {
	function qode_restaurant_load_assets() {
		wp_enqueue_style('qode_restaurant_script', plugins_url('/assets/css/qode-restaurant.min.css', __FILE__), array(), '');
		wp_enqueue_style('qode_restaurant_responsive_script', plugins_url('/assets/css/qode-restaurant-responsive.min.css', __FILE__), array(), '');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('qode_restaurant_script', plugins_url('/assets/js/qode-restaurant.min.js', __FILE__), array('jquery','ajax'), '', true);
	}

	add_action('wp_enqueue_scripts', 'qode_restaurant_load_assets');
}