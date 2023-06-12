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
        if (auth()->user()->getAuthIdentifier() == $comment->user_id && $post->id == $comment->post_id) {
            $fields = $request->validated();

            $comment->update([
                'text' => $fields['text'],
            ]);

            return new CommentResource($comment);
        } else {
            return response([
                'message' => 'you cannot update this comment',
            ], 403);
        }
    }

    public function destroy(Post $post, Comment $comment) {
        if (auth()->user()->getAuthIdentifier() == $comment->user_id && $post->id == $comment->post_id) {
            $comment->delete();

            return response(null, ResponseAlias::HTTP_NO_CONTENT);
        } else {
            return response([
                'message' => 'you cannot delete this comment',
            ], 403);
        }
    }
}