<?php

namespace App\Contracts\Comments;

use Illuminate\Http\JsonResponse;
use App\Models\Comment;
use App\Models\Post;

interface CommentDestroyContract
{
    public function __invoke(Comment $comment, Post $post): JsonResponse;
}
