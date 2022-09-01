<?php

require_once '../../vendor/autoload.php';

use function Symfony\Component\String\s;

/**
 * src\Normalizer.php

Реализуйте функцию getQuestions(), которая принимает на вход текст (полученный из редактора) и возвращает извлеченные из этого текста вопросы. Это должна быть строчка в форме списка разделенных переводом строки вопросов (смотрите секцию "Примеры").

Входящий текст разбит на строки и может содержать любые пробельные символы. Некоторые из этих строк являются вопросами. Они определяются по последнему символу: если это знак ?, то считаем строку вопросом.
Примеры

<?php



$text = <<<HEREDOC

lala\r\nr

ehu?\t

vie?eii

\n \t

i see you

/r \n

one two?\r\n\n

turum-purum

HEREDOC;



$result = getQuestions($text); // "ehu?\none two?"

echo $result;

// ehu?

// one two?
 */

function getQuestions(string $text):string
{
    return collect(s($text)->match('/.*[?]\\s/', PREG_SET_ORDER))
        ->flatten()
        ->map(fn($s) => trim($s))
        ->implode(PHP_EOL);
}

$text = <<<HEREDOC
lala\r\nr
ehu?\t
vie?eii
\n \t
i see you
/r \n
one two?\r\n\n
turum-purum
HEREDOC;

var_dump(getQuestions($text));

/**
 * function getQuestions(string $text)
{
$result = collect(s($text)->split("\n"))
->map(fn($line) => $line->trim())
->filter(fn ($line) => $line->endsWith('?'))
->toArray();
return implode("\n", $result);
}
 */
