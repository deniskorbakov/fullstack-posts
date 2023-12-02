<?php

namespace App\Contracts\CommentsResponses;

use App\Http\Resources\CommentResponseResource;

interface CommentResponseStoreContract
{
    public function __invoke($request, $comment): CommentResponseResource;
}
