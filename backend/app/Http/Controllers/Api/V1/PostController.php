<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Middleware\CheckPostOwner;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = ($request->page ?? 1) * 10;

        $skip = $page - 10;

        return PostResource::collection(Post::orderBy('id', 'desc')->skip($skip)->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request, PostService $service)
    {
        $fields = $request->validated();

        $post = $service->store($fields);

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return new PostResource(Post::findOrFail($post->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post, PostService $service)
    {
        $fields = $request->validated();

        $post = $service->update($fields, $post);

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }

}
