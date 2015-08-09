<?php
   /*
   Plugin Name: WP Ionic Icons
   Plugin URI: https://wordpress.org/plugins/wp-ionic-icons/
   Description: This plugin allows you to easily embed Ionicons to your website using HTML or built-in shortcode handlers.
   Version: 1.0
   Author: Zayed Baloch
   Author URI: http://pixeldesign.io/
   License: GPL2
   */

defined('ABSPATH') or die("No script kiddies please!");
define( 'ZB_VERSION',   '1.0' );
define( 'ZB_WPION_URL', plugins_url( '', __FILE__ ) );
define( 'ZB_TEXTDOMAIN',  'wp_ionicons' );

function zb_wp_ionic_icons() {
  load_plugin_textdomain( ZB_TEXTDOMAIN );
}
add_action( 'init', 'zb_wp_ionic_icons' );

function wp_ionicons_style() {
  wp_register_style('ionicons-css', ZB_URL . '/ionicons/css/ionicons.min.css', array(), ZB_VERSION);
  wp_enqueue_style('ionicons-css');
}
add_action('wp_enqueue_scripts', 'wp_ionicons_style');

function wp_ion_shortcode( $atts ) {
  extract( shortcode_atts( array( 'icon' => 'home', ), $atts ) );
  return '<i class="icon ion-'.str_replace('ion-','',$icon).'"></i>';
}

add_shortcode( 'wpion', 'wp_ion_shortcode' );
add_filter('wp_nav_menu_items', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');
add_filter('widget_title', 'do_shortcode');
