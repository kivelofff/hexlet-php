<?php

$matrix = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 0, 1, 2],
];

var_dump(rotateLeft($matrix));
var_dump(rotateRight($matrix));

function rotateLeft($arr) {
    $res_arr = [];
    $len_y = count($arr);
    for ($i=0; $i<$len_y; $i++) {
        $len_x = count($arr[$i]);
        for ($j = 0; $j < $len_x; $j++) {
            $res_arr[$i][$j] = $arr[$i][$len_x-$j-1];
        }
    }
    return $res_arr;
}

function rotateRight($arr) {
    $res_arr = [];
    $len_y = count($arr);
    for ($i=0; $i<$len_y; $i++) {
        $len_x = count($arr[$i]);
        for ($j = 0; $j < $len_x; $j++) {
            $res_arr[$j][$i] = $arr[$len_y-$i-1][$j];
        }
    }
    return $res_arr;
}
