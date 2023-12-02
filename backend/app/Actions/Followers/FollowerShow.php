<?php

namespace App\Actions\Followers;

use App\Contracts\Followers\FollowerShowContract;
use App\Http\Resources\FollowerResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FollowerShow implements FollowerShowContract
{
    public function __invoke(User $user): AnonymousResourceCollection
    {
        return FollowerResource::collection($user->followers);
    }
}
