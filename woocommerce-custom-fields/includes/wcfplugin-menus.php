<?php

function wcfplugin_settings_page_markup()
{
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }
  include( WCFPLUGIN_DIR . 'templates/admin/settings-page.php');
}

function wcfplugin_settings_pages()
{
  // add_menu_page(
  //   __( 'WooCommerce Custom Fields', 'wcfplugin' ),
  //   __( 'Woo Fields', 'wcfplugin' ),
  //   'manage_options',
  //   'wcfplugin',
  //   'wcfplugin_settings_page_markup',
  //   'dashicons-screenoptions',
  //   100
  // );

  add_submenu_page(
    'woocommerce',
    __( 'WooCommerce Custom Fields', 'wcfplugin' ),
    __( 'Woo Fields', 'wcfplugin' ),
    'manage_options',
    'wcfplugin',
    'wcfplugin_settings_page_markup'
  );

}
add_action( 'admin_menu', 'wcfplugin_settings_pages' );

// Add a link to your settings page in your plugin
function wcfplugin_add_settings_link( $links ) {
  $settings_link = '<a href="admin.php?page=wcfplugin">' . __( 'Settings', 'wcfplugin' ) . '</a>';
  array_push( $links, $settings_link );
  return $links;
}
$filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
add_filter( $filter_name, 'wcfplugin_add_settings_link' );
