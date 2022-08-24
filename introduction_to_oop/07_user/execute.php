<?php

require_once "../../vendor/autoload.php";

use Oop\Seven\User;
use function Oop\Seven\UserFunctions\areUsersEqual;
use Oop\Seven\Cat;

$user1 = new User();
$user1->id = 1;

$user2 = new User();
$user2->id = 1;

// 1 === 1
var_dump(areUsersEqual($user1, $user2)); // true

// У пользователя другой id
$user3 = new User();
$user3->id = 3;

// 1 === 3
var_dump(areUsersEqual($user1, $user3)); // false
// 1 === 3
var_dump(areUsersEqual($user2, $user3)); // false

// Другой тип
$cat = new Cat();
$cat->id = 1;

// Сравниваются разные типы, поэтому проверка завершается с ошибкой
var_dump(areUsersEqual($user1, $cat)); // Boom! (error)