<?php
$a=4;
$b=9;

swap($a, $b);
print_r("a = $a, b = $b");

function swap(&$arg1, &$arg2)
{
    $buffer = $arg1;
    $arg1 = $arg2;
    $arg2 = $buffer;
}