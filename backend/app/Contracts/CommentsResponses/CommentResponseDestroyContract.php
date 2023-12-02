<?php

namespace App\Contracts\CommentsResponses;

use App\Models\Comment;
use App\Models\CommentResponse;
use Illuminate\Http\JsonResponse;

interface CommentResponseDestroyContract
{
    public function __invoke(CommentResponse $response, Comment $comment): JsonResponse;
}
