<?php
/**
 * Реализуйте функцию du(), которая принимает на вход директорию. Функция возвращает список узлов (директорий и файлов), вложенных в указанную директорию на один уровень, и место, которое они занимают. Размер файла задается в метаданных. Размер директории складывается из сумм всех размеров файлов, находящихся внутри во всех подпапках. Сами папки размера не имеют.
Пример

<?php



use function Php\Immutable\Fs\Trees\trees\mkdir;

use function Php\Immutable\Fs\Trees\trees\mkfile;

use function App\du\du;



$tree = mkdir('/', [

mkdir('etc', [

mkdir('apache'),

mkdir('nginx', [

mkfile('nginx.conf', ['size' => 800]),

]),

mkdir('consul', [

mkfile('config.json', ['size' => 1200]),

mkfile('data', ['size' => 8200]),

mkfile('raft', ['size' => 80]),

]),

]),

mkfile('hosts', ['size' => 3500]),

mkfile('resolve', ['size' => 1000]),

]);



du($tree);

// [

//     ['etc', 10280],

//     ['hosts', 3500],

//     ['resolve', 1000],

// ]

Примечания

Обратите внимание на структуру результирующего массива. Каждый элемент — массив с двумя значениями: именем директории и размером файлов внутри.
Результат отсортирован по размеру в обратном порядке. То есть сверху самые тяжёлые, внизу самые лёгкие.

Подсказки

usort

 */

require_once __DIR__ . "/../vendor/autoload.php";

use function Trees\mkfile;
use function Trees\mkdir;
use function Trees\isFile;
use function Trees\isDirectory;
use function Trees\getName;
use function Trees\getChildren;
use function Trees\getMeta;


function du(array $directory): array
{
    $children = getChildren($directory);
    $files = array_filter($children, fn($node) => isFile($node));
    $folders = array_filter($children, fn($node) => isDirectory($node));
    $filesSize = array_reduce($files, fn($carry, $node) => $carry += getMeta($node)['size'], 0);
    $foldersSize = array_map(fn($folder) => du($folder), $folders);
    $name = getName($directory);
    return array_merge([$name => $filesSize], $foldersSize);
}

$tree = mkdir('/', [

    mkdir('etc', [

        mkdir('apache'),

        mkdir('nginx', [

            mkfile('nginx.conf', ['size' => 800]),

        ]),

        mkdir('consul', [

            mkfile('config.json', ['size' => 1200]),

            mkfile('data', ['size' => 8200]),

            mkfile('raft', ['size' => 80]),

        ]),

    ]),

    mkfile('hosts', ['size' => 3500]),

    mkfile('resolve', ['size' => 1000]),

]);



var_dump(du($tree));
