<?php
echo "fib(0) = ".fib(0).'<br>';
echo "fib(1) = ".fib(1).'<br>';
echo "fib(10) = ".fib(10).'<br>';
echo "fib(15) = ".fib(15).'<br>';
echo "fib(21) = ".fib(21).'<br>';

function fib($n) {
    if ($n == 0) {
        return 0;
    } elseif ($n == 1) {
        return 1;
    } else {
        $beforePrevious=0;
        $previous=1;
        for ($i=2; $i<=$n; $i++) {
            $fib = $beforePrevious +$previous;
            $beforePrevious = $previous;
            $previous = $fib;
        }
        return $fib;
    }
}