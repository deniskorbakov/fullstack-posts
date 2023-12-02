<?php

namespace App\Actions\Followers;

use App\Contracts\Followers\FollowerShowSubscriptionContract;
use App\Http\Resources\SubscriptionResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FollowerShowSubscription implements FollowerShowSubscriptionContract
{
    public function __invoke(User $user): AnonymousResourceCollection
    {
        return SubscriptionResource::collection($user->following);
    }
}
