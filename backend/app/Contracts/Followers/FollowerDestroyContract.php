<?php

namespace App\Contracts\Followers;

use Illuminate\Http\JsonResponse;
use App\Models\User;

interface FollowerDestroyContract
{
    public function __invoke(User $follower): JsonResponse;
}
