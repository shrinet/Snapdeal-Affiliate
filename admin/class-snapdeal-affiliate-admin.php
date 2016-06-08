<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.maxvisionsolutions.com
 * @since      1.0.0
 *
 * @package    Snapdeal_Affiliate
 * @subpackage Snapdeal_Affiliate/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Snapdeal_Affiliate
 * @subpackage Snapdeal_Affiliate/admin
 * @author     Akhilesh <shrinet@mvisionsolutions.com>
 */
class Snapdeal_Affiliate_Admin {

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
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'snapdeal_affiliate';

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
		 * defined in Snapdeal_Affiliate_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Snapdeal_Affiliate_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/snapdeal-affiliate-admin.css', array(), $this->version, 'all' );

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
		 * defined in Snapdeal_Affiliate_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Snapdeal_Affiliate_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/snapdeal-affiliate-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add Menu option for Admin
	 *
	 * @since 1.0.0
	 */
	public function snapdeal_affiliate_plugin_setup_menu(){
		$this->plugin_screen_hook_suffix = add_menu_page(
			__( 'Snapdeal Affiliate Settings', 'snapdeal-affiliate' ),
			__( 'Snapdeal Affiliate', 'snapdeal-affiliate' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' ) );
		$this->plugin_screen_hook_suffix = add_submenu_page(
			$this->plugin_name,
			__( 'Snapdeal Affiliate Cats', 'snapdeal-affiliate-cat' ),
			__( 'Snapdeal Affliate Cat', 'snapdeal-affiliate-cat' ),
			'manage_options',
			$this->plugin_name. '_cats',
			array( $this, 'display_options_pag' ));
	}

	/**
	 *
	 *
	 */
	public function snapdeal_affiliate_plugin_setup_submenu() {

	}
	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/snapdeal-affiliate-admin-display.php';
	}
	/**
	 * Register all related settings of this plugin
	 *
	 * @since  1.0.0
	 */
	public function register_setting() {
		add_settings_section(
			$this->option_name . '_general',
			__( 'General', 'snapdeal-affiliate' ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->plugin_name
		);
		add_settings_field(
			$this->option_name . 'afd',
			__( 'Affiliate ID', 'snapdeal-affiliate'),
			array( $this, $this->option_name . '_afd_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_afd')
		);
		add_settings_field(
			$this->option_name . 'aft',
			__( 'Affiliate Token', 'snapdeal-affiliate'),
			array( $this, $this->option_name . '_aft_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_aft')
		);
		add_settings_field(
			$this->option_name . '_position',
			__( 'Text position', 'snapdeal-affiliate' ),
			array( $this, $this->option_name . '_position_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_position' )
		);

		add_settings_section(
			$this->option_name . '_getCategory',
			__( 'Get Category', 'snapdeal-affiliate'),
			array( $this, $this->option_name . '_getcategory_cb'),
			$this->plugin_name
		);

		register_setting( $this->plugin_name, $this->option_name . '_position', array( $this, $this->option_name . '_sanitize_position' ) );
		register_setting( $this->plugin_name, $this->option_name . '_day', 'intval' );
		register_setting( $this->plugin_name, $this->option_name . '_afd', 'intval' );
		register_setting( $this->plugin_name, $this->option_name . '_aft' );
	}
	/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function snapdeal_affiliate_general_cb() {
		echo '<p>' . __( 'Please change the settings accordingly.', 'snapdeal-affiliate' ) . '</p>';
	}

	/**
	 * Render the text for the getcategory section
	 *
	 * @since  1.0.0
	 */
	public function snapdeal_affiliate_getcategory_cb() {
		echo '<p>' . __( 'Please change the settings accordingly.', 'snapdeal-affiliate' ) . '</p>';
	}
	/**
	 * Render the radio input field for position option
	 *
	 * @since  1.0.0
	 */
	public function snapdeal_affiliate_position_cb() {
		$position = get_option( $this->option_name . '_position' );
		?>
		<fieldset>
			<label>
				<input type="radio" name="<?php echo $this->option_name . '_position' ?>" id="<?php echo $this->option_name . '_position' ?>" value="before" <?php checked( $position, 'before' ); ?>>
				<?php _e( 'Before the content', 'outdated-notice' ); ?>
			</label>
			<br>
			<label>
				<input type="radio" name="<?php echo $this->option_name . '_position' ?>" value="after" <?php checked( $position, 'after' ); ?>>
				<?php _e( 'After the content', 'outdated-notice' ); ?>
			</label>
		</fieldset>
		<?php
	}
	/**
	 * Render the treshold day input for this plugin
	 *
	 * @since  1.0.0
	 */
	public function snapdeal_affiliate_day_cb() {
		$day = get_option( $this->option_name . '_day' );
		echo '<input type="text" name="' . $this->option_name . '_day' . '" id="' . $this->option_name . '_day' . '" value="' . $day . '"> ' . __( 'days', 'outdated-notice' );
	}

	/**
	 * Render the Api key for account
	 *
	 * @since 1.0.0
	 */
	public function snapdeal_affiliate_afd_cb() {
		$afd = get_option( $this->option_name . '_afd');
		echo '<input type="text" name=" ' . $this->option_name . '_afd' . '" id="' . $this->option_name . '_afd' .'" value="' .$afd . '" >';
	}

	/**
	 * Render the Api key for account
	 *
	 * @since 1.0.0
	 */
	public function snapdeal_affiliate_aft_cb() {
		$aft = get_option( $this->option_name . '_aft');
		echo '<input type="text" name=" ' . $this->option_name . '_aft' . '" id="' . $this->option_name . '_aft' .'" value="' .$aft . '" >';
	}
	/**
	 * Sanitize the text position value before being saved to database
	 *
	 * @param  string $position $_POST value
	 * @since  1.0.0
	 * @return string           Sanitized value
	 */
	public function snapdeal_affiliate_sanitize_position( $position ) {
		if ( in_array( $position, array( 'before', 'after' ), true ) ) {
			return $position;
		}
	}

}
