<?php

namespace OopDesign\TaskTen\TaskFour;

use PHPUnit\Framework\TestCase;
use stdClass;

class ConverterTest extends TestCase
{
    public function testConverter()
    {
        $expectedObj = new stdClass();
        $assocArray = [
            'key' => 'value',
            'another_key' => 'another_value'
        ];
        foreach ($assocArray as $key => $value) {
            $expectedObj -> $key = $value;
        }
        $this->assertEquals($expectedObj, Converter::toStd($assocArray));
    }
}
