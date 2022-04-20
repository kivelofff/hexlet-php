<?php
/**
 * Реализуйте функцию getDomainInfo(), которая принимает на вход имя сайта и возвращает информацию о нем:

<?php

use function App\Domains\getDomainInfo;

// Если домен передан без указания протокола,
// то по умолчанию берется http
getDomainInfo('yandex.ru')
// [
//     'scheme' => 'http',
//     'name' => 'yandex.ru'
// ]

getDomainInfo('https://hexlet.io');
// [
//     'scheme' => 'https',
//     'name' => 'hexlet.io'
// ]

getDomainInfo('http://google.com');
// [
//     'scheme' => 'http',
//     'name' => 'google.com'

// ]

Подсказки

substr()
str_replace()
 */

function getDomainInfo(string $domain): array
{
    $domainParts = explode('://', $domain);
    var_dump($domainParts);
    $scheme = (count($domainParts) == 1) ? 'http' : $domainParts[array_key_first($domainParts)];
    $name = $domainParts[array_key_last($domainParts)];
    return [
        'scheme' => $scheme,
        'name' => $name
    ];
}

var_dump(getDomainInfo('https://google.com'));
var_dump(getDomainInfo('ya.ru'));
