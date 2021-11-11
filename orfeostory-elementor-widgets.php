<?php
/*
Plugin Name: Orfeostory Elementor Widgets
Description: Base of future plugin
Version: 0.0.1
Author: Orfeostory Team
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define MOS_OEW_FILE.
if ( ! defined( 'MOS_OEW_FILE' ) ) {
	define( 'MOS_OEW_FILE', __FILE__ );
}
// Define MOS_OEW_SETTINGS.
if ( ! defined( 'MOS_OEW_SETTINGS' ) ) {
	define( 'MOS_OEW_SETTINGS', admin_url('/options-general.php?page=mos_oew_settings') );
}
$mos_oew_options = get_option( 'mos_oew_options' );
$plugin = plugin_basename(MOS_OEW_FILE); 
require_once ( plugin_dir_path( MOS_OEW_FILE ) . 'orfeostory-elementor-widgets-functions.php' );
require_once ( plugin_dir_path( MOS_OEW_FILE ) . 'orfeostory-elementor-widgets-settings.php' );
//require_once ( plugin_dir_path( MOS_OEW_FILE ) . 'custom-settings.php' );

/*require_once ( plugin_dir_path( MOS_OEW_FILE ) . 'plugins/update/plugin-update-checker.php');
$pluginInit = Puc_v4_Factory::buildUpdateChecker(
	'https://raw.githubusercontent.com/mostak-shahid/update/master/orfeostory-elementor-widgets.json',
	MOS_OEW_FILE,
	'orfeostory-elementor-widgets'
);*/


register_activation_hook(MOS_OEW_FILE, 'mos_oew_activate');
add_action('admin_init', 'mos_oew_redirect');
 
function mos_oew_activate() {
    $mos_oew_option = array();
    // $mos_oew_option['mos_login_type'] = 'basic';
    // update_option( 'mos_oew_option', $mos_oew_option, false );
    add_option('mos_oew_do_activation_redirect', true);
}
 
function mos_oew_redirect() {
    if (get_option('mos_oew_do_activation_redirect', false)) {
        delete_option('mos_oew_do_activation_redirect');
        if(!isset($_GET['activate-multi'])){
            wp_safe_redirect(MOS_OEW_SETTINGS);
        }
    }
}

// Add settings link on plugin page
function MOS_OEW_SETTINGS_link($links) { 
  $settings_link = '<a href="'.MOS_OEW_SETTINGS.'">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
} 
add_filter("plugin_action_links_$plugin", 'MOS_OEW_SETTINGS_link' );