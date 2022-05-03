<?php

namespace App;

function fill(&$coll, $value, $begin = 1, $end = null)
{
    $length = count($coll);
    $end = $end ?? $length;
    $normalizedBegin = $begin >= $end ? $end : $begin;
    $normalizedEnd = $end >= $length ? $length : $end;
    for ($i = $normalizedBegin; $i < $normalizedEnd; $i++) {
        $coll[$i] = $value;
    }
    return $coll;
}
