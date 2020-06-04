<?php
/**
* @package Custom_Plugin_Name
* @version 1.0.0
*
*
* Plugin name: Custom Plugin Name
* Plugin URI: https://michaeldyczkowski.co.uk/
* Description: Plugin description.
* Version: 1.0.0
* Author: mdzoon
* Author URI: https://michaeldyczkowski.co.uk/
* License: GPL2 or later
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'CUSTOM_PLUGIN_NAME', '1.0.0' );

function activate_cpn() {
	require_once plugin_dir_path( __FILE__ ) . 'classes/class-cpn-activate.php';
	Custom_Plugin_Name_Activate::activate();
}

function deactivate_cpn() {
	require_once plugin_dir_path( __FILE__ ) . 'classes/class-cpn-deactivate.php';
	Custom_Plugin_Name_Deactivate::deactivate();
}

function uninstall_cpn() {
	require_once plugin_dir_path( __FILE__ ) . 'class-cpn-uninstall.php';
}

register_activation_hook( __FILE__, 'activate_cpn' );
register_deactivation_hook( __FILE__, 'deactivate_cpn' );
register_uninstall_hook(__FILE__, 'uninstall_cpn');

require plugin_dir_path( __FILE__ ) . 'classes/class-cpn.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_cpn() {
	$plugin = new Custom_Plugin_Name();
	$plugin->run();

}
run_cpn();