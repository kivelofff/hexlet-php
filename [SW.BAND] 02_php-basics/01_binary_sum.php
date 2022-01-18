<?php

/*10101
01111

01010

00101*/

echo "sum = ".binarySum("10101", "1111").'<br>';
$aa=33%3;
echo "aa= $aa".'<br>';

function binarySum($a, $b) {

    $summand_1 = intval($a, 2);
    $summand_2 = intval($b, 2);
    echo "summ $summand_1 and $summand_2".'<br>';
    while ($summand_2 !=0) {
        $mask = $summand_1&$summand_2;
        $summand_1 = $summand_1^$summand_2;
        $summand_2 = $mask<<1;
    }
    return decbin($summand_1);
}
