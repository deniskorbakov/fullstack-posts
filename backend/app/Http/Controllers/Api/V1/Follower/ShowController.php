<?php

namespace App\Http\Controllers\Api\V1\Follower;

use App\Actions\Followers\FollowerShow;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ShowController
{
    public function __invoke(User $user, FollowerShow $action): AnonymousResourceCollection
    {
        return $action($user);
    }
}
