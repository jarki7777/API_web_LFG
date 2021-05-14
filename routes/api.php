<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PartyUserController;
use App\Http\Controllers\UserController;
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

Route::group(
    [
        'prefix' => 'auth'
    ],
    function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('signup', [AuthController::class, 'signUp']);
        Route::group(
            [
                'middleware' => 'auth:api'
            ],
            function () {
                Route::get('logout', [AuthController::class, 'logout']);
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


        Route::group(
            [
                'middleware' => 'scope:admin'
            ],
            function () {
                Route::delete('/{id}', [PartyController::class, 'destroy']);
            }
        );
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
        Route::post('/{party_id}', [MessagesController::class, 'store']);
        Route::patch('/{party_id}', [MessagesController::class, 'update']);
        Route::delete('/{party_id}', [MessagesController::class, 'destroy']);
        Route::get('/{party_id}', [MessagesController::class, 'index']);
    }
);

//Routes Games
Route::group(
    [
        'prefix' => 'game',
        'middleware' => ['auth:api']
    ],
    function () {
        Route::get('/', [GamesController::class, 'index']);
        Route::get('/{id}', [GamesController::class, 'show']);

        Route::group(
            [
                'middleware' => ['scope:admin']
            ],
            function () {
                Route::post('/', [GamesController::class, 'store']);
                Route::patch('/{id}', [GamesController::class, 'update']);
                Route::delete('/{id}', [GamesController::class, 'destroy']);
            }
        );
    }

);
