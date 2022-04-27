<?php
/**
 * Реализуйте функцию getManWithLeastFriends, которая принимает список пользователей и возвращает пользователя, у которого меньше всего друзей.
Примечания

Если список пользователей пустой, то возвращается null
Если в списке есть более одного пользователя с минимальным количеством друзей, то возвращается последний из таких пользователей

Примеры

<?php



$users = [

['name' => 'Tirion', 'friends' => [

['name' => 'Mira', 'gender' => 'female'],

['name' => 'Ramsey', 'gender' => 'male']

]],

['name' => 'Bronn', 'friends' => []],

['name' => 'Sam', 'friends' => [

['name' => 'Aria', 'gender' => 'female'],

['name' => 'Keit', 'gender' => 'female']

]],

['name' => 'Keit', 'friends' => []],

['name' => 'Rob', 'friends' => [

['name' => 'Taywin', 'gender' => 'male']

]],

];



getManWithLeastFriends($users);

// => ['name' => 'Keit', 'friends' => []];
 */
require_once "../vendor/autoload.php";

use Funct\Collection;

function getManWithLeastFriends(array $users)
{

    return empty($users) ? null : Collection\minValue($users, fn($u) => count($u['friends']));
}
$users = [

    ['name' => 'Tirion', 'friends' => [

        ['name' => 'Mira', 'gender' => 'female'],

        ['name' => 'Ramsey', 'gender' => 'male']

    ]],

    ['name' => 'Bronn', 'friends' => []],

    ['name' => 'Sam', 'friends' => [

        ['name' => 'Aria', 'gender' => 'female'],

        ['name' => 'Keit', 'gender' => 'female']

    ]],

    ['name' => 'Keit', 'friends' => []],

    ['name' => 'Rob', 'friends' => [

        ['name' => 'Taywin', 'gender' => 'male']

    ]],

];



var_dump(getManWithLeastFriends($users));

// => ['name' => 'Keit', 'friends' => []];

var_dump(getManWithLeastFriends([]));