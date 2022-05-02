<?php
/**
 * tests/TestSolution.php

Напишите тесты для функции gt($value, $other), которая возвращает true в том случае, если $value > $other, и false в иных случаях.

<?php



gt(3, 1); // true



gt(3, 3); // false



gt(1, 3); // false
 */

use PHPUnit\Framework\TestCase;

$functionName = 'wrong3';

require_once __DIR__ . "/Implementations/gt.$functionName.php";

use function App\Implementations\gt;

class TestSolution extends TestCase
{
    public function testGt()
    {
        // BEGIN (write your solution here)
        $this->assertTrue(gt(5, 3));
        $this->assertFalse(gt(3, 5));
        $this->assertFalse(gt(5, 5));
        // END
    }
}
