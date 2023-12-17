<?php

namespace App\Contracts\Auths;

use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Http\JsonResponse;

interface AuthRegisterContract
{
    public function __invoke(array|AuthRegisterRequest $request): JsonResponse;
}
