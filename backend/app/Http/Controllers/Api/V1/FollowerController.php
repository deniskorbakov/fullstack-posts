<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Followers\FollowerDestroy;
use App\Actions\Followers\FollowerShow;
use App\Actions\Followers\FollowerShowSubscription;
use App\Actions\Followers\FollowerStore;
use App\Http\Requests\FollowerRequest;
use App\Http\Resources\FollowerResource;
use App\Http\Resources\SubscriptionResource;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Foundation\Application as ApplicationAlias;

class FollowerController extends Controller
{
    public function store(FollowerRequest $request, FollowerStore $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($request->validated());
    }

    public function show(User $user, FollowerShow $action): AnonymousResourceCollection
    {
        return FollowerResource::collection($action($user));
    }

    public function showSubscriptions(User $user, FollowerShowSubscription $action): AnonymousResourceCollection
    {
        return SubscriptionResource::collection($action($user));
    }

    public function destroy(User $follower, FollowerDestroy $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($follower);
    }

}
