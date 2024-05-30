<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('format_rupiah')) {
    function format_rupiah($rp)
    {
        return number_format($rp, 2, ',', '.');
    }
}

if (!function_exists('create_product_id')) {
    function create_product_id($name, $category, $price, $stock)
    {
        $name = create_acronym($name);
        $category = create_acronym($category);
        $price = create_acronym($price);
        $stock = $stock;
        $key = substr(time(), -3);

        $sku =  $name . $category . $price . $stock . $key;
        return $sku;
    }
}

if (!function_exists('create_acronym')) {
    function create_acronym($words)
    {
        $words = explode(' ', $words);
        $acronym = '';

        foreach ($words as $word) {
            $acronym .= $word[0];
        }

        $acronym = strtoupper($acronym);

        return $acronym;
    }
}

if (!function_exists('get_product_image')) {
    function get_product_image($id)
    {
        $CI = init();
        $CI->load->model('ItemsModel');

        $data = $CI->ItemsModel->product_data($id);
        $picture = $data->images;


        $file = $picture;

        return base_url($picture);
    }
}