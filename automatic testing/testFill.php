<?php
/**
 * В этом упражнении вам предстоит попрактиковаться в подходе "Разработка через тестирование". Вам нужно будет написать и тесты и реализацию функции. Сначала напишите тесты и запуcтите тестирование. Тесты должны упасть. Затем напишите решение, которое будет проходить тесты.
tests/SolutionTest.php

Напишите тесты для функции fill($coll, $value, $start, $end), которая заполняет элементы массива переданным значением, начиная со старта и заканчивая (но не включая) конечной позицией. Функция меняет исходный массив!

Функция принимает следующие аргументы:

$coll – массив, элементы которого будут заполнены
$value – значение, которым будут заполнены элементы массива
$start – стартовая позиция, по умолчанию равна нулю
$end – конечная позиция, по умолчанию равна длине массива

<?php



// все вызовы нужно рассматривать, как независимые



$array =  [1, 2, 3, 4];



fill($array, '*', 1, 3);

print_r($array); // => [1, '*', '*', 4]



fill($array, '*');

print_r($array); // => ['*', '*', '*', '*']



fill($array, '*', 4);

print_r($array); // => [1, 2, 3, 4];



fill($array, '*', 0, 10);

print_r($array); // => ['*', '*', '*', '*'];

src/fill.php

Реализуйте функцию fill($coll, $value, $start, $end), основываясь на описании и примерах её работы.
 */
namespace App;

use PHPUnit\Framework\TestCase;

$functionName = 'mine';

require_once "Implementations/fill.$functionName.php";


// BEGIN (write your solution here)
class testFill extends TestCase
{
    private $array;

    public function setUp(): void
    {
        $this->array = [10, 20, 30, [40, 50], 60];
    }

    public function testPositive(): void
    {
        $exp = $this->array;
        $exp[1] = $exp[2] = 0;
        $act = fill($this->array, 0, 1, 3);
        $this->assertEquals($exp, $act);
    }

    public function testPositive2(): void
    {
        $exp = [0, 0, 0, 0, 0];
        $act = fill($this->array, 0);
        $this->assertEquals($exp, $act);
    }

    public function testNegative(): void
    {
        $exp = $this->array;
        $act = fill($this->array, 0, count($this->array));
        $this->assertEquals($exp, $act);
    }

    public function testNegative2(): void
    {
        $exp = $this->array;
        $act = fill($this->array, 0, 0, 0);
        $this->assertEquals($exp, $act);
    }

    public function testNegative3(): void
    {
        $exp = $this->array;
        $exp[4] = 0;
        $act = fill($this->array, 0, 4, 15);
        $this->assertEquals($exp, $act);
    }
}

// END
