<?php

namespace App\Implementations;

function set(&$coll, array $path, $value)
{
    if (empty($coll)) {
        return $coll;
    }
    $key = $path[0];
    $coll[$key] = $value;
    return $coll;
}
