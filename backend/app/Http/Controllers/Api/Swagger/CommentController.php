<?php

namespace App\Http\Controllers\Api\Swagger;

use App\Http\Controllers\Api\V1\Controller;

/**
 *
 * @OA\Post(
 *    path="/api/v1/posts/{post}/comments",
 *    summary="Создать запись",
 *    tags={"Comment"},
 *    security={{ "bearerAuth": {} }},
 *    @OA\Parameter(
 *        description="Id поста",
 *        in="path",
 *        name="post",
 *        required=true,
 *        example=1,
 *    ),
 *
 *    @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="text", type="string", example="text for post min 15 chars"),
 *                )
 *            }
 *        )
 *    ),
 *
 *    @OA\Response(
 *        response=201,
 *        description="ok",
 *        @OA\JsonContent(
 *            @OA\Property(property="data", type="object",
 *                @OA\Property(property="id", type="integer", example=1),
 *                @OA\Property(property="userName", type="string", example="your name"),
 *                @OA\Property(property="comment", type="string", example="text for post min 15 chars"),
 *                @OA\Property(property="response", type="array", @OA\Items(type="object"), example={}),
 *            ),
 *        ),
 *    ),
 *  ),
 *
 * @OA\Put(
 *    path="/api/v1/posts/{post}/comments/{comment}",
 *    summary="Обновить запись",
 *    tags={"Comment"},
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
 *        description="Id коментария",
 *        in="path",
 *        name="comment",
 *        required=true,
 *        example=44,
 *    ),
 *
 *    @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="text", type="string", example="update text for your comment - min 15 chars"),
 *                )
 *            }
 *         ),
 *    ),
 *
 *    @OA\Response(
 *        response=200,
 *        description="ok",
 *        @OA\JsonContent(
 *            @OA\Property(property="data", type="object",
 *                @OA\Property(property="id", type="integer", example=1),
 *                @OA\Property(property="userName", type="string", example="your name"),
 *                @OA\Property(property="comment", type="string", example="update text for your comment - min 15 chars"),
 *                @OA\Property(property="response", type="array", @OA\Items(type="object"), example={}),
 *            ),
 *        ),
 *    ),
 *  ),
 *
 * @OA\Delete(
 *    path="/api/v1/posts/{post}/comments/{comment}",
 *    summary="Удаление",
 *    tags={"Comment"},
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
 *        description="Id коментария",
 *        in="path",
 *        name="comment",
 *        required=true,
 *        example=44,
 *    ),
 *
 *    @OA\Response(
 *        response=204,
 *        description="none content",
 *    ),
 *  ),
 *
 **/

class CommentController extends Controller {}
