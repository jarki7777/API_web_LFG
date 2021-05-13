<?php

use App\Http\Controllers\PartyController;
use App\Http\Controllers\PartyUserController;
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

Route::get('/party', [PartyController::class, 'index']);
Route::post('/party', [PartyController::class, 'store']);
Route::get('/party/{name}', [PartyController::class, 'show']);


Route::middleware('auth:api')->delete('/partyuser/{party_id}', [PartyUserController::class, 'destroy']);
Route::middleware('auth:api')->post('/partyuser/{party_id}', [PartyUserController::class, 'store']);
