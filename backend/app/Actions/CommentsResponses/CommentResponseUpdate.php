<?php

namespace App\Actions\CommentsResponses;

use App\Contracts\CommentsResponses\CommentResponseUpdateContract;
use App\Http\Requests\CommentResponseRequest;
use App\Http\Resources\CommentResponseResource;
use App\Models\Comment;
use App\Models\CommentResponse;
use Illuminate\Http\JsonResponse;

class CommentResponseUpdate implements CommentResponseUpdateContract
{
    public function __invoke(CommentResponseRequest $request, CommentResponse $response, Comment $comment): CommentResponseResource|JsonResponse
    {
        if ($response->comment_id !== $comment->id) {
            return response()->json(['message' => 'Вы не оставляли ответ под этим коментарием'], 403);
        }

        $fields = $request->validated();

        $response->update([
            'text' => $fields['text'],
        ]);

        return new CommentResponseResource($response);
    }
}
