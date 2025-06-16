<?php
// File: includes/class-your-plugin-database.php

class Patient_Monitor_Database {

    private static $table = 'health_data';

    public static function insert($data) {
        global $wpdb;
        $table = $wpdb->prefix . self::$table;

        return $wpdb->insert($table, [
            'timestamp'   => current_time('mysql'),
            'ir'          => $data['ir'],
            'red'        => $data['red'],
            'glucose'    => $data['glucose'],
            'heartRateBpm' => $data['heartRateBpm'],
            'spo2'       => $data['spo2'],
            'finger'     => $data['finger'] ? 1 : 0
        ]);
    }
  
    public static function get_all($limit = 100) {
        global $wpdb;
        $table = $wpdb->prefix . self::$table;

        return $wpdb->get_results("SELECT * FROM $table ORDER BY timestamp DESC LIMIT " . (int) $limit);
    }
}
