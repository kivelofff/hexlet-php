<?php
/*Реализуйте функцию getSameParity, которая принимает на вход массив чисел и возвращает новый, состоящий из элементов, у которых такая же чётность, как и у первого элемента входного массива.

Примеры
<?php

getSameParity([]);        // []
getSameParity([1, 2, 3]); // [1, 3]
getSameParity([1, 2, 8]); // [1]
getSameParity([2, 2, 8]); // [2, 2, 8]
Подсказки
Проверка чётности - остаток от деления: $item % 2 === 0 — чётное число
Если на вход функции передан пустой массив, то она должна вернуть пустой массив. Проверить массив на пустоту можно с помощью функции empty*/

var_dump(getSameParity([]));        // []
var_dump(getSameParity([1, 2, 3])); // [1, 3]
var_dump(getSameParity([1, 2, 8])); // [1]
var_dump(getSameParity([2, 2, 8])); // [2, 2, 8]

function getSameParity(array $arr): array
{
    $result = [];
    foreach ($arr as $element) {
        if (empty($arr)) {
            break;
        }
        $firstElementParity = $arr[0] % 2;
        if ($element % 2 == $firstElementParity) {
            $result[] = $element;
        }
    }
    return $result;
}