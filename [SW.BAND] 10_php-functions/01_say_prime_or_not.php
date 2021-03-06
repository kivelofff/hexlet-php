<?php
/**
 * Реализуйте функцию sayPrimeOrNot(), которая проверяет переданное число на простоту и печатает на экран yes или no.
Примеры

<?php

sayPrimeOrNot(5); // yes

sayPrimeOrNot(4); // no

Подсказки

Цель этой задачи — научиться отделять чистый код от кода с побочными эффектами.

Для этого выделите процесс определения того, является ли число простым, в отдельную функцию, возвращающую логическое значение. Это функция, с помощью которой мы отделяем чистый код от кода, интерпретирующего логическое значение (как 'yes' или 'no') и делающего побочный эффект (печать на экран).

Пример такого разделения и хороших абстракций — в решении учителя.
 */

function isPrime(int $num): bool
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= round(sqrt($num)); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function sayPrimeOrNot(int $num)
{
    $answer = isPrime($num) ? 'yes' : 'no';
    print_r($answer);
}

sayPrimeOrNot(5); // yes

sayPrimeOrNot(4); // no
sayPrimeOrNot(-3); // yes
sayPrimeOrNot(-4); // no
