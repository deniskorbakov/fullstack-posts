<?php

namespace App\Http\Controllers\Api\Swagger;

use App\Http\Controllers\Api\V1\Controller;

/**
 *
 * @OA\Post(
 *    path="/api/v1/register",
 *    summary="регистрация",
 *    tags={"Auth"},
 *
 *    @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="email", type="string", example="test@gmail.com"),
 *                    @OA\Property(property="name", type="string", example="username"),
 *                    @OA\Property(property="password", type="string", example="12345678"),
 *                    @OA\Property(property="password_confirmation", type="string", example="12345678"),
 *                )
 *            }
 *        )
 *    ),
 *
 *    @OA\Response(
 *        response=201,
 *        description="create account",
 *        @OA\JsonContent(
 *            @OA\Property(property="data", type="object",
 *                @OA\Property(property="user", type="object",
 *                     @OA\Property(property="token", type="string", example="69|ZT8PCvW7KAozKlHHUj4m089wZtwcJXXiPEvRpywI"),
 *                ),
 *
 *            ),
 *        ),
 *    ),
 * ),
 *
 * @OA\Post(
 *    path="/api/v1/login",
 *    summary="авторизация",
 *    tags={"Auth"},
 *
 *    @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="email", type="string", example="test@gmail.com"),
 *                    @OA\Property(property="password", type="string", example="12345678"),
 *                )
 *            }
 *        )
 *    ),
 *
 *    @OA\Response(
 *        response=200,
 *        description="ok",
 *        @OA\JsonContent(
 *            @OA\Property(property="data", type="object",
 *                @OA\Property(property="user", type="object",
 *                     @OA\Property(property="token", type="string", example="69|ZT8PCvW7KAozKlHHUj4m089wZtwcJXXiPEvRpywI"),
 *                ),
 *            ),
 *        ),
 *    ),
 *
 *  ),
 *
 * @OA\Post(
 *    path="/api/v1/logout",
 *    summary="выход из аккаунта",
 *    tags={"Auth"},
 *    security={{ "bearerAuth": {} }},
 *
 *
 *
 *    @OA\Response(
 *        response=200,
 *        description="ok",
 *        @OA\JsonContent(
 *            @OA\Property(property="data", type="object",
 *                @OA\Property(property="message", type="string", example="you logout"),
 *            ),
 *        ),
 *    ),
 *  ),
 *
 **/

class AuthController extends Controller {}
