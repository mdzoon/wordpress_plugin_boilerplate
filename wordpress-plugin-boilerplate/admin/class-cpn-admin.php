<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @since      1.0.0
 * @package    Custom_Plugin_Name
 * @subpackage Custom_Plugin_Name/admin
 * @author     mdzoon
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( !class_exists( 'Custom_Plugin_Name_Admin' ) ) {
	class Custom_Plugin_Name_Admin
	{
		private $plugin_name;
		private $version;

		public function __construct( $plugin_name, $version ) {
			$this->plugin_name = $plugin_name;
			$this->version = $version;
		}

		public function enqueue_styles() {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cpn.css', array(), $this->version, 'all' );
		}

		public function enqueue_scripts() {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cpn.js', array(), $this->version, false );
		}

		public function add_plugin_menu() {

			$page_title = 'Custom Plugin Name';
			$menu_title = 'Custom Plugin';
			$capability = 'manage_options';
			$menu_slug  = 'custom-plugin-name';
			$function   = 'init_cpn_admin_page';
			$icon_url   = 'dashicons-wordpress';
			$position   = 80;
			add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

		}

		public function load_admin_page() {
			if ( !current_user_can( 'manage_options' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			} else {
				function init_cpn_admin_page() {
					include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/cpn-admin-page.php';
				}
			}
		}
	}
}