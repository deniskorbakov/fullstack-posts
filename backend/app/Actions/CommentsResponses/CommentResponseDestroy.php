<?php

namespace App\Actions\CommentsResponses;

use App\Contracts\CommentsResponses\CommentResponseDestroyContract;
use App\Models\Comment;
use App\Models\CommentResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CommentResponseDestroy implements CommentResponseDestroyContract
{
    public function __invoke(CommentResponse $response, Comment $comment): JsonResponse
    {
        if ($response->comment_id !== $comment->id) {
            return response()->json(['message' => 'Вы не оставляли ответ под этим коментарием'], 403);
        }

        $response->delete();

        return response()->json(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
