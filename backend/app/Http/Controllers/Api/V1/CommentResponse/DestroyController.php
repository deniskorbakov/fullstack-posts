<?php

namespace App\Http\Controllers\Api\V1\CommentResponse;

use App\Actions\CommentsResponses\CommentResponseDestroy;
use App\Models\Comment;
use App\Models\CommentResponse;
use Illuminate\Http\JsonResponse;

class DestroyController
{
    public function __invoke(Comment $comment, CommentResponse $response, CommentResponseDestroy $action): JsonResponse
    {
        return $action($response, $comment);
    }
}
