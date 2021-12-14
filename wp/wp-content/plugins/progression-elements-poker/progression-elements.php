<?php
/*
Plugin Name: Progression Theme Elements - poker
Text Domain: progression-elements-poker
Plugin URI: http://progressionstudios.com
Description: Theme Elements for Progression Studios Theme
Version: 1.1
Author: Progression Studios
Author URI: http://progressionstudios.com/
Author Email: contact@progressionstudios.com
License: GNU General Public License v3.0
Text Domain: progression-elements-poker
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


define( 'PROGRESSION_THEME_ELEMENTS_URL', plugins_url( '/', __FILE__ ) );
define( 'PROGRESSION_THEME_ELEMENTS_PATH', plugin_dir_path( __FILE__ ) );


// Translation Setup
add_action('plugins_loaded', 'progression_theme_elements_poker');
function progression_theme_elements_poker() {
	load_plugin_textdomain( 'progression-elements-poker', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}


// CSS Styles in Admin
function progression_theme_poker_elements_wp_admin_style() {
    wp_register_style( 'progression-elements-poker-admin-styles',  PROGRESSION_THEME_ELEMENTS_URL . 'assets/css/style.css' );
    wp_enqueue_style( 'progression-elements-poker-admin-styles' );
    wp_enqueue_script( 'progression_studios_import_data', plugin_dir_url( __FILE__ ) . 'assets/js/importdata.js' );
}
add_action( 'admin_enqueue_scripts', 'progression_theme_poker_elements_wp_admin_style' );



/**
* Enqueue or de-enqueue third party plugin scripts/styles
*/
function progression_poker_theme_elements_dequeue_styles_scripts() {
     wp_deregister_script( 'boosted_elements_progression_flexslider_js' ); //Removing a script
}
add_action( 'wp_enqueue_scripts', 'progression_poker_theme_elements_dequeue_styles_scripts', 100 );




/**
 * Social Icon Widget
 */
require PROGRESSION_THEME_ELEMENTS_PATH.'inc/social-widget.php';