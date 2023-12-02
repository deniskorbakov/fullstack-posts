<?php

namespace App\Actions\Posts;

use App\Contracts\Posts\PostDestroyContract;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostDestroy implements PostDestroyContract
{
    public function __invoke(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
