<?php

namespace App\Contracts\Comments;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

interface CommentDestroyContract
{
    public function __invoke(Comment $comment, Post $post): ApplicationAlias|Response|Application|ResponseFactory;
}
