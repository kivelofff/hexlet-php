<?php

var_dump(getMirrorMatrix([
    [11, 12, 13, 14],
    [21, 22, 23, 24],
    [31, 32, 33, 34],
    [41, 42, 43, 44],
]));

function getMirrorMatrix($arr) {
    $size = count($arr);
    $mirrored_arr=[];
    for ($i=0; $i<$size; $i++) {
        for($j=0; $j<$size/2; $j++) {
            $mirrored_arr[$i][$j] = $arr[$i][$j];
            $mirrored_arr[$i][$size-1-$j] = $arr[$i][$j];
            ksort($mirrored_arr[$i]);
        }
    }
    return $mirrored_arr;
}
