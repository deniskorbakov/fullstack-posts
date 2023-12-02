<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Likes\LikeDestroy;
use App\Actions\Likes\LikeStore;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class LikeController extends Controller
{
    public function store(Post $post, LikeStore $action): JsonResponse
    {
        return $action($post);
    }

    public function destroy(Like $like, LikeDestroy $action): JsonResponse
    {
       return $action($like);
    }
}
