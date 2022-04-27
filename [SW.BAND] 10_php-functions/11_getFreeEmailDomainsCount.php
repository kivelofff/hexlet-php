<?php
/**
 * Реализуйте функцию getFreeDomainsCount, которая принимает на вход список емейлов, а возвращает количество емейлов, расположенных на каждом бесплатном домене. Список бесплатных доменов хранится в константе FREE_EMAIL_DOMAINS.
Пример использования

<?php



$emails = [

'info@gmail.com',

'info@yandex.ru',

'info@hotmail.com',

'mk@host.com',

'support@hexlet.io',

'key@yandex.ru',

'sergey@gmail.com',

'vovan@gmail.com',

'vovan@hotmail.com'

];



getFreeDomainsCount($emails);

# Array (

#     'gmail.com' => 3

#     'yandex.ru' => 2

#     'hotmail.com' => 2

#  )
 */

const FREE_EMAIL_DOMAINS = [
    'gmail.com', 'yandex.ru', 'hotmail.com'
];

function getDomain(string $string): string
{
    return substr($string, strpos($string, '@')+1);
}

function getFreeDomainsCount(array $emails): array
{
    $domains = array_map(fn($e) => getDomain($e), $emails);
    $freeDomains = array_filter($domains, fn($e) => in_array($e, FREE_EMAIL_DOMAINS));
    return array_reduce($freeDomains, function ($carry, $e) {

        $carry[$e] = ($carry[$e] ?? 0) + 1;
        return $carry;
    }, []);
}

$emails = [

    'info@gmail.com',

    'info@yandex.ru',

    'info@hotmail.com',

    'mk@host.com',

    'support@hexlet.io',

    'key@yandex.ru',

    'sergey@gmail.com',

    'vovan@gmail.com',

    'vovan@hotmail.com'

];



var_dump(getFreeDomainsCount($emails));

# Array (

#     'gmail.com' => 3

#     'yandex.ru' => 2

#     'hotmail.com' => 2

#  )
