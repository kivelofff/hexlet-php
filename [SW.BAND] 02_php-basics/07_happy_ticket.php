<?php
echo is_happy_ticket(385916).'<br>';
echo is_happy_ticket(231002).'<br>';
echo is_happy_ticket(1222).'<br>';
echo is_happy_ticket(054702).'<br>';
echo is_happy_ticket(00).'<br>';
echo is_happy_ticket(111).'<br>';

function is_happy_ticket($num) {
    echo "check ticket number $num: ";
    $source_num = $num;
    $digits = [];
    while ($num>10) {
        $digits[]= $num % 10;
        $num = floor($num/10);
    }
    $digits[]=$num;
    $len = count($digits);
    if ($len % 2 != 0) {
        return "$source_num is not a ticket number, wrong number of digits!/n";
    }
    $left = 0;
    $right = 0;
    for ($i=0; $i<$len/2; $i++) {
        $left += $digits[$i];
        $right += $digits[$len-1-$i];
    }
    return $left==$right;

}