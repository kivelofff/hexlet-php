<?php
echo sumIntervals([[5, 5]]).'<br>'; // 0

echo sumIntervals([[-100, 0]]).'<br>'; // 100

echo sumIntervals([
    [1, 2],
    [11, 12]
]).'<br>'; // 2

echo sumIntervals([
    [2, 7],
    [6, 6]
]).'<br>'; // 5

echo sumIntervals([
    [1, 9],
    [7, 12],
    [3, 4]
]).'<br>'; // 11

echo sumIntervals([
    [1, 5],
    [-10, 19],
    [1, 7],
    [16, 100],
    [5, 11]
]).'<br>'; // 110

echo sumIntervals([
        [1, 10],
        [20, 30],
        [12, 15],
        [5, 25]
    ]).'<br>'; // 29

function sumIntervals($intervals) {
    echo "calculate sum of intervals:"."<br>";
    $sum=0;
    for ($i=0; $i<count($intervals); $i++) {
        $end = $intervals[$i][1];
        $start = $intervals[$i][0];
        echo "[$start, $end]".'<br>';
        $length = $end-$start;
        for ($j=0; $j<$i; $j++) {
            if ($intervals[$j][0]<$intervals[$i][0] && $intervals[$i][1]<$intervals[$j][1]) {
                $length=0;
            } else if ($intervals[$i][0]<$intervals[$j][0] && $intervals[$j][1]<$intervals[$i][1]) {
                $length -= $intervals[$j][1]-$intervals[$j][0];
            } else if ($intervals[$j][0]<$intervals[$i][0] && $intervals[$i][0]<$intervals[$j][1]) {
                $length -= $intervals[$j][1] - $intervals[$i][0];
            }else if ($intervals[$j][0]<$intervals[$i][1] && $intervals[$i][1]<$intervals[$j][1]) {
                $length -= $intervals[$i][1]- $intervals[$j][0];
            }
        }
        $sum+=$length>0 ? $length : 0;
    }
    return $sum;
}
