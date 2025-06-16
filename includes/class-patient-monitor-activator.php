<?php
// File: includes/class-your-plugin-activator.php

class Your_Plugin_Activator {

    public static function activate()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'health_data';

        $charset = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table (
          id mediumint(9) NOT NULL AUTO_INCREMENT,
          timestamp datetime NOT NULL,
          ir bigint(20),
          red bigint(20),
          glucose float,
          heartRateBpm float,
          spo2 float,
          finger tinyint(1),
          PRIMARY KEY  (id)
        ) $charset;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
