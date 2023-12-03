<?php

namespace App\Http\Controllers\Api\V1\CommentResponse;

use App\Actions\CommentsResponses\CommentResponseStore;
use App\Http\Requests\CommentResponseRequest;
use App\Http\Resources\CommentResponseResource;
use App\Models\Comment;

class StoreController
{
    public function __invoke(Comment $comment, CommentResponseRequest $request, CommentResponseStore $action): CommentResponseResource
    {
        return $action($request, $comment);
    }
}
