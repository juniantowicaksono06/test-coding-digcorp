<?php

$warna = ["merah", "kuning", "hijau"];

$index = 0;

// Fungsi get warna
function get_warna() {
    global $index;
    global $warna;
    
    $w = $warna[$index];
    $index++;
    if($index > count($warna) - 1) {
        $index = 0;
    }
    return $w;
}

// get warna

echo("Warna: ". get_warna(). "\n");
echo("Warna: ". get_warna(). "\n");
echo("Warna: ". get_warna(). "\n");
echo("Warna: ". get_warna(). "\n");