<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.mvoisionsolutions.com
 * @since      1.0.0
 *
 * @package    Snapdeal_Affiliate
 * @subpackage Snapdeal_Affiliate/admin/partials
 */

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
	<h2 class="nav-tab-wrapper">
		<a href="?page=sandbox_theme_options&tab=display_options" class="nav-tab">Display Options</a>
		<a href="?page=sandbox_theme_options&tab=social_options" class="nav-tab">Social Options</a>
	</h2>
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<form action="options.php" method="post">
		<?php
		settings_fields( $this->plugin_name );
		do_settings_sections( $this->plugin_name );
		submit_button();
		?>
	</form>
</div>
<?php
var_dump(get_option( $this->option_name . '_aft' ));
var_dump(get_option( $this->option_name . '_afd' ));
