<?php

namespace App\Actions\Auths;

use App\Contracts\Auths\AuthRegisterContract;
use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class AuthRegister implements AuthRegisterContract
{
     public function __invoke(array|AuthRegisterRequest $request): JsonResponse
     {
         $user = User::create([
             'name' => $request['name'],
             'email' => $request['email'],
             'password' => bcrypt($request['password']),
         ]);

         $token = $user->createToken('myAppToken')->plainTextToken;

         $response = [
             'token' => $token,
         ];

         return response()->json($response, 201);
     }
}
