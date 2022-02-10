<?php
/*Реализуйте функцию getSameCount, которая считает количество общих уникальных элементов для двух массивов. Аргументы:

Первый массив
Второй массив
Примеры
<?php

getSameCount([], []); // 0
getSameCount([4, 4], [4, 4]); // 1
getSameCount([1, 10, 3], [10, 100, 35, 1]); // 2
getSameCount([1, 3, 2, 2], [3, 1, 1, 2]); // 3*/

print_r(getSameCount([], []));
print_r(getSameCount([4, 4], [4, 4]));
print_r(getSameCount([1, 10, 3], [10, 100, 35, 1]));
print_r(getSameCount([1, 3, 2, 2], [3, 1, 1, 2]));

function getSameCount(array $firstArray, array $secondArray): int
{
    $uniqueFirst = array_unique($firstArray);
    $uniqueSecond = array_unique($secondArray);
    $unique = array_intersect($uniqueFirst, $uniqueSecond);
    return count($unique);
}