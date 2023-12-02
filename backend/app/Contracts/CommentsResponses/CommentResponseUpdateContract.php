<?php

namespace App\Contracts\CommentsResponses;

use App\Http\Requests\CommentResponseRequest;
use App\Http\Resources\CommentResponseResource;
use App\Models\Comment;
use App\Models\CommentResponse;
use Illuminate\Http\JsonResponse;

interface CommentResponseUpdateContract
{
    public function __invoke(CommentResponseRequest $request, CommentResponse $response, Comment $comment): CommentResponseResource|JsonResponse;
}
