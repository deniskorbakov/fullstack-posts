<?php

namespace App\Http\Controllers\Api\V1\Comment;

use App\Actions\Comments\CommentDestroy;
use Illuminate\Http\JsonResponse;
use App\Models\Comment;
use App\Models\Post;

class DestroyController
{
    public function __invoke(Post $post, Comment $comment, CommentDestroy $action): JsonResponse
    {
        return $action($comment, $post);
    }
}
