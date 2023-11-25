<?php

namespace App\Actions\Comments;

use App\Contracts\Comments\CommentUpdateContract;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentUpdate implements CommentUpdateContract
{
    public function __invoke(Comment $comment, CommentRequest $request): CommentResource
    {
        $fields = $request->validated();

        $comment->update([
            'text' => $fields['text'],
        ]);

        return new CommentResource($comment);
    }
}
