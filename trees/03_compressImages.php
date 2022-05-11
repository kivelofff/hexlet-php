<?php
/**
 * Реализуйте функцию compressImages(), которая принимает на вход директорию, находит внутри нее картинки и "сжимает" их. Под сжиманием понимается уменьшение свойства size в метаданных в два раза. Функция должна вернуть обновленную директорию со сжатыми картинками и всеми остальными данными, которые были внутри этой директории.

Картинками считаются все файлы заканчивающиеся на .jpg.
Примеры

<?php

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function App\tree\compressImages;

$tree = mkdir(
'my documents', [
mkfile('avatar.jpg', ['size' => 100]),
mkfile('passport.jpg', ['size' => 200]),
mkfile('family.jpg',  ['size' => 150]),
mkfile('addresses',  ['size' => 125]),
mkdir('presentations')
]
);

$newTree = compressImages($tree);
// То же самое, что и tree, но во всех картинках размер уменьшен в два раза
 */

require_once __DIR__ . "/../vendor/autoload.php";

use function Trees\mkdir;
use function Trees\mkfile;
use function Trees\getName;
use function Trees\getMeta;
use function Trees\getChildren;
use function Trees\isFile;
use function Trees\isDirectory;

function compressImages(array $tree): array
{
    $children = getChildren($tree);
    $updatedChildren = array_map(function ($item)
    {
        if (isFile($item) && str_ends_with(getName($item), '.jpg')) {
            $meta = getMeta($item);
            $size = $meta['size'] ?? 0;
            $meta['size'] = $size / 2;
            $item = mkfile(getName($item), $meta);
        }
        return $item;
    }, $children);
    return mkdir(getName($tree), $updatedChildren, getMeta($tree));
}

$tree = mkdir(
    'my documents', [
        mkfile('avatar.jpg', ['size' => 100]),
        mkfile('passport.jpg', ['size' => 200]),
        mkfile('family.jpg',  ['size' => 150]),
        mkfile('addresses',  ['size' => 125]),
        mkdir('presentations')
    ]
);

var_dump(compressImages($tree));
