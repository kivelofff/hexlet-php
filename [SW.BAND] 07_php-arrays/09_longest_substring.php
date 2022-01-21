<?php
echo getLongestLength('abcdeef').'<br>';
echo getLongestLength('jabjcdel').'<br>';
echo getLongestLength('').'<br>';
echo getLongestLength('aabcdaba').'<br>';

function getLongestLength($str) {
    echo "get max len of unique substring in $str: ";
    $len = strlen($str);
    $max_len=0;
    for ($i=0; $i<$len; $i++) {
        $subarr = substr($str, $i, 1);
        for ($j=$i+1; $j<$len; $j++) {

            if (str_contains($subarr, $str[$j])) {
                break;
            }
            $subarr = substr($str, $i, $j-$i+1);
        }
        $sublen =strlen($subarr);
        if ($sublen>$max_len) {
            $max_len = $sublen;
        }

    }
    return $max_len;


}