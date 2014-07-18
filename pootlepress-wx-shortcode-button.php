<?php
/*
Plugin Name: Woocommerce Extension - Shortcode Button
Plugin URI: http://pootlepress.com/
Description: An extension for Woocommerce that add shortcode button to admin editor
Version: 1.0.0
Author: PootlePress
Author URI: http://pootlepress.com/
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once( 'pootlepress-wx-shortcode-button-functions.php' );
require_once( 'classes/class-pootlepress-wx-shortcode-button.php' );
require_once( 'classes/class-pootlepress-updater.php');

$GLOBALS['pootlepress_wx_shortcode_button'] = new Pootlepress_Wx_Shortcode_Button( __FILE__ );
$GLOBALS['pootlepress_wx_shortcode_button']->version = '1.0.0';

add_action('init', 'pp_wsb_updater');
function pp_wsb_updater()
{
    if (!function_exists('get_plugin_data')) {
        include(ABSPATH . 'wp-admin/includes/plugin.php');
    }
    $data = get_plugin_data(__FILE__);
    $wptuts_plugin_current_version = $data['Version'];
    $wptuts_plugin_remote_path = 'http://jamiemarsland.staging.wpengine.com/?updater=1';
    $wptuts_plugin_slug = plugin_basename(__FILE__);
    new Pootlepress_Updater ($wptuts_plugin_current_version, $wptuts_plugin_remote_path, $wptuts_plugin_slug);
}
?>
