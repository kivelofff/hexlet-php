<?php
/**
 * Реализуйте функцию getMidpoint(), которая находит точку посередине между двумя указанными точками

<?php



$point1 = ['x' => 0, 'y' => 0];

$point2 = ['x' => 4, 'y' => 4];

$point3 = getMidpoint($point1, $point2);

print_r($point3); // => [ 'x' => 2, 'y' => 2 ]

Подсказки

Средняя точка вычисляется по формуле x = (x1 + x2) / 2 и y = (y1 + y2) / 2.

 */

function getMidpoint(array $point1, array $point2): array
{
    $xAver = ($point1['x'] + $point2['x']) / 2;
    $yAver = ($point1['y'] + $point2['y']) / 2;
    return ['x' => $xAver, 'y' => $yAver];
}

$point1 = ['x' => 10, 'y' => -10];
$point2 = ['x' => 20, 'y' => 10];
var_dump(getMidpoint($point1, $point2));