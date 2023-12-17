<?php

namespace App\Http\Controllers\Api\V1\Follower;

use App\Actions\Followers\FollowerShowSubscription;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ShowSubscriptionsController
{
    public function __invoke(User $user, FollowerShowSubscription $action): AnonymousResourceCollection
    {
        return $action($user);
    }
}
