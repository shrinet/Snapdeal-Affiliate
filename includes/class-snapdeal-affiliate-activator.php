<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.maxvisionsolutions.com
 * @since      1.0.0
 *
 * @package    Snapdeal_Affiliate
 * @subpackage Snapdeal_Affiliate/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Snapdeal_Affiliate
 * @subpackage Snapdeal_Affiliate/includes
 * @author     Akhilesh <shrinet@mvisionsolutions.com>
 */
class Snapdeal_Affiliate_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		global $wpdb;

		$table_name = $wpdb->prefix . "snap_cats";

		$sql = '
		  CREATE TABLE ' . $table_name . ' (
		    id int(11) NOT NULL auto_increment,
		    name varchar(255) NOT NULL,
		    slug varchar(255) NOT NULL,
		    url varchar(255) default NULL,
		    description text,
		    dateImport datetime DEFAULT \'0000-00-00 00:00:00\' NOT NULL,
		    relative varchar(255) default NULL,
		    PRIMARY KEY  (id)
		  )';
		dbDelta( $sql );
	}

}
