<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Illuminate\Http\JsonResponse;
use App\Actions\Auths\AuthLogout;

class LogoutController
{
    public function __invoke(AuthLogout $action): JsonResponse
    {
        return $action(auth()->user());
    }
}
