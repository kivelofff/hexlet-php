<?php
/**
 * Реализуйте функцию genDiff, которая сравнивает два ассоциативных массива и возвращает результат сравнения в виде ассоциативного массива. Ключами результирующего массива будут все ключи из двух входящих массивов, а значением строка с описанием отличий => added, deleted, changed или unchanged.

Возможные значения:

added — ключ отсутствовал в первом массиве, но был добавлен во второй
deleted — ключ был в первом массиве, но отсутствует во втором
changed — ключ присутствовал и в первом и во втором массиве, но значения отличаются
unchanged — ключ присутствовал и в первом и во втором массиве с одинаковыми значениями

<?php



use function App\Solution\genDiff;



$result = genDiff(

['one' => 'eon', 'two' => 'two', 'four' => true],

['two' => 'own', 'zero' => 4, 'four' => true]

);

// [

//   'one' => 'deleted',

//   'two' => 'changed',

//   'four' => 'unchanged',

//   'zero' => 'added',

// ]

Подсказки

Фрагмент этой задачи разбирается в докладе "Ментальное программирование"

 */

function genDiff(array $oldArray, array $newArray): array
{
    $merged = array_merge($oldArray, $newArray);
    $mergedKeys = array_keys($merged);
    $diff = [];
    foreach ($mergedKeys as $key) {
        $isInOld = array_key_exists($key, $oldArray);
        $isInNew = array_key_exists($key, $newArray);
        $status = 'unchanged';
        if ($isInNew && !$isInOld) {
            $status = 'added';
        } elseif ($isInOld && !$isInNew) {
            $status = 'deleted';
        } elseif ($oldArray[$key] !== $newArray[$key]) {
            $status = 'changed';
        }
        $diff[$key] = $status;
    }
    return $diff;
}

$result = genDiff(

    ['one' => 'eon', 'two' => 'two', 'four' => true],

    ['two' => 'own', 'zero' => 4, 'four' => true]

);

var_dump($result);