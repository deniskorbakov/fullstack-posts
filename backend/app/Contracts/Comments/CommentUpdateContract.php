<?php

namespace App\Contracts\Comments;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

interface CommentUpdateContract
{
    public function __invoke(Comment $comment, CommentRequest $request, Post $post): CommentResource|ApplicationAlias|Response|Application|ResponseFactory;
}
