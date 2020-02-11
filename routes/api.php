<?php

use Illuminate\Http\Request;

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

Route::get('/user/self', function (Request $request) {
        if (Auth::guard('api')->user() === null) {
            return response('User not logged in', 422);
        }
        
        return response(Auth::guard('api')->user());
    });

Route::group(['middleware' => ['auth:api']], function() {
    Route::resource('order', 'OrderController');
});
Route::post('user/login', 'UserController@login');