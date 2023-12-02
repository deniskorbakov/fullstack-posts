<?php

namespace App\Contracts\Likes;

use App\Models\Post;
use Illuminate\Http\JsonResponse;

interface LikeStoreContract
{
    public function __invoke(Post $post): JsonResponse;
}
