<?php
/**
 * лаг — часть адреса сайта, которая используется для идентификации ресурса в Человекопонятном виде. Без слага /posts/3, со слагом /posts/my-super-post, где слаг это my-super-post. Слаг обычно генерируется автоматически на основе названия ресурса, например статьи. На Хекслете слаги используются повсеместно.

Функция, выполняющая трансляцию текста в слаг, есть и в библиотеке Funct:

<?php

\Funct\Strings\slugify('Global Thermonuclear Warfare'); // 'global-thermonuclear-warfare'

\Funct\Strings\slugify('Crème brûlée'); // 'creme-brulee'

src\Slugify.php

Реализуйте функцию slugify самостоятельно, не прибегая к \Funct\Strings\slugify. Преобразования, которые она должна делать:

Приводить к нижнему регистру все символы в строке
Удалять все пробелы
Соединять слова с помощью дефисов

Примеры использования

<?php

slugify(''); // ''
slugify('test'); // 'test'
slugify('test me'); // 'test-me'
slugify('La La la LA'); // 'la-la-la-la'
slugify('O la      lu'); // 'o-la-lu'

slugify(' yOu   '); // 'you'

Подсказки

Функции, которые вам могут понадобится:

toLower
compact

В общем случае это не обязательно. Возможно, ваше решение не будет похожим на решение учителя
 */
require_once "../vendor/autoload.php";

use function \Funct\Strings\toLower;
use function \Funct\Collection\compact;

function slugify(string $str): string
{
    if (empty($str)) {
        return '';
    }
    $smallLettersStr = toLower($str);
    $separatedWords = explode(" ", $smallLettersStr);
    $arr = compact($separatedWords);
    return implode('-', $arr);
}

var_dump(slugify('')); // ''
var_dump(slugify('test')); // 'test'
var_dump(slugify('test me')); // 'test-me'
var_dump(slugify('La La la LA')); // 'la-la-la-la'
var_dump(slugify('O la      lu')); // 'o-la-lu'

var_dump(slugify(' yOu   ')); // 'you'