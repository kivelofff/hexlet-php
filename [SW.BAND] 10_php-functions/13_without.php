<?php
/**
 * Реализуйте функцию without, которая работает по такому же принципу, что и функция из теории, кроме одного аспекта. Эта функция должна принимать любое число аргументов, где первый аргумент массив, а все остальные - значения, которые нужно исключить из переданного массива. Сделайте решение функциональным.

Эту задачу можно решить с помощью функции array_diff, но подразумевается что вы сделаете это без ее использования.
Примеры использования

<?php



without([3, 4, 10, 4, 'true'], 4); // [3, 10, 'true']

without(['3', 2], 0, 5, 11); // ['3', 2]
 */
require_once "../vendor/autoload.php";

use Funct\Collection;

function without(array $items, ...$values)
{
    $filtered = array_filter($items, function ($item) use ($values) {
        return !in_array($item, $values, true);
    });
    return array_values($filtered);
}

var_dump(without([3, 4, 10, 4, 'true'], 4)); // [3, 10, 'true']

var_dump(without(['3', 2], 0, 5, 11)); // ['3', 2]

var_dump(without(['wow', false, 4, 0, 4, 'true'], false, 4));