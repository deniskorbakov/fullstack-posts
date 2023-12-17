<?php

namespace App\Http\Controllers\Api\V1\Like;

use App\Actions\Likes\LikeStore;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class StoreController
{
    public function __invoke(Post $post, LikeStore $action): JsonResponse
    {
        return $action($post);
    }
}
