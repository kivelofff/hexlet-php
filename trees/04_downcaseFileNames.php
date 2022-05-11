<?php
/**
 * Реализуйте функцию downcaseFileNames(), которая принимает на вход директорию (объект-дерево) и приводит имена всех файлов в этой и во всех вложенных директориях к нижнему регистру. Результат в виде обработанной директории возвращается наружу. Исходное дерево не изменяется.

Примеры
<?php

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function App\downcaseFileNames\downcaseFileNames;

$tree = mkdir('/', [
mkdir('eTc', [
mkdir('NgiNx'),
mkdir('CONSUL', [
mkfile('config.json'),
]),
]),
mkfile('hOsts'),
]);

downcaseFileNames($tree);
// [
//      'name' => '/',
//      'type' => 'directory',
//      'meta' => [],
//      'children' => [
//           [
//                'name' => 'eTc',
//                'type' => 'directory',
//                'meta' => [],
//                'children' => [
//                     [
//                          'name' => 'NgiNx',
//                          'type' => 'directory',
//                          'meta' => [],
//                          'children' => [],
//                      ],
//                      [
//                          'name' => 'CONSUL',
//                          'type' => 'directory',
//                          'meta' => [],
//                          'children' => [
//                               [
//                                    'name' => 'config.json',
//                                    'type' => 'file',
//                                    'meta' => [],
//                               ]
//                          ],
//                      ],
//                 ],
//           ],
//           [
//                'name' => 'hosts',
//                'type' => 'file',
//                'meta' => [],
//           ],
//      ],
// ]
Подсказки
Для проверки, является ли узел файлом, используйте функцию isFile(). Эта функция принимает узел и возвращает результат проверки (true или false):

<?php

use function Php\Immutable\Fs\Trees\trees\isFile;

echo isFile(file);
// => true

echo isFile(directory);
// => false
 */

require_once __DIR__ . "/../vendor/autoload.php";

use function Trees\mkdir;
use function Trees\mkfile;
use function Trees\isDirectory;
use function Trees\isFile;
use function Trees\getChildren;
use function Trees\getMeta;
use function Trees\getName;

function downcaseFileNames(array $tree): array
{
    $oldName = getName($tree);
    $meta = getMeta($tree);
    $newName = strtolower($oldName);
    if (isFile($tree)) {
        $tree = mkfile($newName, $meta);
    } else {
        $newChildren = array_map(fn($item) => downcaseFileNames($item), getChildren($tree));
        $tree = mkdir($oldName, $newChildren, $meta);
    }
    return $tree;
}

$tree = mkdir('/', [
    mkdir('eTc', [
        mkdir('NgiNx'),
        mkdir('CONSUL', [
            mkfile('config.json'),
        ]),
    ]),
    mkfile('hOsts'),
]);

var_dump(downcaseFileNames($tree));
