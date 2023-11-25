<?php

namespace App\Actions\Comments;

use App\Contracts\Comments\CommentDestroyContract;
use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CommentDestroy implements CommentDestroyContract
{
    public function __invoke(Comment $comment): ApplicationAlias|Response|Application|ResponseFactory
    {
        $comment->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
