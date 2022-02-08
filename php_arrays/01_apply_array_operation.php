<?php


/*
 * src\Arrays.php
Реализуйте функцию apply(), которая применяет указанную операцию к переданному массиву и возвращает новый массив. Всего нужно реализовать три операции:

reset - Сброс массива
remove - Удаление значения по индексу
change - Обновление значения по индексу
<?php

use function App\Arrays\apply;

$cities = ['moscow', 'london', 'berlin', 'porto'];

// Сброс в пустой массив
apply($cities, 'reset'); // []

// удаление значения по индексу
apply($cities, 'remove', 1); // ['moscow', 'berlin', 'porto']
// изменение значения по индексу
apply($cities, 'change', 0, 'miami'); // ['miami', 'london', 'berlin', 'porto']
*/
$cities = ['moscow', 'london', 'berlin', 'porto'];
var_dump(apply($cities, 'reset'));
var_dump(apply($cities, 'remove', 1));
var_dump(apply($cities, 'change', 0, 'miami'));

function apply(array $arr, string $operationName, int $index = null, string $value = null): array {
    switch ($operationName) {
        case 'reset':
            return [];
        case 'remove':
            unset($arr[$index]);
            return $arr;
        case 'change':
            $arr[$index] = $value;
            return $arr;
        default:
            return $arr;

    }
}
