<?php

require_once "../../vendor/autoload.php";

use Oop\One\Point;
use function Oop\One\PointFunctions\getMidPoint;
use function Oop\One\PointFunctions\dup;

$point1 = new Point();
$point1->x = 1;
$point1->y = 10;
$point2 = new Point();
$point2->x = 10;
$point2->y = 1;

$midpoint = getMidpoint($point1, $point2);
print_r($midpoint->x); // 5.5
print_r($midpoint->y); // 5.5

//clonedPoint
$point14 = new Point();
$point14->x = 14;
$point14->y = 88;

$point95 = dup($point14);
$point95->x = 05;
$point95->y = 95;

var_dump($point14);
var_dump($point95);