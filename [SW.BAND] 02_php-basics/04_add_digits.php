<?php
echo summ_digits(919).'<br>';
echo summ_digits(0).'<br>';
echo summ_digits(1).'<br>';
echo summ_digits(9).'<br>';
echo summ_digits(10).'<br>';
echo summ_digits(38).'<br>';

function summ_digits(int $num) {
    echo "summ digits of $num: ";
    $sum=0;
    while ($num >=10) {
        $sum += $num % 10;
        $num = floor($num / 10);
    }
    $sum += $num;
    if ($sum>=10) {
        $sum = summ_digits($sum);
    }
    return $sum;
}