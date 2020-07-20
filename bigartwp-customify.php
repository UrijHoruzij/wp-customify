<?php
/*
Plugin Name: BigArtWP-Customify
Description: A Theme Customizer Booster to easily customize Fonts, Colors, and other options for your site.
Version: 1.0.0
Text Domain: bigartwp-customify
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Domain Path: /languages/
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
require_once 'customizer-register.php';
function load_customize_classes( $wp_customize ) {
	require_once 'includes/control-font-selector/functions.php';
	require_once 'includes/control-presets/class-customizer-presets.php';
	require_once 'includes/control-radio/class-customizer-radio.php';
	require_once 'includes/control-repeater/class-customizer-repeater.php';
	require_once 'includes/control-tabs/class-customizer-tabs.php';
}
add_action( 'customize_register', 'load_customize_classes', 0 );

function load_languages() {
	load_plugin_textdomain( 'bigartwp-customify', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
add_action( 'plugins_loaded', 'load_languages' );