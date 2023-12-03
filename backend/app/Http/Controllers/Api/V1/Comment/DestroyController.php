<?php

namespace App\Http\Controllers\Api\V1\Comment;

use App\Actions\Comments\CommentDestroy;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class DestroyController
{
    public function __invoke(Post $post, Comment $comment, CommentDestroy $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($comment, $post);
    }
}
