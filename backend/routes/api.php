<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\LikeController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\CommentResponseController;
use App\Http\Middleware\CheckCommentOwner;
use App\Http\Middleware\CheckCommentResponseOwner;
use App\Http\Middleware\CheckLikeOwner;
use App\Http\Middleware\CheckPostOwner;
use Illuminate\Support\Facades\Route;

//public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'all']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{post}', [PostController::class, 'update'])->middleware(CheckPostOwner::class);
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware(CheckPostOwner::class);

    Route::post('/posts/{post}/comments', [CommentController::class, 'store']);
    Route::put('/posts/{post}/comments/{comment}', [CommentController::class, 'update'])->middleware(CheckCommentOwner::class);
    Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, 'destroy'])->middleware(CheckCommentOwner::class);

    Route::post('/posts/{post}/likes', [LikeController::class, 'store']);
    Route::delete('/posts/{post}/likes/{like}', [LikeController::class, 'destroy'])->middleware(CheckLikeOwner::class);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/comments/{comment}/responses', [CommentResponseController::class, 'store']);
    Route::put('/comments/{comment}/responses/{response}', [CommentResponseController::class, 'update'])->middleware(CheckCommentResponseOwner::class);
    Route::delete('/comments/{comment}/responses/{response}', [CommentResponseController::class, 'destroy'])->middleware(CheckCommentResponseOwner::class);
});


