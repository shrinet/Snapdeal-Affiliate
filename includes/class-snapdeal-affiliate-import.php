<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.maxvisionsolutions.com
 * @since      1.0.0
 *
 * @package    Snapdeal_Affiliate
 * @subpackage Snapdeal_Affiliate/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Snapdeal_Affiliate
 * @subpackage Snapdeal_Affiliate/includes
 * @author     Akhilesh <shrinet@mvisionsolutions.com>
 */
class Snapdeal_Affiliate_Import {

	protected $apiUrl = 'http://affiliate-feeds.snapdeal.com/feed';
	
	protected $affiliateID;
	
	protected $token;

	protected $option_name;

	public function __construct( $option_name ) {
		$this->option_name = $option_name;

		$this->affiliateID = get_option( $this->option_name . '_afd' );
		$this->token = get_option( $this->option_name . '_aft');
	}

	public function getCategory(  )
	{
		try {

			if (!function_exists('curl_init')){
				throw new exception("Curl is not available.");
			}


			// Set header to make authentication
			$headers = array(
				'Accept:application/json',
				'Snapdeal-Affiliate-Id: '. $this->affiliateID,
				'Snapdeal-Token-Id: '. $this->token
			);

			$cObj = curl_init();
			curl_setopt($cObj, CURLOPT_URL, $this->apiUrl . '/' . $this->affiliateID . '.json' );
			curl_setopt($cObj, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($cObj, CURLOPT_TIMEOUT, 45);
			curl_setopt($cObj, CURLOPT_RETURNTRANSFER, TRUE);
			$result = curl_exec($cObj);
			$contentType = curl_getinfo( $cObj, CURLINFO_CONTENT_TYPE);
			curl_close( $cObj );

			return $result;
			

		}  catch (Exception $e) {
			return $e->getMessage();
		}
	}

	public function addCategories($cats) {
		global $wpdb;
		$tableName =  $wpdb->prefix . 'snap_cats';
		$values = array();
		$place_holders = array();
		$query = "INSERT INTO $tableName (name, slug, url) VALUES ";
		$cats = json_decode($cats);
		foreach($cats->apiGroups->Affiliate as $cat => $url)
		{
			foreach ( $url as $key => $data)
			{
				array_push($values, str_replace('_', ' ', $key), $key, $data->listingVersions->v1->get);
				$place_holders[] = "('%s','%s', '%s')"; /* In my case, i know they will always be integers */
			}
		}
		$query .= implode(', ', $place_holders);
		$wpdb->query( $wpdb->prepare("$query ", $values));
		

	}


}