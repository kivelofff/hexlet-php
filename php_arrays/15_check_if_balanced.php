<?php
/*Реализуйте функцию checkIfBalanced, которая проверяет балансировку круглых скобок в арифметических выражениях.

<?php

checkIfBalanced('(5 + 6) * (7 + 8)/(4 + 3)'); // true
checkIfBalanced('(4 + 3))'); // false*/

var_dump(checkIfBalanced('(5 + 6) * (7 + 8)/(4 + 3)')); // true
var_dump(checkIfBalanced('(4 + 3))')); // false
var_dump(checkIfBalanced('(4 +) 3)')); // false
var_dump(checkIfBalanced(')(4 + 3)')); // false

function checkIfBalanced(string $string): bool
{
    $stack = [];
    for ($i = 0, $length = strlen($string); $i < $length; $i++) {
        $currentSymbol = $string[$i];
        if (empty($stack) && $currentSymbol == ')') {
            return false;
        }
        if ($currentSymbol == '(') {
            array_push($stack, $currentSymbol);
        } elseif ($currentSymbol == ')') {
            array_pop($stack);
        }
    }
    return empty($stack);
}