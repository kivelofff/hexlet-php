<?php

namespace App\Implementations;

function without(array $collection, array $values = [])
{
    return array_values(array_diff($collection, $values));
}
