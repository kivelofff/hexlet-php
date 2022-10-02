<?php

namespace App\Implementations;

function mkdirs($path)
{
    return mkdir(explode("/", $path)[0], 0700);
}

