<?php
/**
 * Реализуйте функцию changeClass, которая принимает на вход файловое дерево и заменяет во всех узлах переданное имя класса на новое. Имена классов передаются через параметры.

<?php

use function App\changeClass\changeClass;

$tree = [
'name' => 'div',
'type' => 'tag-internal',
'className' => 'hexlet-community',
'children' => [
[
'name' => 'div',
'type' => 'tag-internal',
'className' => 'old-class',
'children' => [],
],
[
'name' => 'div',
'type' => 'tag-internal',
'className' => 'old-class',
'children' => [],
],
],
];

$result = changeClass($tree, 'old-class', 'new-class');
// Результат:
// [
//     'name' => 'div',
//     'type' => 'tag-internal',
//     'className' => 'hexlet-community',
//     'children' => [
//         [
//             'name' => 'div',
//             'type' => 'tag-internal',
//             'className' => 'new-class',
//             'children' => [],
//         ],
//         [
//             'name' => 'div',
//             'type' => 'tag-internal',
//             'className' => 'new-class',
//             'children' => [],
//         ],
//     ],
// ]
 */

function changeClass(array $tree, string $oldClassName, string $newClassName): array
{
    if (isset($tree['className']) && $tree['className'] === $oldClassName) {
        $tree['className'] = $newClassName;
    }
    if (isset($tree['children'])) {
        $children = $tree['children'];
        if (is_array($children)) {
            $newChildren = array_map(fn($node) => changeClass($node, $oldClassName, $newClassName), $children);
            $tree['children'] = $newChildren;
        }
    }
    return $tree;
}

$tree = [
    'name' => 'div',
    'type' => 'tag-internal',
    'className' => 'hexlet-community',
    'children' => [
        [
            'name' => 'div',
            'type' => 'tag-internal',
            'className' => 'old-class',
            'children' => [],
        ],
        [
            'name' => 'div',
            'type' => 'tag-internal',
            'className' => 'old-class',
            'children' => [],
        ],
    ],
];

var_dump(changeClass($tree, 'old-class', 'new-class'));