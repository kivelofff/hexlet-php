<?php

/*07
 * Реализуйте функцию areUsersEqual($user, $user), которая сравнивает переданных пользователей на основе значений их
идентификаторов (свойство id). При этом функция должна убедиться, что переданные объекты - пользователи.
Сделайте это через указание типов для аргументов функции.*/

namespace Oop\Seven\UserFunctions;

use Oop\Seven\User;

function areUsersEqual(User $user1, User $user2): bool
{
    return $user1->id === $user2->id;
}
