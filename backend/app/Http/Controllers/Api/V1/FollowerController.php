<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\FollowerRequest;
use App\Http\Resources\FollowerResource;
use App\Http\Resources\SubscriptionResource;
use App\Models\User;
use App\Services\FollowerService;

class FollowerController extends Controller
{

    public function store(FollowerRequest $request, FollowerService $service)
    {
        $field = $request->validated();

        $follower = $service->store($field);

        return response($follower->original, $follower->status());
    }

    public function show(User $user)
    {
        $followers = $user->followers;

        return FollowerResource::collection($followers);
    }

    public function showSubscriptions(User $user)
    {
        $followers = $user->following;

        return SubscriptionResource::collection($followers);
    }

    public function destroy(User $follower, FollowerService $service)
    {
        return $service->destroy($follower);
    }

}
