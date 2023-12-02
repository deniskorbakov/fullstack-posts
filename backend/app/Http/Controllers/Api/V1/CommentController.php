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
    public function store(Post $post, CommentRequest $request, CommentStore $action): CommentResource
    {
        return $action($request->validated(), $post);
    }

    public function update(Post $post, Comment $comment, CommentRequest $request, CommentUpdate $action): CommentResource|ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($comment, $request->validated(), $post);
    }

    public function destroy(Post $post, Comment $comment, CommentDestroy $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($comment, $post);
    }
}
