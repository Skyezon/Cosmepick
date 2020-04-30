<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ViewController@home')->name('ViewHome');
Route::get('join','ViewController@join')->name('ViewJoin');
Route::get('organize','ViewController@organize')->name('ViewOrganize');
Route::get('profile','ViewController@profile')->name('ViewProfile');
Route::get('wait','ViewController@wait')->name('ViewWait');

Route::prefix('workshop')->group(function (){
    Route::get('wishlist','ViewController@wishlist')->name('ViewWishlist');
    Route::get('upcoming','ViewController@upcoming')->name('ViewUpcoming');
    Route::get('history','ViewController@history')->name('ViewHistory');
    Route::get('myclass','ViewController@myclass')->name('ViewMyclass');
    Route::get('detail','ViewController@workshopDetail')->name('ViewWorkshop');
});

Route::prefix('auth')->group(function (){
    Route::get('google', 'Auth\OauthController@redirectToGoogle')->name('RedirectToGoogle');
    Route::get('google/callback', 'Auth\OauthController@handleGoogleCallback')->name('GoogleCallback');

    Route::get('facebook', 'Auth\OauthController@redirectToFacebook')->name('RedirectToFacebook');
    Route::get('facebook/callback', 'Auth\OauthController@handleFacebookCallback')->name('FacebookCallback');

    Route::get('twitter', 'Auth\OauthController@redirectToTwitter')->name('RedirectToTwitter');
    Route::get('twitter/callback','Auth\OauthController@handleTwitterCallback')->name('TwitterCallback');
});

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

