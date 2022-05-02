<?php

namespace App\Implementations;

class ThirdWrongValidator
{
    private $checks = [];

    public function addCheck($fn)
    {
        $this->checks = [$fn];
    }

    public function isValid($data)
    {
        foreach ($this->checks as $check) {
            if (!$check($data)) {
                return false;
            }
        }
        return true;
    }
}
