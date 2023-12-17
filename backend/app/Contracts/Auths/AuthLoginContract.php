<?php

namespace App\Contracts\Auths;

use App\Http\Requests\AuthLoginRequest;
use Illuminate\Http\JsonResponse;

interface AuthLoginContract
{
    public function __invoke(array|AuthLoginRequest $request): JsonResponse;
}
