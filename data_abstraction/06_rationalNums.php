<?php
/**
 *Реализуйте абстракцию для работы с рациональными числами включающую в себя следующие функции:

Конструктор makeRational - принимает на вход числитель и знаменатель, возвращает дробь.
Селектор getNumer - возвращает числитель
Селектор getDenom - возвращает знаменатель
Сложение add - складывает две переданные дроби
Вычитание sub - находит разность между двумя дробями

Не забудьте реализовать нормализацию дробей удобным для вас способом

<?php

$rat1 = makeRational(3, 9);

getNumer($rat1); // 1

getDenom($rat1); // 3



$rat2 = makeRational(10, 3);



$rat3 = add($rat1, $rat2);

RatToString($rat3); // 11/3



$rat4 = sub($rat1, $rat2);

RatToString($rat4); // -3/1

Подсказки

Функция gcd находит наибольший общий делитель двух чисел
Функция RatToString возвращает строковое представление числа (используется для отладки)

 */

require_once "../vendor/autoload.php";
// BEGIN (write your solution here)
function makeRational(int $numer, int $denom): array
{
    $gcd = gcd($numer, $denom);
    return ['numer' => $numer / $gcd, 'denom' => $denom / $gcd];
}

function getNumer(array $rat): int
{
    return $rat['numer'];
}

function getDenom(array $rat): int
{
    return $rat['denom'];
}

function findCommonDenom(array $rat1, array $rat2): int
{
    $denom1 = getDenom($rat1);
    $denom2 = getDenom($rat2);
    $gcd = gcd($denom1, $denom2);
    return abs($denom1 * $denom2 / $gcd);
}

function getReducedNumer(array $rat, int $denom): int
{
    return getNumer($rat) * $denom / getDenom($rat);
}

function add(array $rat1, array $rat2): array
{
    $commonDenom = findCommonDenom($rat1, $rat2);
    $reducedNum1 = getReducedNumer($rat1, $commonDenom);
    $reducedNum2 = getReducedNumer($rat2, $commonDenom);
    $newNum = $reducedNum1 + $reducedNum2;
    return makeRational($newNum, $commonDenom);
}

function sub(array $rat1, array $rat2): array
{
    $commonDenom = findCommonDenom($rat1, $rat2);
    $reducedNum1 = getReducedNumer($rat1, $commonDenom);
    $reducedNum2 = getReducedNumer($rat2, $commonDenom);
    $newNum = $reducedNum1 - $reducedNum2;
    return makeRational($newNum, $commonDenom);
}
// END

function ratToString($rat)
{
    return getNumer($rat) . '/' . getDenom($rat);
}

$rat1 = makeRational(-4, 16);

var_dump(getNumer($rat1)); // 1

var_dump(getDenom($rat1)); // 3



$rat2 = makeRational(12, 5);



$rat3 = add($rat1, $rat2);

var_dump(RatToString($rat3)); // 11/3



$rat4 = sub($rat1, $rat2);

var_dump(RatToString($rat4)); // -3/1
