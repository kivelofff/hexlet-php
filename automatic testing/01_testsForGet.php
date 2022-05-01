<?php
/**
 * Напишите тесты для функции get($collection, $key, $defaultValue). Эта функция извлекает значение из ассоциативного массива при условии, что ключ существует. В ином случае возвращается defaultValue.

<?php



get(['hello' => 'world'], 'hello'); // world

get(['hello' => 'world'], 'hello', 'kitty'); // world

get([], 'hello', 'kitty'); // kitty

Тесты должны быть построены по такому же принципу, как это описывалось в теории урока: проверка через if и исключение в случае провала теста.

Для хорошего тестирования этой функции понадобится как минимум три теста:

Проверка, что функция возвращает нужное значение по существующему ключу (прямой тест на работоспособность)
Проверка на то, что возвращается значение по умолчанию, если ключа нет
Проверка на то, что возвращается значение по существующему ключу, даже если передано значение по умолчанию (пограничный случай)

 */

namespace App\Tests;

use function App\Implementations\get;

$functionName = 'wrong3';

require_once __DIR__ . "/implementations/get.{$functionName}.php";

$testArray = [
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3'
];


$key = 'key1';
if (get($testArray, $key) !== $testArray[$key]) {
    throw new \Exception("function " . __FUNCTION__ . " got error - wrong value extracted by the existing key $key");
}
$nonexistentKey = 'key735';
$defaultValue = 'default value';
if (get($testArray, $nonexistentKey, $defaultValue) !== $defaultValue) {
    throw new \Exception("function " . __FUNCTION__ . " got error - extracted value should be $defaultValue");
}
if (get($testArray, $key, $defaultValue) !== $testArray[$key]) {
    throw new \Exception("function " . __FUNCTION__ . " got error - wrong value extracted by the existing key $key with $defaultValue");
}
