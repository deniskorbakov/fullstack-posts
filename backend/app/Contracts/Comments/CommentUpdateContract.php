<?php

namespace App\Contracts\Comments;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

interface CommentUpdateContract
{
    public function __invoke(Comment $comment, CommentRequest $request): CommentResource;
}
