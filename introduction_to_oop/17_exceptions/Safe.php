<?php

namespace Oop\Seventeen\JsonDecode;

use function json_decode as decode;

function json_decode($json, $assoc = false)
{
    // BEGIN (write your solution here)
    $decodedJson = decode($json, $assoc);
    $jsonLastError = json_last_error();
    if ($jsonLastError !== JSON_ERROR_NONE) {
        throw new \Exception("Error. code: " . $jsonLastError);
    } else {
        return $decodedJson;
    }
    // END
}

var_dump(json_decode('{ "key": "value" }', true));
var_dump(json_decode('{ key: "value" }', true));