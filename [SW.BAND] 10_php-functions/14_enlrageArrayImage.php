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
    $zipImage = [];

    return $zipImage;
}

var_dump(Collection\zip([1,2,3,4,5], [1,2,3,4,5]));