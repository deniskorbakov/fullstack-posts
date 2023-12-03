<?php

namespace App\Http\Controllers\Api\V1\Follower;

use App\Actions\Followers\FollowerStore;
use App\Http\Requests\FollowerRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class StoreController
{
    public function __invoke(FollowerRequest $request, FollowerStore $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($request->validated());
    }
}
