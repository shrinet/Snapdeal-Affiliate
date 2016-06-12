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
	<div>
		<form id="cats-form">
			<input type="submit" class="button-primary" value="Get Category">
		</form>
		<?php do_settings_sections( $this->plugin_name. '_cats' ); ?>
	</div>
</div>