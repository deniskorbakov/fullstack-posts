<?php

namespace App\Actions\Comments;

use App\Contracts\Comments\CommentDestroyContract;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CommentDestroy implements CommentDestroyContract
{
    public function __invoke(Comment $comment, Post $post): ApplicationAlias|Response|Application|ResponseFactory
    {
        if($comment->post_id !== $post->id) {
            return response(['message' => 'Нету данного коментария у данного поста'], 403);
        }

        $comment->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
