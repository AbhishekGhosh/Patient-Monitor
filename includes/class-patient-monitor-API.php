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
    $data = json_decode($request->get_body(), true);
    Your_Plugin_Database::insert($data);
    return new WP_REST_Response(['success' => true], 200);
}
}
