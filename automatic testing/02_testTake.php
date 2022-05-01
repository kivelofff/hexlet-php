<?php
/**
 * Напишите тесты для функции take($items, $n), которая возвращает первые n элементов из массива. По умолчанию n равен 1.

take([], 2); // []

take([1, 2, 3]); // [1]

take([1, 2, 3], 2); // [1, 2]

take([4, 3], 9); // [4, 3]

Подсказки

webmozart/assert

 */

require_once "../vendor/autoload.php";

use Webmozart\Assert\Assert;

use function App\Implementations\take;

$functionName = 'right';

require_once __DIR__ . "/implementations/take.{$functionName}.php";

Assert::eq(take([], 2), []);
Assert::eq(take([1, 2, 3]), [1]);
Assert::eq(take([1, 2, 3], 2), [1, 2]);
Assert::eq(take([1, 2, 3], 10), [1, 2, 3]);