<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $page = ($request->page ?? 1) * 10;

        $skip = $page - 10;

        return PostResource::collection(Post::orderBy('id', 'desc')->skip($skip)->paginate(10));
    }

    public function store(PostRequest $request, PostService $service)
    {
        $fields = $request->validated();

        $post = $service->store($fields);

        return new PostResource($post);
    }

    public function show(Post $post)
    {
        return new PostResource(Post::findOrFail($post->id));
    }

    public function update(PostRequest $request, Post $post, PostService $service)
    {
        $fields = $request->validated();

        $post = $service->update($fields, $post);

        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }

}
