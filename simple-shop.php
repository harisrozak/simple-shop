<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Simple_Shop
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Shop
 * Plugin URI:        http://example.com/simple-shop-uri/
 * Description:       A simple plugin that created based on a boiler plate http://wppb.io/
 * Version:           1.0.0
 * Author:            harisrozak
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-shop
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SIMPLE_SHOP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-simple-shop-activator.php
 */
function activate_simple_shop() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-shop-activator.php';
	Simple_Shop_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-simple-shop-deactivator.php
 */
function deactivate_simple_shop() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-shop-deactivator.php';
	Simple_Shop_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_shop' );
register_deactivation_hook( __FILE__, 'deactivate_simple_shop' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-simple-shop.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_simple_shop() {

	$plugin = new Simple_Shop();
	$plugin->run();

}
run_simple_shop();
