<?php

namespace App\Actions\Followers;

use App\Contracts\Followers\FollowerStoreContract;
use App\Http\Requests\FollowerRequest;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Foundation\Application as ApplicationAlias;

class FollowerStore implements FollowerStoreContract
{
    public function __invoke(array|FollowerRequest $request): ApplicationAlias|Response|Application|ResponseFactory
    {
        $getUser = User::find($request['follower_id']);

        $countFollowersOnUser = Follower::currentFollower($request['follower_id'])->count();

        if(0 !== $countFollowersOnUser) {
            return response(['message' => 'Нельзя подписаться больше 1 раза'], 403);
        } else if(null === $getUser) {
            return response(['message' => 'Такого пользователя не существует'], 403);
        } else if(auth()->id() == $request['follower_id']) {
            return response(['message' => 'Вы не можете подписаться сами на себя'], 403);
        }

        Follower::create([
            'user_id' => auth()->id(),
            'follower_id' => $request['follower_id'],
        ]);

        return response(['message' => 'Вы успешно подписались на ' . $getUser->name], 201);
    }
}
