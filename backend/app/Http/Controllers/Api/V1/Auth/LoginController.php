<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\Auths\AuthLogin;
use App\Http\Requests\AuthLoginRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class LoginController
{
    public function __invoke(AuthLoginRequest $request, AuthLogin $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($request->validated());
    }
}
