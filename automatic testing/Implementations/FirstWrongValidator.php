<?php

namespace App\Implementations;

class FirstWrongValidator
{
    private $checks = [];

    public function addCheck($fn)
    {
        $this->checks[] = $fn;
    }

    public function isValid($data)
    {
        return false;
    }
}