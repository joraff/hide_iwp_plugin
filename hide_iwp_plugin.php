<?php
/*
	Author: Joseph Rafferty
	Description: Hides the Infinite Wordpress plugin from the plugin list
	Domain Path: /lang
	Plugin Name: IWP Plugin Hider
	Plugin URI: 
	Text Domain: IWP plugin-hider
	Version: 1.0.0
*/

add_filter( 'all_plugins', 'iwp_filter', 10000 );

function iwp_filter( $all_plugins ) {
	
	// Hide the Infinite Wordpress plugin
	if ( isset( $all_plugins['iwp-client/init.php'] ) )
		unset( $all_plugins['iwp-client/init.php'] );

	// Hide ourself
	$fp = explode('wp-content/plugins/', __FILE__);
	if ( isset( $fp[1] ) ) {
		$plugin_handle = $fp[1];
	}
	if ( isset( $plugin_handle ) && isset( $all_plugins[$plugin_handle] ) ) {
		unset( $all_plugins[$plugin_handle] );
	}
	

	// Return the remaining plugins
	return $all_plugins;
}