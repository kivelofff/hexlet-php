<?php

namespace Oop\One;

use Oop\One\Point;

function getMidPoint(Point $pointOne, Point $pointTwo): Point
{
    $midPoint = new Point();
    $midPoint->x = ($pointOne->x + $pointTwo->x) / 2;
    $midPoint->y = ($pointOne->y + $pointTwo->y) / 2;
    return $midPoint;
}

$point1 = new Point();
$point1->x = 1;
$point1->y = 10;
$point2 = new Point();
$point2->x = 10;
$point2->y = 1;

$midpoint = getMidpoint($point1, $point2);
print_r($midpoint->x); // 5.5
print_r($midpoint->y); // 5.5
