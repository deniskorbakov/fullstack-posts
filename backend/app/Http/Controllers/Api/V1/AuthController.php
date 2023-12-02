<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Auths\AuthLogin;
use App\Actions\Auths\AuthLogout;
use App\Actions\Auths\AuthRegister;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function register(AuthRegisterRequest $request, AuthRegister $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($request->validated());
    }

    public function login(AuthLoginRequest $request, AuthLogin $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($request->validated());
    }

    public function logout(AuthLogout $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action(auth()->user());
    }
}
