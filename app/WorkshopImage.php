<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkshopImage extends Model
{
    protected $fillable = [
        'workshop_id', 'url', 'index'
    ];

    public function workshop(){
        return $this->belongsTo('App\Workshop');
    }
}
