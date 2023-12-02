<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\CommentsResponses\CommentResponseDestroy;
use App\Actions\CommentsResponses\CommentResponseStore;
use App\Actions\CommentsResponses\CommentResponseUpdate;
use App\Http\Requests\CommentResponseRequest;
use App\Http\Resources\CommentResponseResource;
use App\Models\Comment;
use App\Models\CommentResponse;
use Illuminate\Http\JsonResponse;

class CommentResponseController extends Controller
{
    public function store(Comment $comment, CommentResponseRequest $request, CommentResponseStore $action): CommentResponseResource
    {
        return $action($request, $comment);
    }

    public function update(Comment $comment, CommentResponse $response, CommentResponseRequest $request, CommentResponseUpdate $action): CommentResponseResource|JsonResponse
    {
        return $action($request, $response, $comment);
    }

    public function destroy(Comment $comment, CommentResponse $response, CommentResponseDestroy $action): JsonResponse
    {
        return $action($response, $comment);
    }
}
