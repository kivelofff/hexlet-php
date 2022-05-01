<?php

namespace App\Implementations;

function get($collection, $key)
{
    if (!array_key_exists($key, $collection)) {
        return null;
    }
    return $collection[$key];
}
