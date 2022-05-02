<?php
/**
 *

На данном этапе мы ещё не работали с классами, эта тема будет разбираться в более поздних курсах. В данном упражнении вам нужно только создать объект валидатора и вызывать его методы через стрелку ->.

tests/SolutionTest.php

Напишите тесты для класса Validator. Он проверяет корректность данных. Принцип работы валидатора следующий:

addCheck(fn) принимает в себя функцию для последующих проверок. Каждая проверка представляет собой функцию-предикат, которая принимает на вход проверяемое значение и возвращает либо true либо false в зависимости от того, соответствует ли значение требованиям проверки или нет.
isValid(value) проверяет соответствие значения всем добавленным проверкам. Если не было добавлено ни одной проверки, считается, что любое значение верное.

<?php



// Создаём объект валидатора.

// То же самое нужно сделать и в тестах,

// чтобы можно было вызывать функции на объекте

$validator = new Validator();

// Вызываем на нём функцию проверки значения

$validator->isValid('some value'); // true

// Добавляем ещё одну функцию валидации

$validator->addCheck(fn ($v) => $v > 5);

$validator->isValid(3); // false

$validator->isValid(8); // true

$validator->addCheck(/* add more checks *);

Подсказки

    Корректные и некорректные реализации класса и его методов находятся в каталоге Implementations

*/
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Implementations\RightValidator as Validator;

class testValidator extends TestCase
{
    public function testValidator(): void
    {
        // BEGIN (write your solution here)
        $positiveValidator = new Validator();
        $this->assertTrue($positiveValidator->isValid('data'));
        $positiveValidator->addCheck(fn($x) => $x < 10);
        $positiveValidator->addCheck(fn($x) => $x > 0);
        $this->assertTrue($positiveValidator->isValid(5));
        $this->assertFalse($positiveValidator->isValid(-5));
        $this->assertFalse($positiveValidator->isValid(15));
        $negativeValidator = new Validator();
        $negativeValidator->addCheck(fn($str) => is_string($str));
        $this->assertTrue($negativeValidator->isValid(''));
        $this->assertFalse($negativeValidator->isValid(555));
        // END
    }
}
