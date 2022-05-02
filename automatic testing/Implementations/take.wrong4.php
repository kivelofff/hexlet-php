<?php

namespace App\Implementations;

function take($collection, $length = 1)
{
    return $collection === [] ? [0] : array_slice($collection, 0, $length);
}
