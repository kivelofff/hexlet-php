<?php

namespace App\Implementations;

use Faker\Factory;

function buildUser($data = [])
{
    $faker = Factory::create();
    $faker->seed(123);
    $defaultData = [
        'email' => $faker->email(),
        'firstName' => $faker->firstName(),
        'lastName' => $faker->lastName()
    ];
    return array_merge($defaultData, $data);
}
