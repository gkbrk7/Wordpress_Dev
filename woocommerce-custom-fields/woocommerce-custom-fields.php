<?php
/*
Plugin Name: Woocommerce Custom Fields
Plugin URI: https://github.com/gkbrk7
Description: A plugin for add/remove WooCommerce custom registration fields.
Version: 1.0.0
Contributors: gokberk
Author: Gökberk YILDIRIM
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wcfplugin
Domain Path:  /woocustomfields
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

// Define plugin paths and URLs
define( 'WCFPLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WCFPLUGIN_DIR', plugin_dir_path( __FILE__ ) );


// Create Settings Fields
include( plugin_dir_path( __FILE__ ) . 'includes/wcfplugin-settings-fields.php');

// Create Plugin Admin Menus and Setting Pages
include( plugin_dir_path( __FILE__ ) . 'includes/wcfplugin-menus.php');

// Manage Woocommerce Registration Fields
include( plugin_dir_path( __FILE__ ) . 'includes/wcfplugin-manage-fields.php');

?>
