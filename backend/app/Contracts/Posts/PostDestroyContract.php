<?php

namespace App\Contracts\Posts;

use App\Models\Post;
use Illuminate\Http\JsonResponse;

interface PostDestroyContract
{
    public function __invoke(Post $post): JsonResponse;
}
