<?php
/**
 * Реализуйте интерфейсные фунции точек:

makePoint(). Принимает на вход координаты и возвращает точку. Уже реализован.
getX()
getY()

<?php



$x = 4;

$y = 8;



// $point хранит в себе данные в полярной системе координат

$point = makePoint($x, $y);



// Здесь происходит преобразование из полярной в декартову

getX($point); // 4

getY($point); // 8

Подсказки

Трансляция декартовых координат в полярные была описана в теории
Получить x можно по формуле radius * cos(angle)
Получить y можно по формуле radius * sin(angle)

 */
namespace Dat\Points;

function makePoint($x, $y)
{
    return [
        'angle' => atan2($y, $x),
        'radius' => sqrt($x ** 2 + $y ** 2)
    ];
}

// BEGIN (write your solution here)
function getX(array $point): float
{
    return $point['radius'] * cos($point['angle']);
}

function getY(array $point): float
{
    return $point['radius'] * sin($point['angle']);
}
// END
