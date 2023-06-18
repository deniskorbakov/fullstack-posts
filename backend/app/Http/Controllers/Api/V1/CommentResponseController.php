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
        $fields = $request->validated();

        $response->update([
            'text' => $fields['text'],
        ]);

        return new CommentResponseResource($response);
    }

    public function destroy(Comment $comment, CommentResponse $response) {

        $response->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);

    }
}
