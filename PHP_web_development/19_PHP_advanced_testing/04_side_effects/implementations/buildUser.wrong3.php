<?php

namespace App\Implementations;

use Faker\Factory;

function buildUser()
{
    $faker = Factory::create();
    $defaultData = [
        'email' => $faker->email(),
        'firstName' => $faker->firstName(),
        'lastName' => $faker->lastName()
    ];
    return $defaultData;
}
