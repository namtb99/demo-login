<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::prefix('account')->middleware('auth')->name('account')->group(function () {
    Route::get('/', 'HomeController@get');
    Route::put('/update', 'HomeController@update')->name('/update');
    Route::delete('/delete', 'HomeController@delete')->name('/delete');

    
    Route::get('/profile/{id}', 'Account\ProfileController@get');
});
