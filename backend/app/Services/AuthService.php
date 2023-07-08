<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login($fields) {
        //check email
        $user = User::where('email', $fields['email'])->first();

        //check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response(['message' => 'bad creds'], 403);
        }
        else {
            $token = $user->createToken('myAppToken')->plainTextToken;

            $response = [
                'token' => $token,
            ];

            return response($response, 200);
        }
    }

    public function register($fields) {
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'token' => $token,
        ];

        return response($response, 201);
    }
}
