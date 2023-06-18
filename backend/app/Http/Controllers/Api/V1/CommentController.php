<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentResponseResource;
use App\Models\Comment;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CommentController extends Controller
{


    public function store(CommentRequest $request, Post $post) {
        $fields = $request->validated();

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->getAuthIdentifier(),
            'text' => $fields['text'],
        ]);

        return new CommentResource($comment);
    }

    public function update(Post $post, Comment $comment, CommentRequest $request) {
        $fields = $request->validated();

        $comment->update([
            'text' => $fields['text'],
        ]);

        return new CommentResource($comment);
    }

    public function destroy(Post $post, Comment $comment) {
        $comment->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
