<?php
/**
 * Отрезок - еще один графический примитив. В коде описывается парой точек, одна из которых - начало отрезка, другая - конец. Обычный отрезок не имеет направления, поэтому вы сами вольны выбирать то, какую точку считать началом, а какую концом.

В этом задании подразумевается, что вы уже понимаете принцип построения абстракции и способны самостоятельно принять решение о том, как она будет реализована. Напомню, что сделать это можно разными способами и нет одного правильного.
src\Segments.php

Реализуйте указанные ниже функции:

makeSegment(). Принимает на вход две точки и возвращает отрезок.
getMidpointOfSegment(). Принимает на вход отрезок и возвращает точку находящуюся на середине отрезка.
getBeginPoint(). Принимает на вход отрезок и возвращает точку начала отрезка.
getEndPoint(). Принимает на вход отрезок и возвращает точку конца отрезка.

<?php



$segment = makeSegment(makeDecartPoint(3, 2), makeDecartPoint(0, 0));



getMidpointOfSegment($segment); // (1.5, 1)

getBeginPoint($segment); // (3, 2)

getEndPoint($segment); // (0, 0)
 */

function makeDecartPoint($x, $y)
{
    return [
        'x' => $x,
        'y' => $y
    ];
}

function getX($point)
{
    return $point['x'];
}

function getY($point)
{
    return $point['y'];
}


function makeSegment(array $begin, array $end): array
{
    return ['begin' => $begin, 'end' => $end];
}

function getMidpointOfSegment(array $segment): array
{
    $midX = (getX($segment['begin']) + getX($segment['end'])) / 2;
    $midY = (getY($segment['begin']) + getY($segment['end'])) / 2;
    return makeDecartPoint($midX, $midY);

}

function getBeginPoint(array $segment): array
{
    return $segment['begin'];
}

function getEndPoint(array $segment): array
{
    return $segment['end'];
}


$segment = makeSegment(makeDecartPoint(3, 2), makeDecartPoint(0, 0));



var_dump(getMidpointOfSegment($segment)); // (1.5, 1)

var_dump(getBeginPoint($segment)); // (3, 2)

var_dump(getEndPoint($segment)); // (0, 0)
