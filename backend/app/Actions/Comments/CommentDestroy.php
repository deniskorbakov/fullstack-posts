<?php

namespace App\Actions\Comments;

use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use App\Contracts\Comments\CommentDestroyContract;
use Illuminate\Http\JsonResponse;
use App\Models\Comment;
use App\Models\Post;

class CommentDestroy implements CommentDestroyContract
{
    public function __invoke(Comment $comment, Post $post): JsonResponse
    {
        if($comment->post_id !== $post->id) {
            return response()->json(['message' => 'Нету данного коментария у данного поста'], 403);
        }

        $comment->delete();

        return response()->json(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
