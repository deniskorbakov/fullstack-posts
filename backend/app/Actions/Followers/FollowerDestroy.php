<?php

namespace App\Actions\Followers;

use App\Contracts\Followers\FollowerDestroyContract;
use Illuminate\Http\JsonResponse;
use App\Models\Follower;
use App\Models\User;

class FollowerDestroy implements FollowerDestroyContract
{
    public function __invoke(User $follower): JsonResponse
    {
        $currencyFollowerField = Follower::currentFollower($follower->id)->first();

        if(null == $currencyFollowerField) {
            return response()->json(['message' => 'Вы не подписаны на данного пользователя'], 403);
        }

        $currencyFollowerField->delete();

        return response()->json(['message' => 'Вы успешно отписались'], 200);
    }
}
