<?php

require_once "../vendor/autoload.php";

use Tightenco\Collect\Support\Collection;

$collection = Collection::times([1, 2, 3, 4], function ($number) {
    return $number * 9;
});

var_dump($collection->all());
