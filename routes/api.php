<?php

use App\Http\Controllers\PartyController;
use App\Http\Controllers\PartyUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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

//Routes Party
Route::get('/party', [PartyController::class, 'index']);
Route::post('/party', [PartyController::class, 'store']);
Route::get('/party/{game_id}', [PartyController::class, 'show']);

//Routes Party_User
Route::middleware('auth:api')->delete('/partyuser/{party_id}', [PartyUserController::class, 'destroy']);
Route::middleware('auth:api')->post('/partyuser/{party_id}', [PartyUserController::class, 'store']);

//Routes User
Route::middleware('auth:api')->put('/user/profile/{id}', [UserController::class, 'update']);
