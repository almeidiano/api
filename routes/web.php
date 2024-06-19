<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/web-api/auth/session/v2/verifyOperatorPlayerSession', [GameController::class, 'verifySession']);
Route::post('/web-api/auth/session/v2/verifySession', [GameController::class, 'verifySession']);
Route::post('/web-api/game-proxy/v2/GameName/Get', [GameController::class, 'getGameName']);
Route::post('/game-api/{game}/v2/GameInfo/Get', [GameController::class, 'getGameInfo']);
Route::post('/game-api/{game}/v2/Spin', [GameController::class, 'spin']);
