<?php
/**
 * Реализуйте функцию getChildren, которая принимает на вход список пользователей и возвращает плоский список их детей. Дети каждого пользователя хранятся в виде массива в ключе children
Пример использования

<?php



$users = [

['name' => 'Tirion', 'children' => [

['name' => 'Mira', 'birdhday' => '1983-03-23']

]],

['name' => 'Bronn', 'children' => []],

['name' => 'Sam', 'children' => [

['name' => 'Aria', 'birdhday' => '2012-11-03'],

['name' => 'Keit', 'birdhday' => '1933-05-14']

]],

['name' => 'Rob', 'children' => [

['name' => 'Tisha', 'birdhday' => '2012-11-03']

]],

];



getChildren($users);

// [

//     ['name' => 'Mira', 'birdhday' => '1983-03-23'],

//     ['name' => 'Aria', 'birdhday' => '2012-11-03'],

//     ['name' => 'Keit', 'birdhday' => '1933-05-14'],

//     ['name' => 'Tisha', 'birdhday' => '2012-11-03']

// ]

Подсказки

flatten

 */
require_once "../vendor/autoload.php";

use function Funct\Collection\flatten;

function getChildren(array $users): array
{
    $children = array_map(fn($user) => $user['children'], $users);
    return flatten($children);
}

$users = [

    ['name' => 'Tirion', 'children' => [

        ['name' => 'Mira', 'birdhday' => '1983-03-23']

    ]],

    ['name' => 'Bronn', 'children' => []],

    ['name' => 'Sam', 'children' => [

        ['name' => 'Aria', 'birdhday' => '2012-11-03'],

        ['name' => 'Keit', 'birdhday' => '1933-05-14']

    ]],

    ['name' => 'Rob', 'children' => [

        ['name' => 'Tisha', 'birdhday' => '2012-11-03']

    ]],

];



var_dump(getChildren($users));

// [

//     ['name' => 'Mira', 'birdhday' => '1983-03-23'],

//     ['name' => 'Aria', 'birdhday' => '2012-11-03'],

//     ['name' => 'Keit', 'birdhday' => '1933-05-14'],

//     ['name' => 'Tisha', 'birdhday' => '2012-11-03']

// ]