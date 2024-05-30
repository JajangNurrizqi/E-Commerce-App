<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('init')) {
    function init()
    {
        $CI = &get_instance();
        return $CI;
    }
}