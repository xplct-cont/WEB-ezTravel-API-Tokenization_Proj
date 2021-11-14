<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\PostTravellersController;
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

//UsersController
Route::post('login', [UsersController::class, 'login']);
Route::post('register', [UsersController::class, 'register']);
Route::post('reset-Password', [UsersController::class, 'resetPassword']);
Route::post('booking', [UsersController::class, 'booking']);


//PostTravellersController   
Route::get('get-all-posts', [PostTravellersController::class, 'getAllPosts']);
Route::get('get-passenger', [PostTravellersController::class, 'getPassenger']);
Route::get('search-flightno', [PostTravellersController::class, 'searchFlightNo']);
Route::get('search-travelclass', [PostTravellersController::class, 'searchTravelClass']);
