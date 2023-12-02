<?php

namespace App\Actions\Posts;

use App\Contracts\Posts\PostShowContract;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostShow implements PostShowContract
{
    public function __invoke(Post $post): PostResource
    {
        return new PostResource(Post::findOrFail($post->id));
    }
}
