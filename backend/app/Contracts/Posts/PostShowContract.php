<?php

namespace App\Contracts\Posts;

use App\Http\Resources\PostResource;
use App\Models\Post;

interface PostShowContract
{
    public function __invoke(Post $post): PostResource;
}
