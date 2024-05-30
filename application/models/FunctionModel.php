<?php
class FunctionModel extends CI_Model{

    function discount($harga, $diskon){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
    }

    function total($arrayHarga){
        $total = 0;
        foreach ($arrayHarga as $barang => $harga) {
            $total += $harga;
        }

        return $total;
    }
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
    function create_product_sku($name, $category, $price, $stock)
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