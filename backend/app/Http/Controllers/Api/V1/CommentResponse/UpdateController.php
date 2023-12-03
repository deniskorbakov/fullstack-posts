<?php

namespace App\Http\Controllers\Api\V1\CommentResponse;

use App\Actions\CommentsResponses\CommentResponseUpdate;
use App\Http\Requests\CommentResponseRequest;
use App\Http\Resources\CommentResponseResource;
use App\Models\Comment;
use App\Models\CommentResponse;
use Illuminate\Http\JsonResponse;

class UpdateController
{
    public function __invoke(Comment $comment, CommentResponse $response, CommentResponseRequest $request, CommentResponseUpdate $action): CommentResponseResource|JsonResponse
    {
        return $action($request, $response, $comment);
    }
}
