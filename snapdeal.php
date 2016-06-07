<?php

/*
Plugin Name: Snapdeal Affiliate
Plugin URI: https://www.maxvisionsolutions.com
Description: A brief description of the Plugin.
Version: 1.0
Author: Akhilesh Singh Shrinet
Author URI: https://www.maxvisionsolutions.com
License: GPL2
*/
class Wp_Snapdeal_Affiliate{
	// Constructor
	function __construct() {

		add_action( 'admin_menu', array( $this, 'wpsa_add_menu' ));
		add_action( 'admin_init', 'wpsa_plugin_settings' );
		register_activation_hook( __FILE__, array( $this, 'wpsa_install' ) );
		register_deactivation_hook( __FILE__, array( $this, 'wpsa_uninstall' ) );
	}

	function wpsa_add_menu() {
		add_menu_page('My Plugin Settings', 'Plugin Settings', 'administrator', 'my-plugin-settings', 'my_plugin_settings_page', 'dashicons-admin-generic');
	}



	function wpsa_plugin_settings() {
		register_setting( 'wpsa-settings-group', 'accountant_name' );
		register_setting( 'wpsa-settings-group', 'affiliate_id' );
		register_setting( 'wpsa-settings-group', 'affiliate_token' );
	}
	
}
new Wp_Snapdeal_Affiliate();