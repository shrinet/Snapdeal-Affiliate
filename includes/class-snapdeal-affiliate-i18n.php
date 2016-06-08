<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.maxvisionsolutions.com
 * @since      1.0.0
 *
 * @package    Snapdeal_Affiliate
 * @subpackage Snapdeal_Affiliate/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Snapdeal_Affiliate
 * @subpackage Snapdeal_Affiliate/includes
 * @author     Akhilesh <shrinet@mvisionsolutions.com>
 */
class Snapdeal_Affiliate_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'snapdeal-affiliate',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
