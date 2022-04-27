<?php
/**
 * Реализуйте анонимную функцию, которая принимает на вход строку и возвращает её последний символ (или null, если строка пустая). Запишите созданную функцию в переменную $last.
Примеры

<?php



$last('');     // null

$last('0');    // 0

$last('210');  // 0

$last('pow');  // w

$last('kids'); // s
 */


function run(string $text)
{
    // BEGIN (write your solution here)
    $last = fn($text) => mb_substr($text, -1) == '' ? null : mb_substr($text, -1);
    // END

    return $last($text);
}

var_dump(run(''));
var_dump(run('0'));
var_dump(run('210'));
var_dump(run('pow'));
var_dump(run('kids'));