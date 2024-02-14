<?php

$array = [];

// generate random integer
for($x = 0; $x < 5; $x++) {
    array_push($array, rand(0, 100));
}

var_dump($array);

function find_max_second_value() {
    global $array;
    // Cek apakah array itu kurang dari dua panjangnya kalo iya berarti array nya tidak valid dan tidak bisa dicari nilai terbesar keduanya
    if(count($array) < 2) {
        return false;
    }
    // Urutkan array dari belakang terlebih dahulu menggunakan fungsi bawaan php
    rsort($array);
    return $array[1];
}

var_dump(find_max_second_value());