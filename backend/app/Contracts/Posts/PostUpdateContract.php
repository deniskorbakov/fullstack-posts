<?php

namespace App\Contracts\Posts;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

interface PostUpdateContract
{
    public function __invoke(PostRequest $request, Post $post): PostResource;
}
