<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\FollowerController;
use App\Http\Controllers\Api\V1\LikeController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\CommentResponseController;
use App\Http\Controllers\Api\V1\UserAccountController;
use App\Http\Middleware\CheckCommentOwner;
use App\Http\Middleware\CheckCommentResponseOwner;
use App\Http\Middleware\CheckLikeOwner;
use App\Http\Middleware\CheckPostOwner;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'all']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', [UserAccountController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{post}', [PostController::class, 'update'])->middleware(CheckPostOwner::class);
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware(CheckPostOwner::class);

    Route::post('/posts/{post}/comments', [CommentController::class, 'store']);
    Route::put('/posts/{post}/comments/{comment}', [CommentController::class, 'update'])->middleware(CheckCommentOwner::class);
    Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, 'destroy'])->middleware(CheckCommentOwner::class);

    Route::post('/posts/{post}/likes', [LikeController::class, 'store']);
    Route::delete('/posts/{post}/likes/{like}', [LikeController::class, 'destroy'])->middleware(CheckLikeOwner::class);

    Route::post('/comments/{comment}/responses', [CommentResponseController::class, 'store']);
    Route::put('/comments/{comment}/responses/{response}', [CommentResponseController::class, 'update'])->middleware(CheckCommentResponseOwner::class);
    Route::delete('/comments/{comment}/responses/{response}', [CommentResponseController::class, 'destroy'])->middleware(CheckCommentResponseOwner::class);

    Route::post('/followers', [FollowerController::class, 'store']);
    Route::get('/followers/{user}', [FollowerController::class, 'show']);
    Route::get('/followers/subscriptions/{user}', [FollowerController::class, 'showSubscriptions']);
    Route::delete('/followers/{follower}', [FollowerController::class, 'destroy']);
});


