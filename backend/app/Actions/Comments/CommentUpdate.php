<?php

namespace App\Actions\Comments;

use App\Contracts\Comments\CommentUpdateContract;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class CommentUpdate implements CommentUpdateContract
{
    public function __invoke(Comment $comment, array|CommentRequest $request, Post $post): CommentResource|ApplicationAlias|Response|Application|ResponseFactory
    {

        if($comment->post_id !== $post->id) {
            return response(['message' => 'Нету данного коментария у данного поста'], 403);
        }

        $comment->update([
            'text' => $request['text'],
        ]);

        return new CommentResource($comment);
    }
}
