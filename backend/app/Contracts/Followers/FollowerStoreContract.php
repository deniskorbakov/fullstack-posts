<?php

namespace App\Contracts\Followers;

use App\Http\Requests\FollowerRequest;
use Illuminate\Http\JsonResponse;

interface FollowerStoreContract
{
    public function __invoke(array|FollowerRequest $request): JsonResponse;
}
