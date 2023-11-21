<?php

namespace App\Actions\Followers;

use App\Contracts\Followers\FollowerShowSubscriptionContract;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class FollowerShowSubscription implements FollowerShowSubscriptionContract
{
    public function __invoke(User $user): Collection
    {
        return $user->following;
    }
}
