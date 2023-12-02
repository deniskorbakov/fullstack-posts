<?php

namespace App\Http\Controllers\Api\V1\Swagger;

use App\Http\Controllers\Api\V1\Controller;

/**
 *
 * @OA\Get(
 *    path="/api/v1/user",
 *    summary="Данные профиля",
 *    tags={"User"},
 *    security={{ "bearerAuth": {} }},
 *
 *    @OA\Response(
 *        response=200,
 *        description="ok",
 *        @OA\JsonContent(
 *            @OA\Property(property="data", type="array",@OA\Items(
 *              @OA\Property(property="name", type="string", example="username"),
 *              @OA\Property(property="email", type="string", example="test@gmail.com"),
 *              @OA\Property(property="posts", type="integer", example=0),
 *              @OA\Property(property="createdAccount", type="string", example="2023-11-21 10:06:54"),
 *            )),
 *        ),
 *    ),
 * ),
 *
 **/

class UserAccountController extends Controller
{

}
