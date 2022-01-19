<?php
echo check_perfect(6).'<br>';
echo check_perfect(28).'<br>';
echo check_perfect(496).'<br>';
echo check_perfect(12).'<br>';
echo check_perfect(97).'<br>';


function check_perfect($num) {
    echo "check is $num a perfect number -> ";
    $sum = 0;
    for($i=1; $i<$num; $i++) {
        if ($num % $i == 0) {
            $sum += $i;
        }
    }
    return $sum == $num;
}