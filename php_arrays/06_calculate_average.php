<?php

/*Реализуйте функцию calculateAverage(), которая высчитывает среднее арифметическое элементов массива. Благодаря этой функции мы наконец-то посчитаем среднюю температуру по больнице. :)

Примеры
<?php

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5];

calculateAverage($temperatures); // 38.5
В случае пустого массива функция должна вернуть 0 (для этого в коде можно использовать guard expression):

<?php

$temperatures = [];

calculateAverage($temperatures); // 0*/

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5];

var_dump(calculateAverage($temperatures)); // 38.5
var_dump(calculateAverage([]));
function calculateAverage(array $arr): float
{
    if(empty($arr)) {
        return 0;
    }
    $sum = 0;
    foreach ($arr as $num) {
        $sum += $num;
    }
    return $sum / count($arr);
}