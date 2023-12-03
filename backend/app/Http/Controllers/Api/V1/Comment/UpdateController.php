<?php

namespace App\Http\Controllers\Api\V1\Comment;

use App\Actions\Comments\CommentUpdate;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class UpdateController
{
    public function __invoke(Post $post, Comment $comment, CommentRequest $request, CommentUpdate $action): CommentResource|ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($comment, $request->validated(), $post);
    }
}
