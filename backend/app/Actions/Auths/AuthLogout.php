<?php

namespace App\Actions\Auths;

use App\Contracts\Auths\AuthLogoutContract;
use Illuminate\Http\JsonResponse;

class AuthLogout implements AuthLogoutContract
{
    public function __invoke($user): JsonResponse
    {
        $user->tokens()->delete();

        return response()->json(['data' => ['message' => 'you logout']]);
    }
}
