<?php

namespace App\Http\Controllers\Api\V1\Comment;

use App\Actions\Comments\CommentStore;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Post;

class StoreController
{
    public function __invoke(Post $post, CommentRequest $request, CommentStore $action): CommentResource
    {
        return $action($request->validated(), $post);
    }
}
