<?php

namespace App\Providers\Actions;

use App\Actions\Comments\CommentDestroy;
use App\Actions\Comments\CommentUpdate;
use App\Contracts\Comments\CommentDestroyContract;
use App\Contracts\Comments\CommentStoreContract;
use App\Contracts\Comments\CommentUpdateContract;
use Illuminate\Support\ServiceProvider;

class ActionCommentServiceProvider extends ServiceProvider
{
    public array $binding = [
        CommentDestroyContract::class => CommentDestroy::class,
        CommentUpdateContract::class => CommentUpdate::class,
        CommentStoreContract::class => CommentStoreContract::class,
    ];
}
