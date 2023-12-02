<?php

namespace App\Actions\Likes;

use App\Contracts\Likes\LikeDestroyContract;
use App\Models\Like;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LikeDestroy implements LikeDestroyContract
{
    public function __invoke(Like $like): JsonResponse
    {
        $like->delete();

        return response()->json(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
