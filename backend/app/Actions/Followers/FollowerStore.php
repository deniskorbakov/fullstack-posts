<?php

namespace App\Actions\Followers;

use App\Contracts\Followers\FollowerStoreContract;
use App\Http\Requests\FollowerRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Follower;
use App\Models\User;

class FollowerStore implements FollowerStoreContract
{
    public function __invoke(array|FollowerRequest $request): JsonResponse
    {
        $getUser = User::find($request['follower_id']);

        $countFollowersOnUser = Follower::currentFollower($request['follower_id'])->count();

        if(0 !== $countFollowersOnUser) {
            return response()->json(['message' => 'Нельзя подписаться больше 1 раза'], 403);
        } else if(null === $getUser) {
            return response()->json(['message' => 'Такого пользователя не существует'], 403);
        } else if(auth()->id() == $request['follower_id']) {
            return response()->json(['message' => 'Вы не можете подписаться сами на себя'], 403);
        }

        Follower::create([
            'user_id' => auth()->id(),
            'follower_id' => $request['follower_id'],
        ]);

        return response()->json(['message' => 'Вы успешно подписались на ' . $getUser->name], 201);
    }
}
