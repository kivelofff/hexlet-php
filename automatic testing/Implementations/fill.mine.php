<?php
namespace App;

function fill(&$arr, $val, $start = 0, $end = null)
{
    $length = count($arr);
    $start = $start >= 0 ? $start : $length - $start;
    if ($start >= $length || $start < 0) {
        return $arr;
    }
    $end = $end ?? $length;
    $end = $end > $length ? $length : $end;

    for ($i = $start; $i < $end; $i++) {
        $arr[$i] = $val;
    }
    return $arr;
}