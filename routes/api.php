<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('account/profile')->name('profile')->group(function () {
    // Route::get('/', 'HomeController@get');
    Route::put('/update', 'Account\ProfileController@update')->name('/update');
    // Route::delete('/delete', 'HomeController@delete')->name('/delete');
});
