<?php

namespace App\Http\Controllers\Api\V1\Follower;

use App\Actions\Followers\FollowerStore;
use App\Http\Requests\FollowerRequest;
use Illuminate\Http\JsonResponse;

class StoreController
{
    public function __invoke(FollowerRequest $request, FollowerStore $action): JsonResponse
    {
        return $action($request->validated());
    }
}
