<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Posts\PostDestroy;
use App\Actions\Posts\PostIndex;
use App\Actions\Posts\PostShow;
use App\Actions\Posts\PostStore;
use App\Actions\Posts\PostUpdate;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    public function index(Request $request, PostIndex $action): AnonymousResourceCollection
    {
        return $action($request);
    }

    public function store(PostRequest $request, PostStore $action): PostResource
    {
        return $action($request);
    }

    public function show(Post $post, PostShow $action): PostResource
    {
        return $action($post);
    }

    public function update(PostRequest $request, Post $post, PostUpdate $action): PostResource
    {
        return $action($request, $post);
    }

    public function destroy(Post $post, PostDestroy $action): JsonResponse
    {
        return $action($post);
    }
}
