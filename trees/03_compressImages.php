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

require_once 'tree.php';

function compressImages(array $tree): array
{
    $children = getChildren($tree);
    $updatedChildren = array_map(function ($item)
    {
        if (isFile($item)) {
            $meta = getMeta($item);
            $size
        }
    })
}
