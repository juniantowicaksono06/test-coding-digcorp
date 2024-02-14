<?php

function find_max_char($kata) {
    // Untuk menampung char
    $tmp = [];
    for($x = 0; $x < strlen($kata); $x++) {
        if(!array_key_exists($kata[$x], $tmp)) {
            $tmp[$kata[$x]] = 1;
        }
        else {
            $tmp[$kata[$x]] += 1;
        }
    }
    $char = "";
    $max_value = 0;
    foreach($tmp as $key => $value) {
        if($char == "") {
            $char = $key;
            $max_value = $value;
        }
        else if($max_value <= $value) {
            $char = $key;
            $max_value = $value;
        }
    }
    return [
        'char'   => $char,
        'value'  => $max_value
    ];
}
$max_char = find_max_char("strawbberrry");
echo("Karakter yang paling sering muncul adalah: ".$max_char['char']." Sebanyak ".$max_char['value'] . " Kali\n");