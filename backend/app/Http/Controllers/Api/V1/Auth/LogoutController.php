<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\Auths\AuthLogout;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class LogoutController
{
    public function __invoke(AuthLogout $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action(auth()->user());
    }
}
