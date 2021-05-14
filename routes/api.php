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

Route::group(
    [
        'prefix' => 'auth'
    ],
    function () {
        Route::post('login', 'App\Http\Controllers\AuthController@login');
        Route::post('signup', 'App\Http\Controllers\AuthController@signUp');
        Route::group(
            [
                'middleware' => 'auth:api'
            ],
            function () {
                Route::get('logout', 'App\Http\Controllers\AuthController@logout');
            }
        );
    }
);


//Routes Party
Route::group(
    [
        'prefix' => 'party',
        'middleware' => 'auth:api'
    ],
    function () {
        Route::get('/', [PartyController::class, 'index']);
        Route::post('/', [PartyController::class, 'store']);
        Route::get('/{game_id}', [PartyController::class, 'show']);
        Route::delete('/party/{id}', [PartyController::class, 'destroy']);        
    }
);

//Routes Party_User
Route::group(
    [
        'prefix' => 'partyuser',
        'middleware' => 'auth:api'
    ],
    function () {
        Route::delete('/{party_id}', [PartyUserController::class, 'destroy']);
        Route::post('/{party_id}', [PartyUserController::class, 'store']);
    }
);

//Routes User
Route::middleware('auth:api')->put('/user/profile/{id}', [UserController::class, 'update']);

//Routes Messages
Route::group(
    [
        'prefix' => 'msg',
        'middleware' => 'auth:api'
    ],
    function () {
        Route::post('/{party_id}', 'App\Http\Controllers\MessagesController@store');
        Route::patch('/{party_id}', 'App\Http\Controllers\MessagesController@update');
        Route::delete('/{party_id}', 'App\Http\Controllers\MessagesController@destroy');
        Route::get('/{party_id}', 'App\Http\Controllers\MessagesController@index');
    }
);

//Routes Games
Route::group(
    [
        'prefix' => 'game',
        'middleware' => ['auth:api', 'scope:admin']
    ],
    function () {
        Route::get('/', 'App\Http\Controllers\GamesController@index');
        Route::post('/', 'App\Http\Controllers\GamesController@store');
        Route::get('/{id}', 'App\Http\Controllers\GamesController@show');
        Route::patch('/{id}', 'App\Http\Controllers\GamesController@update');
        Route::delete('/{id}', 'App\Http\Controllers\GamesController@destroy');
    }
);
