<?php

namespace App\Providers\Actions;

use App\Actions\CommentsResponses\CommentResponseDestroy;
use App\Actions\CommentsResponses\CommentResponseUpdate;
use App\Contracts\CommentsResponses\CommentResponseDestroyContract;
use App\Contracts\CommentsResponses\CommentResponseStoreContract;
use App\Contracts\CommentsResponses\CommentResponseUpdateContract;
use Illuminate\Support\ServiceProvider;

class ActionCommentResponseServiceProvider extends ServiceProvider
{
    public array $binding = [
        CommentResponseDestroyContract::class => CommentResponseDestroy::class,
        CommentResponseUpdateContract::class => CommentResponseUpdate::class,
        CommentResponseStoreContract::class => CommentResponseStoreContract::class,
    ];
}
