<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\Auths\AuthRegister;
use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class RegisterController
{
    public function __invoke(AuthRegisterRequest $request, AuthRegister $action): ApplicationAlias|Response|Application|ResponseFactory
    {
        return $action($request->validated());
    }
}
