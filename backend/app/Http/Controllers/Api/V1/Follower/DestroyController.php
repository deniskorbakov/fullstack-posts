<?php

namespace App\Http\Controllers\Api\V1\Follower;

use App\Actions\Followers\FollowerDestroy;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class DestroyController
{
    public function __invoke(User $follower, FollowerDestroy $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($follower);
    }
}
