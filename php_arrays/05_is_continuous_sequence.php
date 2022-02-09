<?php

/*src\Arrays.php
Реализуйте функцию isContinuousSequence, которая проверяет, является ли переданная последовательность целых чисел возрастающей непрерывно (не имеющей пропусков чисел). Например, последовательность [4, 5, 6, 7] — непрерывная, а [0, 1, 3] — нет. Последовательность может начинаться с любого числа, главное условие — отсутствие пропусков чисел. Последовательность из одного числа не может считаться возрастающей.

<?php

isContinuousSequence([10, 11, 12, 13]);     // true
isContinuousSequence([10, 11, 12, 14, 15]); // false
isContinuousSequence([1, 2, 2, 3]);         // false
isContinuousSequence([]);                   // false*/
var_dump(isContinuousSequence([10, 11, 12, 13]));
var_dump(isContinuousSequence([10, 11, 12, 14, 15]));
var_dump(isContinuousSequence([1, 2, 2, 3]));
var_dump(isContinuousSequence([]));
function isContinuousSequence(array $arr): bool
{
    $length = count($arr);
    if ($length < 2) {
        return false;
    }
    for ($i = 1; $i < $length; $i++) {
        if ($arr[$i] != $arr[$i - 1] + 1) {
            return false;
        }
    }
    return true;
}
