<?php

namespace App\Implementations;

function get($collection, $key, $default = null)
{
    if (isset($collection[$key]) && !isset($default)) {
        return null;
    }
    if (!array_key_exists($key, $collection)) {
        return $default;
    }
    return $collection[$key];
}
