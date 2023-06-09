<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthRequest $request) {
        $fields = $request->validated();

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

        return response($response, 201);
    }

    public function login(AuthLoginRequest $request) {
        $fields = $request->validated();

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

        return response($response, 200);
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        $response = [
          'message' => 'you logout',
        ];

        return response($response, 200);
    }
}
