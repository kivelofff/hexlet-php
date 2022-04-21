<?php
/**
 * Реализуйте функцию pick, которая извлекает из переданного массива все элементы по указанным ключам и возвращает новый массив. Аргументы:

Исходный массив
Массив ключей, по которым должны быть выбраны элементы (ключ и значение) из исходного массива, и на основе выбранных данных сформирован новый массив

Примеры

<?php

$data = [
'user' => 'ubuntu',
'cores' => 4,
'os' => 'linux',
'null' => null
];

pick($data, ['user']);       // → ['user' => 'ubuntu']
pick($data, ['user', 'os']); // → ['user' => 'ubuntu', 'os' => 'linux']
pick($data, []);             // → []
pick($data, ['none']);       // → []
pick($data, ['null'])        // → ['null' => null]
 */

function pick(array $array, array $keys): array
{
    $pickedElements = [];
    foreach ($array as $key => $value) {
        if (in_array($key, $keys)) {
            $pickedElements[$key] = $value;
        }
    }
    return $pickedElements;
}

$data = [
    'user' => 'ubuntu',
    'cores' => 4,
    'os' => 'linux',
    'null' => null
];

var_dump(pick($data, ['user']));       // → ['user' => 'ubuntu']
var_dump(pick($data, ['user', 'os'])); // → ['user' => 'ubuntu', 'os' => 'linux']
var_dump(pick($data, []));             // → []
var_dump(pick($data, ['none']));       // → []
var_dump(pick($data, ['null']));        // → ['null' => null]