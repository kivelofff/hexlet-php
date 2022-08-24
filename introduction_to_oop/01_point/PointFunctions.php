<?php

namespace Oop\One\PointFunctions;

use Oop\One\Point;

function getMidPoint(Point $pointOne, Point $pointTwo): Point
{
    $midPoint = new Point();
    $midPoint->x = ($pointOne->x + $pointTwo->x) / 2;
    $midPoint->y = ($pointOne->y + $pointTwo->y) / 2;
    return $midPoint;
}

function dup(Point $point): Point
{
    $clonedPoint = new Point();
    $clonedPoint->x = $point->x;
    $clonedPoint->y = $point->y;
    return $clonedPoint;
}
