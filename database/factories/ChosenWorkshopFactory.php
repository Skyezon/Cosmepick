<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ChosenWorkshop;
use App\Workshop;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\File;

$factory->define(ChosenWorkshop::class, function (Faker $faker) {

    $status = ['wishlist','upcoming','my_workshop'];
    return [
        'user_id' => factory(App\User::class)->create(),
        'workshop_id' => factory(App\Workshop::class)->create(),
        'workshop_status' => $status[array_rand($status)]
        // 'workshop_status' => 'my_workshop'
    ];
});

$factory->afterCreating(App\ChosenWorkshop::class, function ($chosenWorkshop, $faker) {
    $faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));
    $workshop = Workshop::find($chosenWorkshop->workshop_id);
    $userid = $chosenWorkshop->user_id;

    $path = array(
        storage_path('app/public/workshops'),
        storage_path('app/public/workshops/workshop'.$workshop->id),
        storage_path('app/public/workshops/workshop'.$workshop->id.'/workshopImages'),
        storage_path('app/public/workshops/workshop'.$workshop->id.'/user'.$userid),
        storage_path('app/public/workshops/workshop'.$workshop->id.'/user'.$userid.'/ktp'),
        storage_path('app/public/workshops/workshop'.$workshop->id.'/user'.$userid.'/with_ktp'),
    );

    for($i = 0 ; $i < sizeof($path); $i++){
        if(!File::exists($path[$i])){
            File::makeDirectory($path[$i]);
        }
    }

    $workshop->workshopImages()->save(factory(App\WorkshopImage::class)->create([
        'workshop_id' => $workshop->id,
        'url' => '/storage/workshops/workshop'.$workshop->id.'/workshopImages/'.$faker->picsum($path[2],400,300,null,false)
    ]));
    $workshop->userImages()->save(factory(App\UserImage::class)->create([
        'workshop_id' => $workshop->id,
        'url_only_ktp' => '/storage/workshops/workshop'.$workshop->id.'/workshopImages/'.$faker->picsum(public_path('storage/workshops/workshop'.$workshop->id.'/user'.$userid.'/ktp'),400,300,null,false),
        'url_with_ktp' => '/storage/workshops/workshop'.$workshop->id.'/workshopImages/'.$faker->picsum(public_path('storage/workshops/workshop'.$workshop->id.'/user'.$userid.'/with_ktp'),400,300,null,false) 
    ]));
});