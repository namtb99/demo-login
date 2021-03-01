<?php

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


Route::prefix('home')->group(function () {
    Route::get('/', 'HomeController@get')->name('home');
    Route::put('/update', 'HomeController@update')->name('home/update');
    Route::delete('/delete', 'HomeController@delete')->name('home/delete');
});
