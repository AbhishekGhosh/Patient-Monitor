<?php
/**
 * Plugin Name: Patient Monitor
 * Description: Stores health sensor data from ESP32 and displays it in WordPress.
 * Version: 1.0
 * Text Domain: patient-monitor
 */

// Activate plugin (creates table).
register_activation_hook( __FILE__, ['Your_Plugin_Activator', 'activate'] );

// Define plugin directory.
define( 'YOUR_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

require YOUR_PLUGIN_PATH . 'includes/class-your-plugin-activator.php';
require YOUR_PLUGIN_PATH . 'includes/class-your-plugin-database.php';
require YOUR_PLUGIN_PATH . 'includes/class-your-plugin-API.php';
require YOUR_PLUGIN_PATH . 'includes/class-your-plugin-admin.php';

add_action('init', ['Your_Plugin_API', 'register_route']); 
add_action('admin_menu', ['Your_Plugin_Admin', 'add_menu_page']); 
