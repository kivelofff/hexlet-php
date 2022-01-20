<?php

fizz_buzz(11,20);

function fizz_buzz($start, $finish) {
    for ($i=$start; $i<=$finish; $i++) {
        if(($i % 3) != 0 && ($i % 5) != 0) {
            echo $i;
        }

        if(($i % 3) == 0) {
            echo 'Fizz';
        }
        if(($i % 5) == 0) {
            echo 'Buzz';
        }
        echo " ";
    }
}