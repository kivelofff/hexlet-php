<?php

namespace Web\Fifteen\src;

interface ValidatorInterface
{
    // Return array of errors, or empty array if no errors
    public function validate(array $data);
}
