<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Workshop;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\File;

$factory->define(Workshop::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'category' => $faker->safeColorName,
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'location' => $faker->jobTitle,
        'price' => rand(0,999999),
        'duration' => rand(1,8),
        'instructor' => $faker->name,
        'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'is_verified' => rand(1,2)

    ];
});

