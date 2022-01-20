<?php

var_dump(getChunked(['a', 'b', 'c', 'd'], 2));
var_dump(getChunked(['a', 'b', 'c', 'd'], 3));
 function getChunked($arr, $size) {
     $len = count($arr);
     $chunk = [];
     $cell=[];
     for($i=0; $i<$len; $i++) {
        $cell[]=$arr[$i];
        if (count($cell)==$size || $i==$len-1) {
            $chunk[]=$cell;
            $cell=[];
        }

     }
     return $chunk;
 }