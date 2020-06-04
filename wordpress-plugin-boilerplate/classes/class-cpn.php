<?php
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
 * @package    Custom_Plugin_Name
 * @subpackage Custom_Plugin_Name/classes
 * @author     mdzoon
 */

if ( !class_exists( 'Custom_Plugin_Name' ) ) {
    class Custom_Plugin_Name
    {
  
      protected $plugin_name;
      protected $version;
  
      public function __construct() {
            if ( defined( 'CUSTOM_PLUGIN_NAME_VERSION' ) ) {
                $this->version = CUSTOM_PLUGIN_NAME_VERSION;
            } else {
                $this->version = '1.0.0';
            }
            $this->plugin_name = 'custom_plugin_name';
            $this->load_dependencies();
            $this->define_admin_hooks();
        }
  
      private function load_dependencies() {
  
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'classes/class-cpn-loader.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-cpn-admin.php';
        $this->loader = new Custom_Plugin_Name_Loader();
        }
  
      private function define_admin_hooks() {
        $plugin_admin = new Custom_Plugin_Name_Admin( $this->get_plugin_name(), $this->get_version() );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_menu' );
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'load_admin_page' );
      }
  
      public function run() {
        $this->loader->run();
      }
  
      public function get_plugin_name() {
        return $this->plugin_name;
      }
  
      public function get_loader() {
        return $this->loader;
      }
  
      public function get_version() {
        return $this->version;
      }
    }
  }