<?php

var_dump(summaryRanges([]));
var_dump(summaryRanges([1]));
var_dump(summaryRanges([1,2,3]));
var_dump(summaryRanges([0, 1, 2, 4, 5, 7]));
var_dump(summaryRanges([110, 111, 112, 111, -5, -4, -2, -3, -4, -5]));

function summaryRanges($arr) {
    echo "calculate ranges for :".'<br>';
    var_dump($arr);
    $ranges=[];
    $start=null;
    $end=null;
    $len = count($arr);
    for ($i=1; $i < $len; $i++) {
        if ($arr[$i]==$arr[$i-1]+1) {
            if ($start === null) {
                $start = $arr[$i-1];
                continue;
            }
        } else {
            if ($start !== null) {
                $end = $arr[$i-1];
            }
        }
        if ($start !== null && $end === null && $i==$len-1) {
            $end = $arr[$i];
        }
        if ($start !== null && $end !== null) {
            $ranges[] = "$start->$end";
            $start=null;
            $end=null;
        }
    }
    return $ranges;
}
