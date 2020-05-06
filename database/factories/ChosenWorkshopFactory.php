<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ChosenWorkshop;
use Faker\Generator as Faker;

$factory->define(ChosenWorkshop::class, function (Faker $faker) {

    $status = ['wishlist','upcoming','my_workshop'];
    return [
        'user_id' => factory(App\User::class),
        'workshop_id' => factory(App\Workshop::class),
        'workshop_status' => $status[array_rand($status)]
    ];
});
