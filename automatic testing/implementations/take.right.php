<?php

namespace App\Implementations;

function take($collection, $length = 1)
{
    return array_slice($collection, 0, $length);
}
