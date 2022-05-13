<?php
/**
 * Реализуйте функцию getHiddenFilesCount(), которая считает количество скрытых файлов в директории и всех поддиректориях. Скрытым файлом в Linux системах считается файл, название которого начинается с точки.
Примеры

<?php



use function Php\Immutable\Fs\Trees\trees\mkdir;

use function Php\Immutable\Fs\Trees\trees\mkfile;

use function App\getHiddenFilesCount\getHiddenFilesCount;



$tree = mkdir('/', [

mkdir('etc', [

mkdir('apache', []),

mkdir('nginx', [

mkfile('.nginx.conf', ['size' => 800]),

]),

mkdir('.consul', [

mkfile('.config.json', ['size' => 1200]),

mkfile('data', ['size' => 8200]),

mkfile('raft', ['size' => 80]),

]),

]),

mkfile('.hosts', ['size' => 3500]),

mkfile('resolve', ['size' => 1000]),

]);





getHiddenFilesCount($tree); // 3
 */

require_once __DIR__ . "/../vendor/autoload.php";

use function Trees\mkdir;
use function Trees\mkfile;
use function Trees\isFile;
use function Trees\isDirectory;
use function Trees\getChildren;
use function Trees\getMeta;
use function Trees\getName;

function getHiddenFilesCount(array $tree): int
{
    if(isFile($tree)) {

        return str_starts_with(getName($tree), ".") ? 1 : 0;
    }

    $children = getChildren($tree);
    $hiddenCount = array_map(fn($child) => getHiddenFilesCount($child), $children);
    return array_sum($hiddenCount);
}

$tree = mkdir('/', [

    mkdir('etc', [

        mkdir('apache', []),

        mkdir('nginx', [

            mkfile('.nginx.conf', ['size' => 800]),

        ]),

        mkdir('.consul', [

            mkfile('.config.json', ['size' => 1200]),

            mkfile('data', ['size' => 8200]),

            mkfile('raft', ['size' => 80]),

        ]),

    ]),

    mkfile('.hosts', ['size' => 3500]),

    mkfile('resolve', ['size' => 1000]),

]);





var_dump(getHiddenFilesCount($tree)); // 3