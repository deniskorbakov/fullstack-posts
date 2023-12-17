<?php

namespace App\Actions\Auths;

use App\Contracts\Auths\AuthLoginContract;
use App\Http\Requests\AuthLoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthLogin implements AuthLoginContract
{
    public function __invoke(array|AuthLoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request['email'])->first();

        if(!$user || !Hash::check($request['password'], $user->password)) {
            return response()->json(['message' => 'bad creds'], 403);
        } else {
            $token = $user->createToken('myAppToken')->plainTextToken;

            $response = [
                'token' => $token,
            ];

            return response()->json($response);
        }
    }
}
