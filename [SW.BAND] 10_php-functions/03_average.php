<?php
/**
 * Реализуйте функцию average, которая возвращает среднее арифметическое всех переданных аргументов. Если функции не передать ни одного аргумента, то она должна вернуть null.
Примеры использования

<?php



average(0); // 0

average(0, 10); // 5

average(-3, 4, 2, 10); // 3.25

average(); // null
 */

function average(...$args)
{
    return empty($args) ? null : array_sum($args) / count($args);
}

var_dump(average(0)); // 0

var_dump(average(0, 10)); // 5

var_dump(average(-3, 4, 2, 10)); // 3.25

var_dump(average()); // null