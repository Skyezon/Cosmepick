<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    protected $fillable = [
        'workshop_id', 'url_only_ktp', 'url_with_ktp'
    ];

    public function workshop(){
        return $this->belongsTo('App\Workshop');
    }
}
