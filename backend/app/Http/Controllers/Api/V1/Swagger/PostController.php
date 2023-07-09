<?php

namespace App\Http\Controllers\Api\V1\Swagger;

use App\Http\Controllers\Api\V1\Controller;

/**
 *
 * @OA\Post(
 *    path="/api/v1/posts",
 *    summary="Создать запись",
 *    tags={"Post"},
 *    security={{ "bearerAuth": {} }},
 *
 *    @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="body", type="string", example="this is body for post"),
 *                    @OA\Property(property="title", type="string", example="this is title for post"),
 *                    @OA\Property(property="categories", type="array", @OA\Items(type="integer"), example={1, 2, 3}),
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
 *                @OA\Property(property="body", type="string", example="this is body for post"),
 *                @OA\Property(property="title", type="string", example="this is title for post"),
 *                @OA\Property(property="categories", type="array", @OA\Items(type="integer"), example={1, 2, 3}),
 *            ),
 *        ),
 *    ),
 *  ),
 *
 * @OA\Get(
 *    path="/api/v1/posts",
 *    summary="Список записей",
 *    tags={"Post"},
 *
 *    @OA\Parameter(
 *        name="page",
 *        in="query",
 *        description="вывод следующий страницы",
 *        required=false,
 *        example=2,
 *        @OA\Schema(
 *            type="integer"
 *        )
 *    ),
 *
 *
 *    @OA\Response(
 *        response=200,
 *        description="ok",
 *        @OA\JsonContent(
 *            @OA\Property(property="data", type="array", @OA\Items(
 *                @OA\Property(property="id", type="integer", example=1),
 *                @OA\Property(property="body", type="string", example="this is body for post"),
 *                @OA\Property(property="title", type="string", example="this is title for post"),
 *                @OA\Property(property="userName", type="string", example="deniskorbakov"),
 *                @OA\Property(property="categories", type="array", @OA\Items(type="integer"), example={1, 2, 3}),
 *                @OA\Property(property="likes", type="array", @OA\Items(
 *                    @OA\Property(property="id", type="integer", example=1),
 *                    @OA\Property(property="userName", type="string", example="borisov"),
 *                )),
 *                @OA\Property(property="comments", type="array", @OA\Items(
 *                    @OA\Property(property="id", type="integer", example=1),
 *                    @OA\Property(property="userName", type="string", example="egor-Molot"),
 *                    @OA\Property(property="comment", type="string", example="text for this post"),
 *                    @OA\Property(property="responses", type="array", @OA\Items(
 *                        @OA\Property(property="id", type="integer", example=1),
 *                        @OA\Property(property="text", type="string", example="text for this comment"),
 *                        @OA\Property(property="userName", type="string", example="yan"),
 *                    )),
 *                )),
 *            )),
 *        ),
 *    ),
 *
 *
 *  ),
 *
 * @OA\Get(
 *    path="/api/v1/posts/{post}",
 *    summary="Получить одну запись",
 *    tags={"Post"},
 *    @OA\Parameter(
 *        description="Id поста",
 *        in="path",
 *        name="post",
 *        required=true,
 *        example=1,
 *    ),
 *
 *    @OA\Response(
 *        response=200,
 *        description="ok",
 *        @OA\JsonContent(
 *            @OA\Property(property="data", type="object",
 *                @OA\Property(property="id", type="integer", example=1),
 *                @OA\Property(property="body", type="string", example="this is body for post"),
 *                @OA\Property(property="title", type="string", example="this is title for post"),
 *                @OA\Property(property="userName", type="string", example="deniskorbakov"),
 *                @OA\Property(property="categories", type="array", @OA\Items(type="integer"), example={1, 2, 3}),
 *                @OA\Property(property="likes", type="array", @OA\Items(
 *                    @OA\Property(property="id", type="integer", example=1),
 *                    @OA\Property(property="userName", type="string", example="borisov"),
 *                )),
 *                @OA\Property(property="comments", type="array", @OA\Items(
 *                    @OA\Property(property="id", type="integer", example=1),
 *                    @OA\Property(property="userName", type="string", example="egor-Molot"),
 *                    @OA\Property(property="comment", type="string", example="text for this post"),
 *                    @OA\Property(property="responses", type="array", @OA\Items(
 *                        @OA\Property(property="id", type="integer", example=1),
 *                        @OA\Property(property="text", type="string", example="text for this comment"),
 *                        @OA\Property(property="userName", type="string", example="yan"),
 *                    )),
 *                )),
 *            )),
 *        ),
 *    ),
 *  ),
 *
 * @OA\Put(
 *    path="/api/v1/posts/{post}",
 *    summary="Обновить запись",
 *    tags={"Post"},
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
 *    @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="body", type="string", example="this is body for update post"),
 *                    @OA\Property(property="title", type="string", example="this is title for update post"),
 *                    @OA\Property(property="categories", type="array", @OA\Items(type="integer"), example={2, 4}),
 *                )
 *            }
 *         ),
 *    ),
 *
 *    @OA\Response(
 *        response=201,
 *        description="ok",
 *        @OA\JsonContent(
 *            @OA\Property(property="data", type="object",
 *                @OA\Property(property="id", type="integer", example=1),
 *                @OA\Property(property="body", type="string", example="this is body for post"),
 *                @OA\Property(property="title", type="string", example="this is title for post"),
 *                @OA\Property(property="userName", type="string", example="deniskorbakov"),
 *                @OA\Property(property="categories", type="array", @OA\Items(type="integer"), example={1, 2, 3}),
 *                @OA\Property(property="likes", type="array", @OA\Items(
 *                    @OA\Property(property="id", type="integer", example=1),
 *                    @OA\Property(property="userName", type="string", example="borisov"),
 *                )),
 *                @OA\Property(property="comments", type="array", @OA\Items(
 *                    @OA\Property(property="id", type="integer", example=1),
 *                    @OA\Property(property="userName", type="string", example="egor-Molot"),
 *                    @OA\Property(property="comment", type="string", example="text for this post"),
 *                    @OA\Property(property="responses", type="array", @OA\Items(
 *                        @OA\Property(property="id", type="integer", example=1),
 *                        @OA\Property(property="text", type="string", example="text for this comment"),
 *                        @OA\Property(property="userName", type="string", example="yan"),
 *                    )),
 *                )),
 *            )),
 *        ),
 *    ),
 *  ),
 *
 * @OA\Delete(
 *    path="/api/v1/posts/{post}",
 *    summary="Удаление",
 *    tags={"Post"},
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
 *    @OA\Response(
 *        response=204,
 *        description="none content",
 *    ),
 *  ),
 *
 **/

class PostController extends Controller
{


}
