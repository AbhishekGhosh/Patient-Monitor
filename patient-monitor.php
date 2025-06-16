<?php
/**
 * Plugin Name: Patient Monitor
 * Description: Stores health sensor data from ESP32 and displays it in WordPress.
 * Version: 1.0
 * Text Domain: patient-monitor
 */

// Activate plugin (creates table).
register_activation_hook( __FILE__, ['Patient_Monitor_Activator', 'activate'] );

// Define plugin directory.
define( 'Patient_Monitor_PATH', plugin_dir_path( __FILE__ ) );

require YOUR_PLUGIN_PATH . 'includes/class-patient-monitor-activator.php';
require YOUR_PLUGIN_PATH . 'includes/class-patient-monitor-database.php';
require YOUR_PLUGIN_PATH . 'includes/class-patient-monitor-API.php';
require YOUR_PLUGIN_PATH . 'includes/class-patient-monitor-admin.php';

add_action('init', ['Patient_Monitor_API', 'register_route']); 
add_action('admin_menu', ['Patient_Monitor_Admin', 'add_menu_page']); 
