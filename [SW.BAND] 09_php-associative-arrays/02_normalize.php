<?php
/**
 * Реализуйте функцию normalize(), которая "нормализует" данные переданного урока. То есть приводит их к определенному виду.

На вход этой функции подается ассоциативный массив, описывающий собой урок курса. В уроке содержатся два поля: имя и описание.

<?php

$lesson = [
'name' => 'Деструктуризация',
'description' => 'как удивить колек'

];

У некоторых уроков имя и описание могут быть в разном регистре. Такое случается при вводе данных:

<?php

$lesson = [
'name' => 'ДеструКТУРИЗАЦИЯ',
'description' => 'каК удивитЬ колек',

];

Наша функция должна обновлять содержимое урока по следующим правилам:

Имя капитализируется. То есть первый символ каждого слова имени становится заглавным, остальные маленькими.
Весь текст описания приводится к нижнему регистру.

<?php

use App\Lessons\normalize;

$lesson = [
'name' => 'ДеструКТУРИЗАЦИЯ',
'description' => 'каК удивитЬ колек',
];

// Обратите внимание, что не используется возврат.
// Изменение переданного массива внутри отражается
// на самом ассоциативном массиве:
normalize($lesson);

print_r($lesson);
// => [
// =>     'name' => 'Деструктуризация',
// =>     'description' => 'как удивить колек'

// => ]

Подсказки

mb_convert_case()
mb_strtolower()
 */

function normalize(array &$arr)
{
    $arr['name'] = mb_convert_case($arr['name'], MB_CASE_TITLE, "UTF-8");
    $arr['description'] = mb_strtolower($arr['description']);
}

$lesson = [
    'name' => 'ДеструКТУРИЗАЦИЯ',
    'description' => 'каК удивитЬ колек',
];
normalize($lesson);
var_dump($lesson);