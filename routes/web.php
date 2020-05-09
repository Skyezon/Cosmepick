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
Route::get('join','WorkshopController@index')->name('ViewJoin');
Route::post('join/search?');
Route::middleware(['auth'])->group(function() {
    Route::get('organize','ViewController@organize')->name('ViewOrganize');
    Route::post('organize', 'WorkshopController@sendVerifyWorkshopReq')->name('reqWorkshopVerification');
    Route::get('profile','UserController@show')->name('ViewProfile');
    Route::get('wait','ViewController@wait')->name('ViewWait');
    Route::get('profile/edit','UserController@showEdit')->name('ViewEditProfile');
    Route::patch('profile/edit/baru','UserController@edit')->name('UpdateEditProfile');
});

Route::prefix('admin')->group(function (){
    Route::middleware(['auth.admin'])->group(function (){
        Route::get('class-list','WorkshopController@showNotVerified')->name('viewAdminList');
        Route::post('class-list/{id}','WorkshopController@verifyWorkshop')->name('verifyWorkshop');
        Route::delete('class-list/{id}','WorkshopController@noVerifyWorkshop')->name('noVerifyWorkshop');
        Route::get('class-list/{id}','WorkshopController@adminDetail')->name('ViewAdminDetail');
    });
    
});



Route::prefix('workshop')->group(function (){
    Route::get('details/{id}','WorkshopController@show')->name('ViewWorkshop');

    Route::middleware(['auth'])->group((function (){
        Route::get('register/{relationType}/{workshopId}/attach','ChosenWorkshopController@WorkshopAttachUser')->name('regisWorkshop');
        Route::get('register/{relationType}/{workshopId}/detach','ChosenWorkshopController@WorkshopDetachUser')->name('unRegisWorkshop');

        Route::get('wishlist','ViewController@wishlist')->name('ViewWishlist');
        Route::get('wishlist/{id}', 'WorkshopController@removeWhistlistWorkshop')->name('removeFromWhistlist');

        Route::get('upcoming','ViewController@upcoming')->name('ViewUpcoming');
        
        Route::get('history','ViewController@history')->name('ViewHistory');

        Route::get('myclass','ViewController@myclass')->name('ViewMyclass');
        Route::patch('myclass/edit/workshop','WorkshopController@editPost')->name('editClass');
        Route::get('myclass/edit','WorkshopController@editShow')->name('showEditClass');
        Route::delete('myclass/{id}/delete', 'WorkshopController@softDeleteWorkshop')->name('DeleteUserCreatedWorkshop');
    }));

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