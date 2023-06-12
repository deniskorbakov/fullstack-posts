<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\CommentResponseRequest;
use App\Http\Resources\CommentResponseResource;
use App\Models\Comment;
use App\Models\CommentResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CommentResponseController extends Controller
{
    public function store(Comment $comment, CommentResponseRequest $request) {
        $fields = $request->validated();

        $response = CommentResponse::create([
            'comment_id' => $comment->id,
            'user_id' => auth()->user()->getAuthIdentifier(),
            'text' => $fields['text'],
        ]);

        return new CommentResponseResource($response);
    }

    public function update(Comment $comment, CommentResponse $response, CommentResponseRequest $request) {
        if (auth()->user()->getAuthIdentifier() == $response->user_id && $response->comment_id == $comment->id) {
            $fields = $request->validated();

            $response->update([
                'text' => $fields['text'],
            ]);

            return new CommentResponseResource($response);
        } else {
            return response([
                'message' => 'you cannot update this comment',
            ], 403);
        }
    }

    public function destroy(Comment $comment, CommentResponse $response) {
        if (auth()->user()->getAuthIdentifier() == $response->user_id && $response->comment_id == $comment->id) {
            $response->delete();

            return response(null, ResponseAlias::HTTP_NO_CONTENT);
        }
        else {
            return response([
                'message' => 'you cannot delete this comment',
            ], 403);
        }
    }
}
