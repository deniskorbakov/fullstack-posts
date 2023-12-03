<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Actions\Posts\PostDestroy;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class DestroyController
{
    public function __invoke(Post $post, PostDestroy $action): JsonResponse
    {
        return $action($post);
    }
}
