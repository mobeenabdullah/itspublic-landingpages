<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://mobeenabdullah.com
 * @since      1.0.0
 *
 * @package    Itspublic_Landingpages
 * @subpackage Itspublic_Landingpages/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Itspublic_Landingpages
 * @subpackage Itspublic_Landingpages/admin
 * @author     Mobeen Abdullah <mobeenabdullah@gmail.com>
 */
class Itspublic_Landingpages_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        require_once 'partials/itspublic-landingpages-cpts.php';
        require_once 'partials/itspublic-landingpages-extra.php';
        require_once 'partials/itspublic-landingpages-docs-uplaod.php';
        require_once 'partials/itspublic-landingpages-shortcodes.php';

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( 'dzone-css', plugin_dir_url( __FILE__ ) . 'css/dropzone.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/itspublic-landingpages-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( 'dzone-js', plugin_dir_url( __FILE__ ) . 'js/dropzone-min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/itspublic-landingpages-admin.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'ip_ajax_obj',  array( 'ajaxUrl' => admin_url( 'admin-ajax.php?action=cvf_upload_files' ) ));

	}

}
