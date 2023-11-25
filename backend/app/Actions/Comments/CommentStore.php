<?php

namespace App\Actions\Comments;

use App\Contracts\Comments\CommentStoreContract;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;

class CommentStore implements CommentStoreContract
{
    public function __invoke(CommentRequest $request, Post $post): CommentResource
    {
        $fields = $request->validated();

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->getAuthIdentifier(),
            'text' => $fields['text'],
        ]);

        return new CommentResource($comment);
    }
}
