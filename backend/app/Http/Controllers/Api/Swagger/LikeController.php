<?php

namespace App\Http\Controllers\Api\Swagger;

use App\Http\Controllers\Api\V1\Controller;

/**
 *
 * @OA\Post(
 *    path="/api/v1/posts/{post}/likes",
 *    summary="Поставить лайк",
 *    tags={"Like"},
 *    security={{ "bearerAuth": {} }},
 *    @OA\Parameter(
 *        description="Id поста",
 *        in="path",
 *        name="post",
 *        required=true,
 *        example=1,
 *    ),
 *
 *    @OA\Response(
 *        response=201,
 *        description="ok",
 *        @OA\JsonContent(
 *            @OA\Property(property="message", type="string", example="вы поставили лайк"),
 *        ),
 *    ),
 *  ),
 *
 * @OA\Delete(
 *    path="/api/v1/posts/{post}/likes/{like}",
 *    summary="Снять лайк",
 *    tags={"Like"},
 *    security={{ "bearerAuth": {} }},
 *
 *    @OA\Parameter(
 *        description="Id поста",
 *        in="path",
 *        name="post",
 *        required=true,
 *        example=1,
 *    ),
 *
 *    @OA\Parameter(
 *        description="Id лайка",
 *        in="path",
 *        name="like",
 *        required=true,
 *        example=1,
 *    ),
 *
 *    @OA\Response(
 *        response=204,
 *        description="none content",
 *    ),
 *  ),
 *
 **/

class LikeController extends Controller {}
