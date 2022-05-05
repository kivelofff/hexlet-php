<?php
namespace Dat\Implementations\Segments;

use function Dat\Points\getX;
use function Dat\Points\getY;

function makeSegment($point1, $point2)
{
    return ['beginPoint' => $point1, 'endPoint' => $point2];
}

function getBeginPoint($segment)
{
    return $segment['beginPoint'];
}

function getEndPoint($segment)
{
    return $segment['endPoint'];
}

function isParallelWithX($segment)
{
    $beginPoint = getBeginPoint($segment);
    $endPoint = getEndPoint($segment);

    return getY($beginPoint) === getY($endPoint);
}

function isParallelWithY($segment)
{
    $beginPoint = getBeginPoint($segment);
    $endPoint = getEndPoint($segment);

    return getX($beginPoint) === getX($endPoint);
}