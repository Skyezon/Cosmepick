<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home (){
        return view('home');
    }

    public function join (){
        return view('join');
    }


    public function organize(){
        return view('organize');
    }

    public function profile(){
        return view('profile');
    }

    public function wishlist(){
        return view('workshop.wishlist');
    }

    public function upcoming(){
        return view('workshop.upcoming');
    }

    public function myclass(){
        return view('workshop.myclass');
    }

    public function history(){
        return view('workshop.history');
    }

    public function wait(){
        return view('wait');
    }

    public function workshopDetail(){
        return view('workshopDetail');
    }

}
