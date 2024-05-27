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

}