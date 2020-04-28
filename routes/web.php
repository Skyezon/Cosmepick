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


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
