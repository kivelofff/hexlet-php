<?php
namespace App;

function fill(&$coll, $value, $begin = 0, $end = null)
{
    $length = count($coll);
    $end = $end ?? $length;
    $normalizedBegin = $begin < 0 ? 0 : $begin;
    $normalizedBegin = $normalizedBegin > $end ? $end : $begin;
    $normalizedEnd = $end >= $length ? $length : $end;
    for ($i = $normalizedBegin; $i < $normalizedEnd; $i++) {
        $coll[$i] = $value;
    }
    return $coll;
}
