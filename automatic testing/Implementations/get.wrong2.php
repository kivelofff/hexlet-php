<?php

namespace App\Implementations;

function get($collection, $key, $default = null)
{
    $value = $collection[$key] ?? null;
    return $default ?? $value;
}
