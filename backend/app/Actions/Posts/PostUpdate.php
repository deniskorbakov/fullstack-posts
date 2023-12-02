<?php

namespace App\Actions\Posts;

use App\Contracts\Posts\PostUpdateContract;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;

class PostUpdate implements PostUpdateContract
{
    public function __invoke(PostRequest $request, Post $post): PostResource
    {
        $fields = $request->validated();

        $categories = Category::whereIn('id', $fields['categories'])->get();

        $post->update([
            'body' => $fields['body'],
            'title' => $fields['title'],
        ]);

        $post->categories()->sync($categories);

        return new PostResource($post);
    }
}
