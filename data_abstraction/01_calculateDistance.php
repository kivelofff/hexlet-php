<?php
/**
 * Реализуйте функцию calculateDistance(), которая находит расстояние между двумя точками на плоскости.

<?php



$point1 = [0, 0];

$point2 = [3, 4];

calculateDistance($point1, $point2); // 5


 */
function calculateDistance(array $p1, array $p2): float
{
    $dx = abs($p2[0] - $p1[0]);
    $dy = abs($p2[1] - $p1[1]);
    return sqrt(pow($dx, 2) + pow($dy, 2));
}

$p1 = [0, 0];
$p2 = [5,3];

var_dump(calculateDistance($p1, $p2));

$p3 = [6, 5];
$p4 = [5,6];

var_dump(calculateDistance($p3, $p4));