<?php

namespace App\Http\Controllers;

use App\ChosenWorkshop;
use Illuminate\Http\Request;
use App\Workshop;

class SearchFilterController extends Controller
{

    public function searchWorkshops(Request $request){
        $workshops = Workshop::where('name', 'like', '%'.$request->search.'%');
        // dd($workshops->get());
        $workshops = ($request->user() != null) ? $this->getUserDisplayedWorkshop($workshops, $request->user()) : 
        $this->getGuestDisplayedWorkshop($workshops);
        return view('join', compact('workshops'));
    }

    private function getUserDisplayedWorkshop($workshops, $user){
        $notDisplayedWorkshopId = $user->chosenWorkshops()
        ->where(function($query){
            $query->where('workshop_status', 'my_workshop')
            ->orWhere('workshop_status', 'upcoming');
        })->distinct()->pluck('workshop_id');
        return $workshops->whereNotIn('id', $notDisplayedWorkshopId)->where('is_verified', 1)->paginate(5);
    }

    private function getGuestDisplayedWorkshop($workshops){
        $notDisplayedWorkshopId = ChosenWorkshop::where('workshop_status', 'history')
        ->distinct()->pluck('workshop_id');

        return $workshops->whereNotIn('id', $notDisplayedWorkshopId)->where('is_verified', 1);
    }

}
