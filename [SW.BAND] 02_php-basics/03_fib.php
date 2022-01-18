<?php
echo "fib(0) = ".fib(0).'<br>';
echo "fib(1) = ".fib(1).'<br>';
echo "fib(10) = ".fib(10).'<br>';
echo "fib(100) = ".fib(100).'<br>';
echo "fib(999) = ".fib(100).'<br>';

function fib($n, $arr) {
    if (!isset($arr)) {
        $arr= [0 => 0, 1=>1];
    }
    if (in_array($n, $arr)) {
        return $arr[$n];
    } else {
        $f_number = fib($n - 1, &$arr) + fib(n - 2, &$arr);
        $storage[$n] = $f_number;
        return $f_number;
    }
}