<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Comments\CommentDestroy;
use App\Actions\Comments\CommentStore;
use App\Actions\Comments\CommentUpdate;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Post $post, CommentStore $action): CommentResource
    {
        return $action($request, $post);
    }

    public function update(Comment $comment, CommentRequest $request, CommentUpdate $action): CommentResource
    {
        return  $action($comment, $request);
    }

    public function destroy(Comment $comment, CommentDestroy $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($comment);
    }
}
