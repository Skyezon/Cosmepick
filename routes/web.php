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
Route::get('/join','ViewController@join')->name('ViewJoin');
Route::get('/organize','ViewController@organize')->name('ViewOrganize');
Route::get('/profile','ViewController@profile')->name('ViewProfile');

Route::get('/workshop/wishlist','ViewController@wishlist')->name('ViewWishlist');
Route::get('/workshop/upcoming','ViewController@upcoming')->name('ViewUpcoming');
Route::get('/workshop/history','ViewController@history')->name('ViewHistory');
Route::get('/workshop/myclass','ViewController@myclass')->name('ViewMyclass');

Route::get('/login/google', 'Auth\OauthController@redirectToGoogle')->name('RedirectToGoogle');
Route::get('/login/google/callback', 'Auth\OauthController@handleGoogleCallback')->name('GoogleCallback');

Route::get('/login/facebook', 'Auth\OauthController@redirectToFacebook')->name('RedirectToFacebook');
Route::get('/login/facebook/callback', 'Auth\OauthController@handleFacebookCallback')->name('FacebookCallback');

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

