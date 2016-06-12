<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://www.maxvisionsolutions.com
 * @since      1.0.0
 *
 * @package    Snapdeal_Affiliate
 * @subpackage Snapdeal_Affiliate/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Snapdeal_Affiliate
 * @subpackage Snapdeal_Affiliate/includes
 * @author     Akhilesh <shrinet@mvisionsolutions.com>
 */
class Snapdeal_Affiliate_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		global $wpdb;
		$table = $wpdb->prefix."snap_cats";

		//Delete any options thats stored also?
		//delete_option('wp_yourplugin_version');

		$wpdb->query("DROP TABLE IF EXISTS $table");
	}

}
