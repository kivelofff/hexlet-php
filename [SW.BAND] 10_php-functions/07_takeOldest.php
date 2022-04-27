<?php
/**
 * Реализуйте функцию takeOldest, которая принимает на вход список пользователей и возвращает самых взрослых. Количество возвращаемых пользователей задается вторым параметром, который по-умолчанию равен единице.
Пример использования

<?php

$users = [

['name' => 'Tirion', 'birthday' => '1988-11-19'],

['name' => 'Sam', 'birthday' => '1999-11-22'],

['name' => 'Rob', 'birthday' => '1975-01-11'],

['name' => 'Sansa', 'birthday' => '2001-03-20'],

['name' => 'Tisha', 'birthday' => '1992-02-27']

];



takeOldest($users);

# Array (

#     ['name' => 'Rob', 'birthday' => '1975-01-11']

# )

Подсказки

Даты можно сравнивать напрямую
firstN
usort

 */
require_once "../vendor/autoload.php";

use function Funct\Collection\firstN;

function takeOldest(array $users, int $num = 1): array
{
    usort($users, fn($a, $b) => $a['birthday'] <=> $b['birthday']);
    return firstN($users, $num);
}

$users = [

    ['name' => 'Tirion', 'birthday' => '1988-11-19'],

    ['name' => 'Sam', 'birthday' => '1999-11-22'],

    ['name' => 'Rob', 'birthday' => '1975-01-11'],

    ['name' => 'Sansa', 'birthday' => '2001-03-20'],

    ['name' => 'Tisha', 'birthday' => '1992-02-27']

];



var_dump(takeOldest($users, 2));
