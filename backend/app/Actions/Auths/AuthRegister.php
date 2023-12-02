<?php

namespace App\Actions\Auths;

use App\Contracts\Auths\AuthRegisterContract;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

class AuthRegister implements AuthRegisterContract
{
     public function __invoke(array|AuthRegisterRequest $request): ApplicationAlias|Response|Application|ResponseFactory
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

         return response($response, 201);
     }
}
