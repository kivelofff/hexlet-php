<?php

namespace OopDesign\TaskTen\TaskSix;

use PHPUnit\Framework\TestCase;

class ComparatorTest extends TestCase
{
    public function testComparatorPositive()
    {
        $comparator = new Comparator();
        $this->assertTrue($comparator->compare("ab#c", "ab#c"));
    }
    
    public function testComparatorNegative()
    {
        $comparator = new Comparator();
        $this->assertFalse($comparator->compare("ab##cde", "acde"));
    }
}
