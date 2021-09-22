<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://mobeenabdullah.com
 * @since      1.0.0
 *
 * @package    Itspublic_Landingpages
 * @subpackage Itspublic_Landingpages/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Itspublic_Landingpages
 * @subpackage Itspublic_Landingpages/includes
 * @author     Mobeen Abdullah <mobeenabdullah@gmail.com>
 */
class Itspublic_Landingpages_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'itspublic-landingpages',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
