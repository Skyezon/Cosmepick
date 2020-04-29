<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;

class OauthController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->stateless()->user();
        return $this->directLogin($user);
    }

    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(){
        $user = Socialite::driver('facebook')->stateless()->user();
        return $this->directLogin($user);
    }

    //twitter OAuth HERE
    

    private function directLogin($user){
        $targetUser = User::findUser($user->email);
        if($targetUser == null){
            User::create([
                "email" => $user->email,
                "password" => Hash::make("DummyAneh")
            ]);
        }
        Auth::login($targetUser);
        return redirect(route('ViewHome'));
    }
}
