<?php

namespace App\Actions\Auths;

use App\Contracts\Auths\AuthLoginContract;
use App\Http\Requests\AuthLoginRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthLogin implements AuthLoginContract
{
    public function __invoke(array|AuthLoginRequest $request): ApplicationAlias|Response|Application|ResponseFactory
    {
        $user = User::where('email', $request['email'])->first();

        if(!$user || !Hash::check($request['password'], $user->password)) {
            return response(['message' => 'bad creds'], 403);
        } else {
            $token = $user->createToken('myAppToken')->plainTextToken;

            $response = [
                'token' => $token,
            ];

            return response($response, 200);
        }
    }
}
