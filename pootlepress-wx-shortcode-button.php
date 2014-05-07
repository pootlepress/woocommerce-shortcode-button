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

$GLOBALS['pootlepress_wx_shortcode_button'] = new Pootlepress_Wx_Shortcode_Button( __FILE__ );
$GLOBALS['pootlepress_wx_shortcode_button']->version = '1.0.0';

?>
