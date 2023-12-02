<?php

namespace App\Contracts\Likes;

use App\Models\Like;
use Illuminate\Http\JsonResponse;

interface LikeDestroyContract
{
    public function __invoke(Like $like): JsonResponse;
}
