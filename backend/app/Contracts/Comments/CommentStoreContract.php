<?php

namespace App\Contracts\Comments;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Post;

interface CommentStoreContract
{
    public function __invoke(CommentRequest $request, Post $post): CommentResource;
}
