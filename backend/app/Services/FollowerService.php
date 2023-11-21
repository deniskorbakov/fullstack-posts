<?php

namespace App\Services;

use App\Models\Follower;
use App\Models\User;

class FollowerService
{
    public function store($field)
    {
        $getFollower = Follower::where('follower_id', $field['follower_id'])->where('user_id', auth()->id())->get();
        $getUser = User::find($field['follower_id']);

        $countFollowersOnUser = count($getFollower);

        if(0 !== $countFollowersOnUser) {
            return response(['message' => 'Нельзя подписаться больше 1 раза'], 403);
        } else if(null === $getUser) {
            return response(['message' => 'Такого пользователя не существует'], 403);
        } else if(auth()->id() == $field['follower_id']) {
            return response(['message' => 'Вы не можете подписаться сами на себя'], 403);
        }

        Follower::create([
            'user_id' => auth()->id(),
            'follower_id' => $field['follower_id'],
        ]);

        return response(['message' => 'Вы успешно подписались на ' . $getUser->name], 201);
    }

    public function destroy(User $follower)
    {
        $currencyFollowerField = Follower::where('user_id', auth()->id())->where('follower_id', $follower->id)->first();

        if(null == $currencyFollowerField) {
            return response(['message' => 'Вы не подписаны на данного пользователя'], 403);
        }

        $currencyFollowerField->delete();

        return response(['message' => 'Вы успешно отписались отписалась '], 200);
    }
}
