<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{


    public function add(CommentRequest $request, Post $post) {
        $fields = $request->validated();

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->getAuthIdentifier(),
            'text' => $fields['text'],
        ]);

        return new CommentResource($comment);
    }
}
