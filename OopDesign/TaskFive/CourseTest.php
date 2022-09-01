<?php

namespace OopDesign\TaskTen\TaskFive;

use PHPUnit\Framework\TestCase;

class CourseTest extends TestCase
{
    function testGetName() {
        $name = 'name';
        $course = new Course($name);
        $this->assertEquals($name, $course->getName());
    }
}
