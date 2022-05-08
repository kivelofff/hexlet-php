<?php

/**
 * Реализуйте абстракцию (набор функций) для работы с прямоугольниками, стороны которого всегда параллельны осям. Прямоугольник может располагаться в любом месте координатной плоскости.

При такой постановке, достаточно знать только три параметра для однозначного задания прямоугольника на плоскости: координаты левой-верхней точки, ширину и высоту. Зная их, мы всегда можем построить прямоугольник одним единственным способом.

|

4 |    точка   ширина

|       *-------------

3 |       |            |

|       |            | высота

2 |       |            |

|       --------------

1 |

|

------|---------------------------

0 |  1   2   3   4   5   6   7

|

|

|

Основной интерфейс:

makeRectangle() (конструктор) – создает прямоугольник. Принимает параметры: левую-верхнюю точку, ширину и высоту. Ширина и высота – положительные числа.

Селекторы getStartPoint(), getWidth() и getHeight()

containsOrigin() – проверяет, принадлежит ли центр координат прямоугольнику (не лежит на границе прямоугольника, а находится внутри). Чтобы в этом убедиться, достаточно проверить, что все вершины прямоугольника лежат в разных квадрантах (их можно высчитать в момент проверки).

<?php



// Создание прямоугольника:

// p - левая верхняя точка

// 4 - ширина

// 5 - высота

//

// p    4

// -----------

// |         |

// |         | 5

// |         |

// -----------



$p = makeDecartPoint(0, 1);

$rectangle = makeRectangle($p, 4, 5);



containsOrigin($rectangle); // false



$rectangle2 = makeRectangle(makeDecartPoint(-4, 3), 5, 4);

containsOrigin($rectangle2); // true

Подсказки

Квадрант плоскости — любая из 4 областей (углов), на которые плоскость делится двумя взаимно перпендикулярными прямыми, принятыми в качестве осей координат.

 */

require_once "../vendor/autoload.php";

// BEGIN (write your solution here)
function makeRectangle(array $startPoint, int $width, int $height): array
{
    return [
        'startPoint' => $startPoint,
        'width' => $width,
        'height' => $height
    ];
}

function getStartPoint(array $rectangle): array
{
    return $rectangle['startPoint'];
}

function getWidth(array $rectangle): int
{
    return $rectangle['width'];
}

function getHeight(array $rectangle): int
{
    return $rectangle['height'];
}

function containsOrigin(array $rectangle): bool
{
    $startPoint = getStartPoint($rectangle);
    $width = getWidth($rectangle);
    $height = getHeight($rectangle);
    $firstQuadrant = getQuadrant($startPoint);
    $secondPoint = makeDecartPoint(getX($startPoint) + $width, getY($startPoint));
    $secondQuadrant = getQuadrant($secondPoint);
    $thirdPoint = makeDecartPoint(getX($startPoint), getY($startPoint) - $height);
    $thirdQuadrant = getQuadrant($thirdPoint);
    $fourthPoint = makeDecartPoint(getX($startPoint) + $width, getY($startPoint) - $height);
    $fourthQuadrant = getQuadrant($fourthPoint);
    $quadrants = [$firstQuadrant, $secondQuadrant, $thirdQuadrant, $fourthQuadrant];
    return count($quadrants) === count(array_unique($quadrants));
}
// END

$rectangleOne = makeRectangle(makeDecartPoint(-2, 2), 2, 2);

var_dump(containsOrigin($rectangleOne));
