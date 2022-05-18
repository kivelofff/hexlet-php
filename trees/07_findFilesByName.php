<?php
/**
 * Реализуйте функцию findFilesByName(), которая принимает на вход файловое дерево и подстроку, а возвращает список файлов, имена которых содержат эту подстроку.
Примеры

<?php

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function App\findFilesByName\findFilesByName;

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

findFilesByName($tree, 'co');

// ['/etc/nginx/nginx.conf', '/etc/consul/config.json']

Примечания

Обратите внимание на то, что возвращается не просто имя файла, а полный путь до файла, начиная от корня.
 */

require_once __DIR__ . "/../vendor/autoload.php";

use function Trees\isFile;
use function Trees\isDirectory;
use function Trees\mkdir;
use function Trees\mkfile;
use function Trees\getMeta;
use function Trees\getChildren;
use function Trees\getName;
use function Trees\array_flatten;

function findFilesByName(array $tree, string $needle)
{
    return iterFiles($tree, $needle, '', []);

}

function iterFiles(array $tree, string $needle, string $path, array $acc)
{
    if (isFile($tree)) {
        $name = getName($tree);
        if (str_contains($name, $needle)) {
            $acc[] = $path . "$name";
        }
    } else {
        $children = getChildren($tree);
        $newPath = $path . getName($tree) . "/";
        $subFolderResult = array_map(fn($node) => iterFiles($node, $needle, $newPath, $acc), $children);
        $acc = array_merge($acc, $subFolderResult);
    }
    return array_flatten($acc);
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

var_dump(findFilesByName($tree, 'co'));