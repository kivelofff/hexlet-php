<?php

namespace Trees;

function mkdir(string $name, array $children = [], array $meta = []): array
{
    return [
        'name' => $name,
        'type' => 'directory',
        'meta' => $meta,
        'children' => $children
    ];
}

function mkfile(string $name, array $meta = []): array
{
    return [
        'name' => $name,
        'type' => 'file',
        'meta' => $meta
    ];
}

function isDirectory(array $tree): bool
{
    return isset($tree['type']) && $tree['type'] === 'directory';
}

function isFile(array $tree): bool
{
    return isset($tree['type']) && $tree['type'] === 'file';
}

function getChildren(array $tree): array|null
{
    if (isDirectory($tree)) {
        return $tree['children'];
    }
    return null;
}

function getName(array $tree): string|null
{
    if (isDirectory($tree) || isFile($tree)) {
        return $tree['name'];
    }
    return null;
}

function getMeta(array $tree): array|null
{
    if (isDirectory($tree) || isFile($tree)) {
        return $tree['meta'];
    }
    return null;
}

function array_flatten(array $tree, int $depth = 0): array
{
    $result = [];
    foreach ($tree as $element) {
        if (is_array($element) && $depth >= 0) {
            $depth = $depth > 1 ? $depth - 1 : -$depth;
            $result = array_merge($result, array_flatten($element, $depth));
        } else {
            $result[] = $element;
        }


    }
    return $result;
}
