<?php
/*Реализуйте функцию countUniqChars, которая получает на вход строку и считает, сколько символов (уникальных символов) использовано в этой строке. Например, в строке 'yy' всего один уникальный символ — y. А в строке '111yya!' — четыре уникальных символа: 1, y, a и !.

Задание необходимо выполнить без использования функций array_unique и count_chars.

Примеры
<?php

$text1 = 'yyab';
countUniqChars($text1); // 3

$text2 = 'You know nothing Jon Snow';
countUniqChars($text2); // 13

$text3 = '';
countUniqChars($text3); // 0
Примечания
Если передана пустая строка, то функция должна вернуть 0, так как пустая строка вообще не содержит символов.*/

$text1 = 'yyab';
var_dump(countUniqChars($text1)); // 3

$text2 = 'You know nothing Jon Snow';
var_dump(countUniqChars($text2)); // 13

$text3 = '';
var_dump(countUniqChars($text3)); // 0
$text4 = '0';
//string '0' is an empty string!
var_dump(countUniqChars($text4)); // 1

function countUniqChars(string $string): int
{
    if (strlen($string) == 0) {
        return 0;
    }
    $chars = str_split($string);
    $uniqueChars = [];
    foreach ($chars as $char) {
        if (!in_array($char, $uniqueChars)) {
            $uniqueChars[] = $char;
        }
    }
    return count($uniqueChars);
}