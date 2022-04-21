<?php
error_reporting(E_ALL);
/**
 * Реализуйте функцию getIn, которая извлекает из массива (который может быть любой глубины вложенности) значение по указанным ключам. Аргументы:

Исходный массив
Массив ключей, по которым ведется поиск значения

В случае, когда добраться до значения невозможно, возвращается null.

<?php



$data = [

'user' => 'ubuntu',

'hosts' => [

['name' => 'web1'],

['name' => 'web2', null => 3, 'active' => false]

]

];



getIn($data, ['undefined']); // null

getIn($data, ['user']); // 'ubuntu'

getIn($data, ['user', 'ubuntu']); // null

getIn($data, ['hosts', 1, 'name']); // 'web2'

getIn($data, ['hosts', 0]); // ['name' => 'web1']

getIn($data, ['hosts', 1, null]); // 3

getIn($data, ['hosts', 1, 'active']); // false

 */

function getIn(array $data, array $keys)
{
    foreach ($keys as $key) {
        if (is_array($data) && array_key_exists($key, $data)) {
            $data = $data[$key];
        } else {
            return null;
        }
    }
    return $data;
}

$data = [

    'user' => 'ubuntu',

    'hosts' => [

        ['name' => 'web1'],

        ['name' => 'web2', null => 3, 'active' => false]

    ]

];



var_dump(getIn($data, ['undefined'])); // null

var_dump(getIn($data, ['user'])); // 'ubuntu'

var_dump(getIn($data, ['user', 'ubuntu'])); // null

var_dump(getIn($data, ['hosts', 1, 'name'])); // 'web2'

var_dump(getIn($data, ['hosts', 0])); // ['name' => 'web1']

var_dump(getIn($data, ['hosts', 1, null])); // 3

var_dump(getIn($data, ['hosts', 1, 'active'])); // false