<?php

namespace App\Implementations;

class SecondWrongValidator
{
    private $checks = [];

    public function addCheck($fn)
    {
        $this->checks[] = $fn;
    }

    public function isValid($data)
    {
        return true;
    }
}
