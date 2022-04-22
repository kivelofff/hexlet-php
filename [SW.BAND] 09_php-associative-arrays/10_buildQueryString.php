<?php
/**
 * Query String (строка запроса) — часть адреса страницы в интернете содержащая константы и их значения. Она начинается после вопросительного знака и идет до конца адреса. Пример:

# query string: page=5

https://ru.hexlet.io/blog?page=5

Если параметров несколько, то они отделяются амперсандом &:

# query string: page=5&per=10

https://ru.hexlet.io/blog?per=10&page=5

src/AssociativeArrays.php

Реализуйте функцию buildQueryString, которая принимает на вход список параметров и возвращает сформированный query string из этих параметров:
Примеры

<?php



buildQueryString(['per' => 10, 'page' => 1 ]);

// → page=1&per=10

Имена параметров в выходной строке должны располагаться в алфавитном порядке (то есть их нужно отсортировать).
Подсказки

ksort

 */

function buildQueryString(array $params): string
{
    ksort($params);
    $queryString = '';
    foreach ($params as $param => $value) {
        $queryString .= "$param=$value&";
    }
    return rtrim($queryString, "&");
}

print_r(buildQueryString(['per' => 10, 'page' => 1 ]));

