<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostWithTagController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserWithTagController;
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
Route::post('/users/data',[AuthController::class, 'show'] );
Route::group(['middleware' => 'auth.jwt'], function () {

Route::post('/users/logout', 'AuthController@logout');


});
Route::post('/users/logout',[AuthController::class, 'logout'] );

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('getMyData', [AuthController::class, 'getMyData']);

   //==========================  Posts  ===============================================
Route::get('posts', [PostController::class, 'index']);
Route::post('posts/create', [PostController::class, 'store']);
Route::get('posts/me', [PostController::class, 'showMyPosts']);
Route::put('posts/update/{id}', [PostController::class, 'update']);
Route::delete('posts/delete/{id}', [PostController::class, 'destroy']);

//==========================  tags  ===============================================
Route::get('tags', [TagController::class, 'index']);
Route::post('tags/create', [TagController::class, 'store']);
Route::get('tags/{id}', [TagController::class, 'show']);
Route::put('tags/update/{id}', [TagController::class, 'update']);
Route::delete('tags/delete/{id}', [TagController::class, 'destroy']);

//==========================  comments  ===============================================
Route::get('comments', [CommentController::class, 'index']);
Route::post('comments/create', [CommentController::class, 'store']);
Route::get('comments/{id}', [CommentController::class, 'show']);
Route::get('comments/onPost/{id}', [CommentController::class, 'commentsOnPost']);
Route::put('comments/update/{id}', [CommentController::class, 'update']);
Route::delete('comments/delete/{id}', [CommentController::class, 'destroy']);

//==========================  UserWithTag  ===============================================
Route::get('UserWithTag', [UserWithTagController::class, 'index']);
Route::post('UserWithTag/create', [UserWithTagController::class, 'store']);
Route::get('UserWithTag/me', [UserWithTagController::class, 'userWithTags']);
Route::delete('UserWithTag/delete/{id}', [UserWithTagController::class, 'destroy']);

//==========================  PostWithTag  ===============================================
Route::get('PostWithTag', [PostWithTagController::class, 'index']);
Route::post('PostWithTag/create', [PostWithTagController::class, 'store']);
Route::get('PostWithTag/show/{id}', [PostWithTagController::class, 'postWithTags']);//here the id is the id of the post
Route::delete('PostWithTag/delete/{id}', [PostWithTagController::class, 'destroy']);
});



