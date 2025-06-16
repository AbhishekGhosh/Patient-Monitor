<?php
// File: includes/class-your-plugin-API.php

class Patient_Monitor_API {

    public static function register_route()
    {
        register_rest_route('patient-monitor/v1', '/readings', [
            'methods'  => 'POST',
            'callback' => [self::class, 'handle_data'],
            'permission_callback' => '__return_true'
        ]);
    }
    
    public static function handle_data($request)
    {
        global $wpdb;
        $table = $wpdb->prefix . 'health_data';

        $data = json_decode($request->get_body(), true);

        $wpdb->insert($table, [
            'timestamp'  => current_time('mysql'),
            'ir'         => $data['ir'],
            'red'        => $data['red'],
            'glucose'    => $data['glucose'],
            'heartRateBpm' => $data['heartRateBpm'],
            'spo2'       => $data['spo2'],
            'finger'     => $data['finger'] ? 1 : 0
        ]);

        return new WP_REST_Response(['success' => true], 200);
    }
}
