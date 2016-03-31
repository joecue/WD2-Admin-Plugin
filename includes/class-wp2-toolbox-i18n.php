<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.lorainccc.edu
 * @since      1.0.0
 *
 * @package    Wp2_Toolbox
 * @subpackage Wp2_Toolbox/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp2_Toolbox
 * @subpackage Wp2_Toolbox/includes
 * @author     LCCC Web Dev Team <notice@lorainccc.edu>
 */
class Wp2_Toolbox_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp2-toolbox',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
