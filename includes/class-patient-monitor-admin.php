<?php
// File: includes/class-your-plugin-admin.php

class Patient_Monitor_Admin {

    public static function add_menu_page()
    {
        add_menu_page('Health Data', 'Health Data', 'manage_options', 'your-plugin-name', [self::class, 'render_page']); 
    }
  
    public static function render_page()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'health_data';
        $results = $wpdb->get_results("SELECT * FROM $table ORDER BY timestamp DESC LIMIT 100");

        echo "<h1>Health Sensor Data</h1>";
        echo "<table>";
        echo "<tr><th>Time</th><th>Glucose</th><th>Heart Rate</th><th>SpO₂</th></tr>";

        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>$row->timestamp</td>";
            echo "<td>$row->glucose</td>";
            echo "<td>$row->heartRateBpm</td>";
            echo "<td>$row->spo2</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
