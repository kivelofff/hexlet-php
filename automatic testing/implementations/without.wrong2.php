<?php

namespace App\Implementations;

function without(array $collection, array $values = [])
{
    $result =  array_values(array_diff($collection, $values));
    return $result === [] ? null : $result;
}
