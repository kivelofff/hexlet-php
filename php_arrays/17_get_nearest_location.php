<?php
/*Реализуйте функцию getTheNearestLocation(), которая находит место ближайшее к указанной точке на карте и возвращает его. Параметры функции:

$locations – массив мест на карте. Каждое место это массив из двух элементов, где первый элемент это название места, второй – точка на карте (массив из двух чисел x и y).
$point – текущая точка на карте. Массив из двух элементов-координат x и y.
Примеры
<?php

$locations = [
    ['Park', [10, 5]],
    ['Sea', [1, 3]],
    ['Museum', [8, 4]],
];

$currentPoint = [5, 5];

// Если точек нет, то возвращается null
getTheNearestLocation([], $currentPoint); // null

getTheNearestLocation($locations, $currentPoint); // ['Museum', [8, 4]]
Для решения этой задачи деструктуризация не нужна, но мы хотим её потренировать. Поэтому решите эту задачу без обращения к индексам массивов.

Подсказки
Расстояние между точками высчитывается с помощью функции getDistance().*/
$currentPoint = [5, 5];

$locations = [
    ['Park', [10, 5]],
    ['Sea', [1, 3]],
    ['Museum', [8, 4]],
];

var_dump(getTheNearestLocation([], $currentPoint)); // null

var_dump(getTheNearestLocation($locations, $currentPoint)); // ['Museum', [8, 4]]

function getDistance(array $point1, array $point2)
{
    [$x1, $y1] = $point1;
    [$x2, $y2] = $point2;

    $xs = $x2 - $x1;
    $ys = $y2 - $y1;

    return sqrt($xs ** 2 + $ys ** 2);
}

function getTheNearestLocation(array $locations, array $point)
{
    $distance = PHP_INT_MAX;
    $nearest = null;
    foreach ($locations as $location) {
        [, $locationPoint] = $location;
        $currentDistance = getDistance($point, $locationPoint);
        if ($currentDistance < $distance) {
            $distance = $currentDistance;
            $nearest = $location;
        }
    }
    return $nearest;
}