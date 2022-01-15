<?php

echo "sum = ".binarySum(101, 10);

function binarySum($a, $b) {
    echo "summ $a and $b";
    $slag = "0b$a";
    $slag2 = "0b$b";

    return $sum = $slag&$slag2;

}
