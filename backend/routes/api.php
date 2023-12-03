<?php

use App\Http\Middleware\CheckCommentResponseOwner;
use App\Http\Middleware\CheckCommentOwner;
use App\Http\Middleware\CheckLikeOwner;
use App\Http\Middleware\CheckPostOwner;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Api\V1\Post')->group(function () {
    Route::get('/posts', 'IndexController');
    Route::get('/posts/{post}', 'ShowController');
});

Route::namespace('App\Http\Controllers\Api\V1\Auth')->group(function () {
    Route::post('/register', 'RegisterController');
    Route::post('/login', 'LoginController');
});

Route::namespace('App\Http\Controllers\Api\V1\Category')->group(function () {
    Route::get('/categories', 'IndexController');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::namespace('App\Http\Controllers\Api\V1\Follower')->group(function () {
        Route::post('/followers', 'StoreController');
        Route::get('/followers/{user}', 'ShowController');
        Route::get('/followers/subscriptions/{user}', 'ShowSubscriptionsController');
        Route::delete('/followers/{follower}', 'DestroyController');
    });

    Route::namespace('App\Http\Controllers\Api\V1\Comment')->group(function () {
        Route::post('/posts/{post}/comments', 'StoreController');
        Route::put('/posts/{post}/comments/{comment}', 'UpdateController')->middleware(CheckCommentOwner::class);
        Route::delete('/posts/{post}/comments/{comment}', 'DestroyController')->middleware(CheckCommentOwner::class);
    });

    Route::namespace('App\Http\Controllers\Api\V1\CommentResponse')->group(function () {
        Route::post('/comments/{comment}/responses', 'StoreController');
        Route::put('/comments/{comment}/responses/{response}', 'UpdateController')->middleware(CheckCommentResponseOwner::class);
        Route::delete('/comments/{comment}/responses/{response}', 'DestroyController')->middleware(CheckCommentResponseOwner::class);
    });

    Route::namespace('App\Http\Controllers\Api\V1\Post')->group(function () {
        Route::post('/posts', 'StoreController');
        Route::put('/posts/{post}', 'UpdateController')->middleware(CheckPostOwner::class);
        Route::delete('/posts/{post}', 'DestroyController')->middleware(CheckPostOwner::class);
    });

    Route::namespace('App\Http\Controllers\Api\V1\Like')->group(function () {
        Route::post('/posts/{post}/likes', 'StoreController');
        Route::delete('/posts/{post}/likes/{like}', 'DestroyController')->middleware(CheckLikeOwner::class);
    });

    Route::namespace('App\Http\Controllers\Api\V1\UserAccount')->group(function () {
        Route::get('/user', 'IndexController');
    });

    Route::namespace('App\Http\Controllers\Api\V1\Auth')->group(function () {
        Route::post('/logout', 'LogoutController');
    });
});


