<?php

namespace App\Http\Controllers\Api\V1\Comment;

use App\Actions\Comments\CommentUpdate;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class UpdateController
{
    public function __invoke(Post $post, Comment $comment, CommentRequest $request, CommentUpdate $action): CommentResource|JsonResponse
    {
        return $action($comment, $request->validated(), $post);
    }
}
