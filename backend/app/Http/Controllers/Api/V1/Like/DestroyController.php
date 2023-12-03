<?php

namespace App\Http\Controllers\Api\V1\Like;

use App\Actions\Likes\LikeDestroy;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class DestroyController
{
    public function __invoke(Post $post, Like $like, LikeDestroy $action): JsonResponse
    {
        return $action($like);
    }
}
