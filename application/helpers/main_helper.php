<?php

/**
 * Show last query executed
 */
if (!function_exists('lq')) {
    function lq()
    {
        $CI = &get_instance();

        echo "<pre>";
        print_r($CI->db->last_query());
        echo "</pre>";
        die;
    }
}


if (!function_exists('pd')) {
    function pd($val, $exit = 0)
    {
        echo "<pre>";
        print_r($val);
        echo "</pre>";

        if ($exit == 1) {
            die;
        }
    }
}
