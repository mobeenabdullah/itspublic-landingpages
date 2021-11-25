<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://mobeenabdullah.com
 * @since      1.0.0
 *
 * @package    Itspublic_Landingpages
 * @subpackage Itspublic_Landingpages/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Itspublic_Landingpages
 * @subpackage Itspublic_Landingpages/public
 * @author     Mobeen Abdullah <mobeenabdullah@gmail.com>
 */
class Itspublic_Landingpages_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        require_once 'partials/itspublic-landingpages-shortcodes.php';
        require_once 'partials/itspublic-landingpages-public-extra.php';

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Itspublic_Landingpages_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Itspublic_Landingpages_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/itspublic-landingpages-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Itspublic_Landingpages_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Itspublic_Landingpages_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/itspublic-landingpages-public.js', array( 'jquery' ), $this->version, false );

	}

}
