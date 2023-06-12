<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\LikeController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\CommentResponseController;
use Illuminate\Support\Facades\Route;

//public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{post}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'all']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/post', [PostController::class, 'store']);
    Route::put('/post/{post}', [PostController::class, 'update']);
    Route::delete('/post/{post}', [PostController::class, 'destroy']);

    Route::post('/post/{post}/comment', [CommentController::class, 'add']);

    Route::post('/post/{post}/like', [LikeController::class, 'add']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/comment/{comment}/response', [CommentResponseController::class, 'store']);
    Route::put('/comment/{comment}/response/{response}', [CommentResponseController::class, 'update']);
    Route::delete('/comment/{comment}/response/{response}', [CommentResponseController::class, 'destroy']);
});


