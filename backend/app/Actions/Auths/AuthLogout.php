<?php

namespace App\Actions\Auths;

use App\Contracts\Auths\AuthLogoutContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class AuthLogout implements AuthLogoutContract
{
    public function __invoke($user): ApplicationAlias|Response|Application|ResponseFactory
    {
        $user->tokens()->delete();

        return response(['data' => ['message' => 'you logout']], 200);
    }
}
