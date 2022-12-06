<?php

namespace App\HTML;

// BEGIN (write your solution here)
$tags = [
    ['name' => 'img', 'src' => 'hexlet.io/assets/logo.png'],
    ['name' => 'div'],
    ['name' => 'link', 'href' => 'hexlet.io/assets/style.css'],
    ['name' => 'h1']
];

function getLinks(array $tags): array
{
    $linkByTag = [
        'img' => 'src',
        'link' => 'href'
    ];

    $result = [];
    foreach ($tags as $tag) {
        if (array_key_exists($tag['name'], $linkByTag)) {
            $source = $linkByTag[$tag['name']];
            $result[] = $tag[$source];
        }
    }
    return $result;
}

var_dump(getLinks($tags));
// END

