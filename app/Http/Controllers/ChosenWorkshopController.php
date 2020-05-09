<?php

namespace App\Http\Controllers;

use App\User;
use App\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChosenWorkshopController extends Controller
{
    public function WorkshopAttachUser($workshopId, $relationType){
        $user = Auth::user();
        $user->chosenWorkshops()->attach($relationType,['workshop_status' => $workshopId]);
        return back()->with('message','Successfully added class to '.$workshopId.' list');
    }

    public function WorkshopDetachUser($workshopId, $relationType){
        $user = Auth::user();
        $user->chosenWorkshops()->detach($relationType,['workshop_status' => $workshopId]);
        return back()->with('message','Successfully remove class to '.$workshopId.' list');
    }


}
