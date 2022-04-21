<?php
/**
 * Реализуйте набор функций, для работы со словарём, построенным на хеш-таблице. Для простоты, наша реализация не поддерживает разрешение коллизий.

По сути в этом задании надо реализовать ассоциативный массив. По понятным причинам использовать ассоциативные массивы для их создания нельзя. Представьте что в языке ассоциативных массивов нет и мы их хотим добавить.

make() — создаёт новый словарь
set($map, $key, $value) — устанавливает в словарь значение по ключу. Работает и для создания и для изменения. Функция возвращает true, если удалось установить значение. При возникновении коллизии, функция никак не меняет словарь и возвращает false
get($map, $key, $defaultValue = null) — читает в словаре значение по ключу и возвращает его. Параметр $defaultValue — значение, которое функция возвращает, если в словаре нет ключа (по умолчанию равно null). При возникновении коллизии функция также возвращает значение по умолчанию

Функции set() и get() принимают первым параметром словарь. Передача идет по ссылке, поэтому set() может изменить его напрямую.

Для полноценного погружения в тему, считаем, что массив в PHP может использоваться только как индексированный массив.
Примеры

<?php



$map = Map\make();

$result = Map\get($map, 'key');

print_r($result); // => null



$result = Map\get($map, 'key', 'value');

print_r($result); // => value



Map\set($map, 'key2', 'value2');

$result = Map\get($map, 'key2');

print_r($result); // => value2

Подсказки

crc32 — хеш-функция
Индекс по которому будет храниться значение во внутреннем массиве вычисляется так: crc32($key) % 1000. То есть к ключу применяется хеш-функция и берется остаток от деления на тысячу. Это нужно для ограничения размера массива в разумных рамках.
При решении задачи опирайтесь на материал из теоретической части.

 */

function make(): array
{
    return [];
}

function get(array &$map, $key, $defaultValue = null)
{

}

function set(array &$map, $key, $value)
{
    $index = crc32($key) % 1000;
    $currentLength = count($map);
    if ($index > $currentLength - 1) {
        for ($i = $currentLength; $i < $index; $i++) {
            $map[]= '';
        }
        $map[] = $value;
    }
}