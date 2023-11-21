<?php

namespace App\Actions\Followers;

use App\Contracts\Followers\FollowerDestroyContract;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class FollowerDestroy implements FollowerDestroyContract
{
    public function __invoke(User $follower): ApplicationAlias|Response|Application|ResponseFactory
    {
        $currencyFollowerField = Follower::where('user_id', auth()->id())->where('follower_id', $follower->id)->first();

        if(null == $currencyFollowerField) {
            return response(['message' => 'Вы не подписаны на данного пользователя'], 403);
        }

        $currencyFollowerField->delete();

        return response(['message' => 'Вы успешно отписались'], 200);
    }
}
