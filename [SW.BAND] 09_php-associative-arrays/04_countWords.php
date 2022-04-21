<?php
/**
 * Реализуйте функцию countWords(), которая считает количество слов в предложении и возвращает ассоциативный массив в котором ключи это слова (приведенные к нижнему регистру), а значения — это то сколько раз слово встретилось в предложении. Слова в предложении могут находиться в разных регистрах. Перед подсчетом их нужно приводить в нижний регистр, чтобы не пропускались дубли.

<?php



// Если предложение пустое, то возвращается пустой объект

countWords('');

// []



$text1 = 'one two three two ONE one wow';

countWords($text1);

// [

//     'one' => 3,

//     'two' => 2,

//     'three' => 1,

//     'wow' => 1

// ]



$text2 = 'another one sentence with strange Words words';

countWords($text2);

// [

//     'another' => 1,

//     'one' =>  1,

//     'sentence' => 1,

//     'with' => 1,

//     'strange' => 1,

//     'words' => 2

// ]

Подсказки

Для формирования массива слов поможет функция explode()
mb_strtolower() – приведение к нижнему регистру

 */

function countWords(string $sentence): array
{
    $wordMap = [];
    if(empty($sentence)) {
        return $wordMap;
    }
    $allWords = explode(' ', mb_strtolower($sentence));
    foreach ($allWords as $word) {
        $wordMap[$word] = ($wordMap[$word] ?? 0) + 1;
    }
    return $wordMap;
}
var_dump(countWords(''));

$text1 = 'one two three two ONE one wow';

var_dump(countWords($text1));

$text2 = 'another one sentence with strange Words words';

var_dump(countWords($text2));