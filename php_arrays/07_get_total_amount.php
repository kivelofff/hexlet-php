<?php
/*Реализуйте функцию getTotalAmount. Функция принимает на вход в виде массива кошелёк с деньгами и название валюты и возвращает сумму денег указанной валюты.

Реализуйте данную функцию используя управляющие инструкции.

Параметры функции:

Массив содержащий купюры различной валюты с различными номиналами
Наименование валюты
Примеры
<?php

$money1 = ['eur 10', 'usd 1', 'usd 10', 'rub 50', 'usd 5'];
getTotalAmount($money1, 'usd') // 16

$money2 = ['eur 10', 'usd 1', 'eur 5', 'rub 100', 'eur 20', 'eur 100', 'rub 200'];
getTotalAmount($money2, 'eur') // 135

$money3 = ['eur 10', 'rub 50', 'eur 5', 'rub 10', 'rub 10', 'eur 100', 'rub 200'];
getTotalAmount($money3, 'rub') // 270*/

$money1 = ['eur 10', 'usd 1', 'usd 10', 'rub 50', 'usd 5'];
var_dump(getTotalAmount($money1, 'usd')); // 16

$money2 = ['eur 10', 'usd 1', 'eur 5', 'rub 100', 'eur 20', 'eur 100', 'rub 200'];
var_dump(getTotalAmount($money2, 'eur')); // 135

$money3 = ['eur 10', 'rub 50', 'eur 5', 'rub 10', 'rub 10', 'eur 100', 'rub 200'];
var_dump(getTotalAmount($money3, 'rub')); // 270*/

function getTotalAmount(array $arr, string $currency): int
{
    $sum = 0;
    foreach ($arr as $bill) {
        if (str_starts_with($bill, $currency)) {
            $sum += intval(substr($bill, strrpos($bill, ' ')));
        }
    }
    return $sum;
}