<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'name', 'password', 'phone'. 'website', 'role', 'profile_pic_url'
    ];

    protected $hidden = [
        'password'
    ];

    public function chosenWorkshops(){
        return $this->belongsToMany('App\Workshop', 'chosen_workshops')->withPivot('workshop_status');
    }
}
