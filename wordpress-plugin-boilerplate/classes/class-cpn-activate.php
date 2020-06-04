<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( !class_exists( 'Custom_Plugin_Name_Activate' ) ) {
	class Custom_Plugin_Name_Activate
	{
		/**
		 *
		 * @since    1.0.0
		 */
		public static function activate() {

	  	$min_php = '5.6.0';

	    // Check PHP Version and deactivate & die if it doesn't meet minimum requirements.
	  	if ( version_compare( PHP_VERSION, $min_php, '<' ) ) {
	  		deactivate_plugins( plugin_basename( __FILE__ ) );
	  		wp_die( 'This plugin requires a minmum PHP Version of ' . $min_php );
	  	}
		}
	}
}