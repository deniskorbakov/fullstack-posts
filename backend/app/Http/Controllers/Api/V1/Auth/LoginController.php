<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Requests\AuthLoginRequest;
use Illuminate\Http\JsonResponse;
use App\Actions\Auths\AuthLogin;

class LoginController
{
    public function __invoke(AuthLoginRequest $request, AuthLogin $action): JsonResponse
    {
        return $action($request->validated());
    }
}
