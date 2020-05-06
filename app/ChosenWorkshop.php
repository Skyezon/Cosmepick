<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChosenWorkshop extends Model
{
    protected $fillable = [
        'user_id', 'workshop_id', 'workshop_status'
    ];
}
