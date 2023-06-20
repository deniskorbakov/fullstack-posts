<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthRequest $request, AuthService $service) {
        $fields = $request->validated();

        $response = $service->register($fields);

        return response(['data' => $response->original], $response->status());
    }

    public function login(AuthLoginRequest $request, AuthService $service) {
        $fields = $request->validated();

        $response = $service->login($fields);

        return response(['data' => $response->original], $response->status());
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        $response = [
          'message' => 'you logout',
        ];

        return response(['data' => $response], 200);
    }
}
