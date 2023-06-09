<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $fields = $request->validated();

        $post = Post::create([
            'user_id' => auth()->user()->getAuthIdentifier(),
            'body' => $fields['body'],
            'description' => $fields['description'],
        ]);

        $categories = Category::whereIn('id', $fields['categories'])->get();

        foreach ($categories as $category) {
            $category->posts()->save($post);
        }

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
    public function update(PostRequest $request, Post $post)
    {
        if (auth()->user()->getAuthIdentifier() == $post->user_id) {
            $fields = $request->validated();

            $post->update([
                'body' => $fields['body'],
                'description' => $fields['description'],
            ]);

            $categories = Category::whereIn('id', $fields['categories'])->get();

            $post->categories()->sync($categories);

            return new PostResource($post);
        } else {
            return response([
                'message' => 'you cannot update a post that is not yours',
            ], 403);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (auth()->user()->getAuthIdentifier() == $post->user_id) {
            $post->delete();

            return response(null, ResponseAlias::HTTP_NO_CONTENT);
        } else {
            return response([
                'message' => 'you cannot delete a post that is not yours',
            ], 403);
        }

    }
}
