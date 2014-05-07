<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Pootlepress_Wx_Shortcode_Button Class
 *
 * Base class for the Pootlepress Wx Shortcode Button.
 *
 * @package WordPress
 * @subpackage Pootlepress_Wx_Shortcode_Button
 * @category Core
 * @author Pootlepress
 * @since 1.0.0
 *
 * TABLE OF CONTENTS
 *
 * public $token
 * public $version
 * 
 * - __construct()
 * - add_theme_options()
 * - get_menu_styles()
 * - load_stylesheet()
 * - load_script()
 * - load_localisation()
 * - check_plugin()
 * - load_plugin_textdomain()
 * - activation()
 * - register_plugin_version()
 * - get_header()
 * - woo_nav_custom()
 */
class Pootlepress_Wx_Shortcode_Button {
	public $token = 'pootlepress-wx-shortcode-button';
	public $version;
	private $file;

	/**
	 * Constructor.
	 * @param string $file The base file of the plugin.
	 * @access public
	 * @since  1.0.0
	 * @return  void
	 */
	public function __construct ( $file )
    {
        $this->file = $file;
        $this->load_plugin_textdomain();
        add_action('init', array(&$this, 'load_localisation'), 0);

        add_action( 'admin_init', array( $this, 'add_shortcode_button' ) );

        // Run this on activation.
        register_activation_hook( $file, array( &$this, 'activation' ) );

	} // End __construct()

    public function add_shortcode_button() {
        if (get_user_option('rich_editing') == 'true') {
            add_filter('mce_external_plugins', array(&$this, 'filter_tinymce_plugin'));
            add_filter( 'mce_buttons', array( $this, 'filter_tinymce_button' ) );
        }
    }

    public function filter_tinymce_button( $buttons ) {
        array_push( $buttons, "|", "pootlepress_wx_shortcode_button" );
        return $buttons;
    }

    public function filter_tinymce_plugin($pluginArray) {
        $pluginFile = dirname(dirname(__FILE__)) . '/pootlepress-wx-shortcode-button.php';

        $pluginArray['PootlepressWooCommerceShortcodes'] = plugin_dir_url($pluginFile) . 'scripts/wx-shortcode-button.js';
        return $pluginArray;
    }

	/**
	 * Load the plugin's localisation file.
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function load_localisation () {
		load_plugin_textdomain( $this->token, false, dirname( plugin_basename( $this->file ) ) . '/lang/' );
	} // End load_localisation()

	/**
	 * Load the plugin textdomain from the main WordPress "languages" folder.
	 * @access public
	 * @since  1.0.0
	 * @return  void
	 */
	public function load_plugin_textdomain () {
	    $domain = $this->token;
	    // The "plugin_locale" filter is also used in load_plugin_textdomain()
	    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );
	 
	    load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
	    load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( $this->file ) ) . '/lang/' );
	} // End load_plugin_textdomain()

	/**
	 * Run on activation.
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function activation () {
		$this->register_plugin_version();
	} // End activation()

	/**
	 * Register the plugin's version.
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	private function register_plugin_version () {
		if ( $this->version != '' ) {
			update_option( $this->token . '-version', $this->version );
		}
	} // End register_plugin_version()


} // End Class


