<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Simple_Shop
 * @subpackage Simple_Shop/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Simple_Shop
 * @subpackage Simple_Shop/public
 * @author     Your Name <email@example.com>
 */
class Simple_Shop_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $simple_shop    The ID of this plugin.
	 */
	private $simple_shop;

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
	 * @param      string    $simple_shop       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $simple_shop, $version ) {

		$this->simple_shop = $simple_shop;
		$this->version = $version;

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
		 * defined in Simple_Shop_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Simple_Shop_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->simple_shop, plugin_dir_url( __FILE__ ) . 'css/simple-shop-public.css', array(), $this->version, 'all' );

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
		 * defined in Simple_Shop_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Simple_Shop_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->simple_shop, plugin_dir_url( __FILE__ ) . 'js/simple-shop-public.js', array( 'jquery' ), $this->version, false );

	}

}
