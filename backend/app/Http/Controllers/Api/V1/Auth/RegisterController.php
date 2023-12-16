<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\Auths\AuthRegister;
use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Http\JsonResponse;

class RegisterController
{
    public function __invoke(AuthRegisterRequest $request, AuthRegister $action): JsonResponse
    {
        return $action($request->validated());
    }
}
