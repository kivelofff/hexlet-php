<?php
/**
 * Реализуйте функцию union(...$arrays), которая находит объединение всех переданных массивов. Функция принимает на вход от одного массива и больше. Ключи исходных массивов не сохраняются (т.е. все значения итогового массива заново индексируются: 0, 1, 2, ...).
Примеры использования

<?php



union([3]); // [3]

union([3, 2], [2, 2, 1]); // [3, 2, 1]

union(['a', 3, false], [true, false, 3], [false, 5, 8]); // ['a', 3, false, true, 5, 8]

Объединение работает только для плоских массивов, то есть массивов внутри которых нет других массивов.
 */

function union($first, ...$rest)
{
    $allElements = array_merge($first, ...$rest);
    $intersection = [];
    foreach ($allElements as $element) {
        if (!in_array($element, $intersection, true)) {
            $intersection[] = $element;
        }
    }
    return $intersection;
}

var_dump(union([3])); // [3]

var_dump(union([3, 2], [2, 2, 1])); // [3, 2, 1]

var_dump(union(['a', 3, false], [true, false, 3], [false, 5, 8])); // ['a', 3, false, true, 5, 8]