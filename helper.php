<?php

// Fungsi untuk generate random string
function generate_random_string($max_length = 10) {
    $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $str = "";
    for($x = 0; $x < $max_length; $x++) {
        $str .= $char[rand(0, strlen($char) - 1)];
    }
    return $str;
}