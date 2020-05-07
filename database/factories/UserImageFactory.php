<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserImage;
use Faker\Generator as Faker;

$factory->define(UserImage::class, function (Faker $faker) {

    return [
        'url_only_ktp' => $faker->image(public_path('storage/workshops/workshop'.$this->workshop.'/user{id}/ktp'),400,300),
        'url_with_ktp' => $faker->image(public_path('storage/workshops/workshop{id}/user{id}/with_ktp'),400,300) 
    ];
});
