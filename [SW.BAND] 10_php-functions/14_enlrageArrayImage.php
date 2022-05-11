<?php
/**
 * Реализуйте функцию enlargeArrayImage, которая принимает изображение в виде двумерного массива и увеличивает его в два раза.
Примеры

<?php



$image = [

['*','*','*','*'],

['*',' ',' ','*'],

['*',' ',' ','*'],

['*','*','*','*']

];

// ****

// *  *

// *  *

// ****



enlargeArrayImage($image);

// ********

// ********

// **    **

// **    **

// **    **

// **    **

// ********

// ********

Подсказки

используйте функции из библиотеки Funct

 */
require_once "../vendor/autoload.php";

use Funct\Collection;


function enlargeArrayImage(array $imageArray): array
{
    $duplicate = fn($e) => [$e, $e];
    $horEnlarged = array_map(fn($e) => Collection\flatten(array_map($duplicate, $e)), $imageArray);
    return Collection\flatten(array_map($duplicate, $horEnlarged));
}


$image = [

    ['*','*','*','*'],

    ['*',' ',' ','*'],

    ['*',' ',' ','*'],

    ['*','*','*','*']

];

// ****

// *  *

// *  *

// ****


var_dump(enlargeArrayImage($image));

// ********

// ********

// **    **

// **    **

// **    **

// **    **

// ********

// ********

