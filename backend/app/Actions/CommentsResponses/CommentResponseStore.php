<?php

namespace App\Actions\CommentsResponses;

use App\Contracts\CommentsResponses\CommentResponseStoreContract;
use App\Http\Resources\CommentResponseResource;
use App\Models\CommentResponse;

class CommentResponseStore implements CommentResponseStoreContract
{
    public function __invoke($request, $comment): CommentResponseResource
    {
        $fields = $request->validated();

        $response = CommentResponse::create([
            'comment_id' => $comment->id,
            'user_id' => auth()->user()->getAuthIdentifier(),
            'text' => $fields['text'],
        ]);

        return new CommentResponseResource($response);
    }
}
