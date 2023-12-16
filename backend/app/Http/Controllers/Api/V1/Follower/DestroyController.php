<?php

namespace App\Http\Controllers\Api\V1\Follower;

use App\Actions\Followers\FollowerDestroy;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class DestroyController
{
    public function __invoke(User $follower, FollowerDestroy $action): JsonResponse
    {
        return $action($follower);
    }
}
