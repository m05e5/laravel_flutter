<?php

use App\Http\Controllers\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/users/register',[AuthController::class, 'register'] );
Route::post('/users/login',[AuthController::class, 'login'] );
Route::group(['middleware' => 'auth.jwt'], function () {
Route::post('/users/logout', 'AuthController@logout');
});
Route::post('/users/logout',[AuthController::class, 'logout'] );
