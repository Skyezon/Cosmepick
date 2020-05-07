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

$factory->afterCreating(App\Workshop::class, function ($workshop, $faker) {
    
    $path = array(
        public_path('storage/workshops'),
        public_path('storage/workshops/workshop'.$workshop->id),
        public_path('storage/workshops/workshop'.$workshop->id.'/workshopImages'),
    );

    for($i = 0 ; $i < sizeof($path); $i++){
        if(!File::exists($path[$i])){
            File::makeDirectory($path[$i]);
        }
    }

    $workshop->workshopImages()->createMany(factory(App\WorkshopImage::class,5)->create([
        'id' => null,
        'workshop_id' => $workshop->id,
        'url' => 'storage/workshops/workshop'.$workshop->id.'/workshopImages/'.$faker->image($path[2],400,300,null,false)
        ])->toArray());
    // $workshop->userImages()->save(factory(App\UserImage::class)->create());
});