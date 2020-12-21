<?php
/**
 * Plugin Name:     Paddlepress Sample Plugin
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     paddlepress-sample-plugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Paddlepress_Sample_Plugin
 */

require_once 'updater/class-plugin-updater.php';

/**
 * Initialize the updater. Hooked into `init` to work with the
 * wp_version_check cron job, which allows auto-updates.
 */
function pp_sample_plugin_updater() {
	// To support auto-updates, this needs to run during the wp_version_check cron job for privileged users.
	$doing_cron = defined( 'DOING_CRON' ) && DOING_CRON;
	if ( ! current_user_can( 'manage_options' ) && ! $doing_cron ) {
		return;
	}

	// retrieve our license key from the DB
	$license_key = trim( get_option( 'pp_sample_plugin_license_key' ) );

	// setup the updater
	$updater = new PaddlePress\Sample\Plugin_Updater(
		'http://example.org/wp-json/paddlepress-api/v1/update',
		__FILE__,
		array(
			'version'      => '0.1.0',                    // current version number
			'license_key'  => $license_key,             // license key (used get_option above to retrieve from DB)
			'license_url'  => home_url(),             // license domain
			'download_tag' => 'paddlepress-sample-plugin',            // download tag slug
			'beta'         => false,
		)
	);

}

add_action( 'init', 'pp_sample_plugin_updater' );