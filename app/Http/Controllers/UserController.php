<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();        
        return view('profile',compact('user'));
    }

    public function showEdit(){
        $user = Auth::user();

        return view ('editProfile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $requestvalidated = $request->validate([
            'newName' => 'required',
            'newEmail' => 'required',
            'newPassword' =>'required | min:8',
            'newPhone' => 'required',
            'newWebsite' => 'required',
        ]);

        $user = Auth::user();
        if($request->file('newProfilePic') == null){
            $path = $user->profile_pic_url;
        }else{
            $path = $request->file('newProfilePic')->store('users/'.'user'.$user->id);
        }
        $user->update([
            'name' => $request->newName,    
            'email' => $request->newEmail,
            'password' => Hash::make($request->newPassword),
           
            'profile_pic_url' => $path
        ]);
        $user->phone = $request->newPhone;
        $user->website= $request->newWebsite;
        

        $user->save();
        return redirect(route('ViewProfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

  
}