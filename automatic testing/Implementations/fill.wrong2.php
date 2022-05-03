<?php

namespace App;

function fill(&$coll, $value, $begin = 0, $end = null)
{
    $length = count($coll);
    $end = $end ?? $length;
    if ($begin >= $end) {
        $coll[$end] = $value;
        return $coll;
    }
    $normalizedEnd = $end >= $length ? $length : $end;
    for ($i = $begin; $i < $normalizedEnd; $i++) {
        $coll[$i] = $value;
    }
    return $coll;
}
