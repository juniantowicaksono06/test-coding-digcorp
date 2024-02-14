<?php

require_once './helper.php';
$tokens = [];

function generate_token($user) {
    global $tokens;
    // Cek apakah index / user itu sudah ada di tokennya
    // Kalo tidak ada buat array nya dulu terus ditambahkan ke variable $tokens
    if(!array_key_exists($user, $tokens)) {
        $tokens[$user] = [generate_random_string()];
    }
    // Kalo ada langsung push token baru sesuai dengan index
    else {
        array_push($tokens[$user], generate_random_string());
    }
}


function verify_token($user, $token) {
    global $tokens;
    // Cek apakah user itu ada di dalam $tokens?
    // Kalo tidak ada langsung return false saja
    if(!array_key_exists($user, $tokens)) {
        return false;
    }
    foreach($tokens[$user] as $index => $t) {
        if($t == $token) {
            // array_splice($tokens[$user])
            unset($tokens[$user][$index]); // Hapus token dari variable $tokens
            array_values($tokens[$user]); // Merapikan array dari index user
            return true;
        }
    }
    return false;
}

$user = "abdul";
generate_token($user);
generate_token($user);

// Lihat keseluruhan token dari user abdul
var_dump($tokens[$user]);

$token = $tokens[$user][1];
// Get token
var_dump($token);

// Tes verify token eksis
$result1 = verify_token($user, $token);
var_dump($result1);

// Tes verify token tidak eksis
$result2 = verify_token($user, "Abcd1234");

var_dump($result2);

// Lihat token apa sudah berhasil dihapus?
var_dump($tokens[$user]);