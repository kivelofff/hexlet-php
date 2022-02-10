<?php
/*src\Strings.php
Реализуйте функцию makeCensored, которая заменяет каждое вхождение указанных слов в предложении на последовательность $#%! и возвращает полученную строку. Аргументы:

Текст
Набор стоп слов
Словом считается любая непрерывная последовательность символов, включая любые спецсимволы (без пробелов).

Примеры
<?php

use function App\Strings\makeCensored;

$sentence = 'When you play the game of thrones, you win or you die';
makeCensored($sentence, ['die', 'play']);
// => When you $#%! the game of thrones, you win or you $#%!

$sentence2 = 'chicken chicken? chicken! chicken';
makeCensored($sentence2, ['?', 'chicken']);
// => '$#%! chicken? chicken! $#%!';
Подсказки
Тернарная операция может сослужить вам хорошую службу в этой практике.
Массив стоп слов может содержать как больше, так и меньше двух элементов.*/

$sentence = 'When you play the game of thrones, you win or you die';
var_dump(makeCensored($sentence, ['die', 'play']));
$sentence2 = 'chicken chicken? chicken! chicken';
var_dump(makeCensored($sentence2, ['?', 'chicken']));

function makeCensored(string $sentence, array $exclude): string
{
    $words = explode(' ', $sentence);
    $censoredWords = [];
    foreach ($words as $word) {
        $censoredWords[] = in_array($word, $exclude) ? '$#%!' : $word;
    }
    $result = implode(' ', $censoredWords);
    return $result;
}