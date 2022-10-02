<?php

namespace App\Implementations;

use Faker\Factory;

function buildUser($data = [])
{
    $faker = Factory::create();
    $defaultData = [
        'firstName' => $faker->firstName()
    ];
    return array_merge($defaultData, $data);
}
