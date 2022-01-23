<?php


$matrixA = [[1, 2], [3, 2]];
$matrixB = [[3, 2], [1, 1]];

var_dump(multiply($matrixA, $matrixB));
// [[5, 4], [11, 8]]

$matrixC = [
    [2, 5],
    [6, 7],
    [1, 8],
];
$matrixD = [
    [1, 2, 1],
    [0, 1, 0],
];

var_dump(multiply($matrixC, $matrixD));
// [
//   [2, 9, 2],
//   [6, 19, 6],
//   [1, 10, 1],
// ]

function multiply($matrixA, $matrixB) {
    $mult=[];
    for ($i=0; $i<count($matrixA); $i++) {
        for ($j=0; $j<count($matrixB[0]); $j++) {
            $sum=0;
            for($k=0; $k<count($matrixA[0]); $k++) {
                $sum += $matrixA[$i][$k] * $matrixB[$k][$j];
            }
            $mult[$i][$j] = $sum;
        }

    }
    return $mult;
}
