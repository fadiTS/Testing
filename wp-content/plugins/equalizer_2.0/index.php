<?php
/**
 * Plugin Name: Height Equalizer
 * Plugin URI: http://www.tygershark.com
 * Description: Create multiple content columns with equal and responsive height.
 * Version: 1.0.2
 * Author: Fadi Shawish
 * Author URI: http://www.tygershark.com
 * License: GPL2
 */
add_shortcode('equalizer', 'equalizer');
function equalizer($content_details, $content){
 
	wp_enqueue_script( 'equalize',  plugins_url().'/'.basename(__dir__) . '/js/equalize.js', array(), '1.0.0', true );
	$classNmae = explode('{', $content_details['css']);
	$classNmae = str_replace('.', '', $classNmae);
	$data = '<div class="fa-equalize '.$content_details['class'].' '.$classNmae[0].'">';
	$data .= do_shortcode($content);
	$data .= '</div>';
	return $data;
}
add_action( 'vc_before_init', 'reg_equalizer' );
function reg_equalizer(){
        vc_map(
        array(
           "name" => __("Height Equalizer", "equalize"),
           "base" => "equalizer",
           "category" => __('Content', "equalize"),
		   "icon" => "my_bartag", // New param added
		   "content_element" => true,
		   "admin_enqueue_css" => array( plugins_url().'/'.basename(__dir__) . '/css/style.css' ),
		   "category" => __( "Content", "my-text-domain"),
           "params" => array(
              array(
                 "type" => "textarea_html",
                 "holder" => "div",
                 "heading" => __("Content", "my-text-domain"),
                 "param_name" => "content",
                 "class" => "",
                 "value" => __("", "my-text-domain"),
                 "description" => __("Content of the column", "my-text-domain")
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "heading" => __("Add Custom Class Name", "my-text-domain"),
                 "param_name" => "class",
                 "value" => __("", "my-text-domain"),
                 "description" => __("Custom class", "my-text-domain")
              ),
              // array(
              //    "type" => "colorpicker",
              //    "holder" => "div",
              //    "heading" => __("Font Color", "my-text-domain"),
              //    "param_name" => "font_color",
              //    "value" => __("", "my-text-domain")
              // ),
              // array(
              //    "type" => "colorpicker",
              //    "holder" => "div",
              //    "heading" => __("Container background color", "my-text-domain"),
              //    "param_name" => "color",
              //    "value" => __("")
              // ),
              // array(
              //    "type" => "textfield",
              //    "holder" => "div",
              //    "heading" => __("Container Padding", "my-text-domain"),
              //    "param_name" => "padding",
              //    "value" => __(""),
              //    "description" => __("Ex. 15px or 15px 15px 15px 15px", "my-text-domain")
              // ),
			  array(
				  'type' => 'css_editor',
				  'heading' => __( 'Css', 'my-text-domain' ),
				  'param_name' => 'css',
				  'group' => __( 'Design options', 'my-text-domain' ),
			  ),
           )
        ) 
    );
}
?>