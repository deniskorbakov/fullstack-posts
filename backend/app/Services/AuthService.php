<?php

namespace App\Services;

use App\Http\Resources\LikeResource;
use App\Http\Resources\UserResource;
use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login($fields) {
        //check email
        $user = User::where('email', $fields['email'])->first();

        //check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds',
            ], 401);
        }

        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'user' => new UserResource($user),
            'token' => $token,
        ];

        return $response;
    }

    public function register($fields) {
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'user' => new UserResource($user),
            'token' => $token,
        ];

        return $response;
    }
}
