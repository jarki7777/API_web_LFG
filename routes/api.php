<?php

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signUp');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
    });
});

Route::group([
    'prefix' => 'msg',
    'middleware' => 'auth:api'
], function () {
    Route::post('/{party_id}', 'App\Http\Controllers\MessagesController@store');
    Route::patch('/{party_id}', 'App\Http\Controllers\MessagesController@update');
    Route::delete('/{party_id}', 'App\Http\Controllers\MessagesController@destroy');
});