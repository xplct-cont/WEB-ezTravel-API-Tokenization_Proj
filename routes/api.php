<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TravellersController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [TravellersController::class, 'login']);
Route::post('register', [TravellersController::class, 'register']);
Route::post('reset-Password', [TravellersController::class, 'resetPassword']);
Route::post('booking', [TravellersController::class, 'booking']);