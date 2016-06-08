<?php

/**
 * Snapdeal Affiliate
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.maxvisionsolutions.com
 * @since             1.0.0
 * @package           Snapdeal_Affiliate
 *
 * @wordpress-plugin
 * Plugin Name:       Snapdeal Affiliate
 * Plugin URI:        https://www.maxvisionsolutions.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Akhilesh
 * Author URI:        https://www.maxvisionsolutions.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       snapdeal-affiliate
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-snapdeal-affiliate-activator.php
 */
function activate_snapdeal_affiliate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-snapdeal-affiliate-activator.php';
	Snapdeal_Affiliate_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-snapdeal-affiliate-deactivator.php
 */
function deactivate_snapdeal_affiliate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-snapdeal-affiliate-deactivator.php';
	Snapdeal_Affiliate_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_snapdeal_affiliate' );
register_deactivation_hook( __FILE__, 'deactivate_snapdeal_affiliate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-snapdeal-affiliate.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_snapdeal_affiliate() {

	$plugin = new Snapdeal_Affiliate();
	$plugin->run();

}
run_snapdeal_affiliate();