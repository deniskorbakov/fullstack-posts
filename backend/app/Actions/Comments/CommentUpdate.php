<?php

namespace App\Actions\Comments;

use App\Contracts\Comments\CommentUpdateContract;
use App\Http\Resources\CommentResource;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Comment;
use App\Models\Post;

class CommentUpdate implements CommentUpdateContract
{
    public function __invoke(Comment $comment, array|CommentRequest $request, Post $post): CommentResource|JsonResponse
    {

        if($comment->post_id !== $post->id) {
            return response()->json(['message' => 'Нету данного коментария у данного поста'], 403);
        }

        $comment->update([
            'text' => $request['text'],
        ]);

        return new CommentResource($comment);
    }
}
