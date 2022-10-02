<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Implementations\getFilesCount;

class SolutionTest extends TestCase
{
    public function testGetFilesCount(): void
    {
        $path = realpath(__DIR__ . '/../fixtures/nested');
        //BEGIN (write your solution here)

        //END
    }
}
