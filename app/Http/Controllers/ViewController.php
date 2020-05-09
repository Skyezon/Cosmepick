<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    private $workshopController;

    public function __construct()
    {
        $this->workshopController = new WorkshopController();
    }

    public function home (){
        if(Auth::check()) $this->workshopController->validateUpcomingWorkshop();
        return view('home');
    }

    public function join (){
        return view('join');
    }


    public function organize(){
        if($this->workshopController->hasUnverifiedWorkshopReq(Auth::user())) return redirect(route('ViewWait'));
        return view('organize');
    }

    public function wishlist(){
        return view('workshop.wishlist', ['userWhistlistWorkshops' => 
        $this->workshopController->getUserWhistlistWorkshop()]);
    }

    public function upcoming(){
        return view('workshop.upcoming');
    }

    public function myclass(){
        return view('workshop.myclass', ['userCreatedWorkshops' => 
        $this->workshopController->getUserCreatedWorkshop()]);
    }

    public function history(){
        return view('workshop.history', ['userPurchasedWorkshop' => 
        $this->workshopController->getTransactionHistory()]);
    }

    public function wait(){
        return view('wait');
    }

    public function workshopDetail(){
        return view('workshopDetail');
    }

    public function editProfile(){
        return view('editProfile');
    }

    public function adminList(){
        return view('admin_list');
    }

    

}
