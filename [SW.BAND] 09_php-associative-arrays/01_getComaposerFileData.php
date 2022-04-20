<?php
/**
 * Обратите внимание на сходство json и ассоциативного массива. Оно не случайно. Json является представлением ассоциативного массива в текстовом виде. Composer во время каждого запуска считывает этот файл.
src\Arrays.php

Реализуйте функцию getComposerFileData, которая возвращет ассоциативный массив, соответствующий json из файла 01_composer.json в этом упражнении. Всё, что вам нужно сделать — посмотреть на содержимое 01_composer.json и руками сформировать массив аналогичной структуры.
**/

function getComposerFileData(): array
{
    return [
        "autoload" => ["files" => ["src/Arrays.php"]],
        "config" => ["vendor-dir" => "/composer/vendor"]
    ];
}

var_dump(getComposerFileData());
