<?php

namespace App\Implementations;

function getFilesCount($path)
{
    $iterator = new \FilesystemIterator($path);
    return iterator_count($iterator) + 1;
}
