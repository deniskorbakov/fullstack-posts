<?php

namespace App\Contracts\Auths;

use Illuminate\Http\JsonResponse;;

interface AuthLogoutContract
{
    public function __invoke($user): JsonResponse;
}
