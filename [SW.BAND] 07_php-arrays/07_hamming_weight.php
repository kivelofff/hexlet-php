<?php
echo hammingWeight(0).'<br>';
echo hammingWeight(4).'<br>';
echo hammingWeight(101).'<br>';


function hammingWeight($num) {
    echo "calculating weight of $num: ";
    $bin_num = decbin($num);
    $len = strlen($bin_num);
    $weight = 0;
    for ($i=0; $i<$len; $i++) {
        if ($bin_num[$i] == "1") {
            $weight++;
        }
    }
    return $weight;
}