<?php
/**
 * Напишите тесты для функции without($coll, $values). Она принимает два массива, исключает из первого те значения, которые содержатся во втором и возвращает новый массив.

<?php



without([2, 1, 2, 3], [1, 2]); // [3]

without([2, 1, 2, 3]); // [2, 1, 2, 3]
 */

use PHPUnit\Framework\TestCase;

use function App\Implementations\without;

$functionName = 'right';

require_once  __DIR__ . "/implementations/without.$functionName.php";

class TestSolution extends TestCase
{
    public function testWithout()
    {
        // BEGIN (write your solution here)
        $this->assertEquals([1, 2], without([0, 1, 2, 3, 4], [0, 3, 4]));
        $this->assertEquals([], without([]));
        // END
    }
}
