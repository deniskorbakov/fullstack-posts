<?php

namespace App\Actions\Posts;

use App\Contracts\Posts\PostStoreContract;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;

class PostStore implements PostStoreContract
{
    public function __invoke(PostRequest $request): PostResource
    {
        $fields = $request->validated();

        $post = Post::create([
            'user_id' => auth()->user()->getAuthIdentifier(),
            'body' => $fields['body'],
            'title' => $fields['title'],
        ]);

        $categories = Category::whereIn('id', $fields['categories'])->get();

        foreach ($categories as $category) {
            $category->posts()->save($post);
        }

        return new PostResource($post);
    }
}
