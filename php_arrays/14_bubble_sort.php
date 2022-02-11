<?php
/*Реализуйте функцию bubbleSort, которая сортирует массив используя пузырьковую сортировку. Постарайтесь не подглядывать в текст теории и попробуйте воспроизвести алгоритм по памяти.

<?php

use function App\Arrays\bubbleSort;

bubbleSort([]); // []
bubbleSort([3, 10, 4, 3]); // [3, 3, 4, 10]*/

var_dump(bubbleSort([])); // []
var_dump(bubbleSort([3, 10, 4, 3])); // [3, 3, 4, 10]
var_dump(bubbleSort([4, 4, 3, 3, 2, 2, 2, 1, 1, 1, 1]));

function bubbleSort(array $arr): array
{
    do {
        $isSwapped = false;
        for ($i = 0, $length = count($arr); $i < $length - 1; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                $temp = $arr[$i + 1];
                $arr[$i + 1] = $arr[$i];
                $arr[$i] = $temp;
                $isSwapped = true;
            }
        }
    } while ($isSwapped);
    return $arr;
}