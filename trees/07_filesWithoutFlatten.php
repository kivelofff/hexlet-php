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

function findFilesByName(array $tree, string $needle)
{
    return iterFiles($tree, $needle, [], '');
}

function iterFiles(array $tree, string $needle, array $acc, string $path)
{
    $name = getName($tree);
    if (isFile($tree)) {
        if (str_contains($name, $needle)) {
            $acc[] = $path;
        }
    } else {
        $children = getChildren($tree);
        foreach ($children as $element) {
            $folderResults = iterFiles($element, $needle, [], $path . "/" . getName($element));
            $acc = array_merge($acc, $folderResults);
        }
    }
    return $acc;
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
    mkfile('cococo', ['size' => 1000])
]);

var_dump(findFilesByName($tree, 'co'));

/**
 * Teacher solution
 * // BEGIN
function iter($node, $subStr, $ancestry, $acc)
{
$name = getName($node);
$newAncestry = ($name === '/') ? '' : "$ancestry/$name";
if (isFile($node)) {
if (str_contains($name, $subStr)) {
$acc[] = $newAncestry;
return $acc;
}
return $acc;
}

return array_reduce(
getChildren($node),
function ($newAcc, $child) use ($subStr, $newAncestry) {
return iter($child, $subStr, $newAncestry, $newAcc);
},
$acc
);
}


function findFilesByName($root, $subStr)
{
return iter($root, $subStr, '', []);
}
// END
 */