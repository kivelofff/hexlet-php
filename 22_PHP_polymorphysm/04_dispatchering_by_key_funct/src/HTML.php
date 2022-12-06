<?php

namespace App\HTML;

require_once __DIR__ . "/../../../vendor/autoload.php";


// BEGIN (write your solution here)
$tag = ['name' => 'hr', 'class' => 'px-3', 'id' => 'myid', 'tagType' => 'single'];// <hr class="px-3" id="myid">
$tag2 = ['name' => 'div', 'tagType' => 'pair', 'body' => 'text2', 'id' => 'wow'];// <div id="wow">text2</div>

function stringify(array $tag): string
{
    $string = "<{$tag['name']}";
    $mapping = [
        'pair' => fn($string) => $string . "</{$tag['name']}>",
        'hasBody' => fn($string) => $string . $tag['body'],
        'parameter' => fn($string, $paramName) => $string . " {$paramName}=\"{$tag[$paramName]}\"",
        'close' => fn($string) => $string . ">"
    ];
    array_map(function (), $tag)
}
// END
