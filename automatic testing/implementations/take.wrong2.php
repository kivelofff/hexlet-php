<?php

namespace App\Implementations;

function take($collection, $length = 1)
{
    if ($length >= count($collection)) {
        return [];
    }
    return array_slice($collection, 0, $length);
}
