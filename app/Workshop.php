<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workshop extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'category', 'location', 'date', 'price', 
        'duration', 'instructor', 'description'
    ];

    public function workshopImages(){
        return $this->hasMany('App\WorkshopImage');
    }

    public function userImages(){
        return $this->hasOne('App\UserImage');
    }

    public function chosenWorkshops(){
        return $this->belongsToMany('App\User', 'chosen_workshops')->withPivot('workshop_status');
    }
}
