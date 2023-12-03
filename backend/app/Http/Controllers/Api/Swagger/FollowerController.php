<?php

namespace App\Http\Controllers\Api\Swagger;

use App\Http\Controllers\Api\V1\Controller;

/**
 *
 * @OA\Post(
 *    path="/api/v1/followers",
 *    summary="Подписаться на пользователя",
 *    tags={"Follower"},
 *    security={{ "bearerAuth": {} }},
 *
 *    @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="follower_id", type="integer", example=1),
 *                )
 *            }
 *        )
 *    ),
 *
 *    @OA\Response(
 *        response=201,
 *        description="ok",
 *        @OA\JsonContent(
 *                @OA\Property(property="message", type="string", example="Вы успешно подписались на Clement Legros"),
 *        ),
 *    ),
 *  ),
 *
 * @OA\Get(
 *    path="/api/v1/followers/{user}",
 *    summary="Получить список подписок пользователя",
 *    tags={"Follower"},
 *    security={{ "bearerAuth": {} }},
 *
 *    @OA\Parameter(
 *      description="Id пользователя",
 *      in="path",
 *      name="user",
 *      required=true,
 *      example=1,
 *    ),
 *
 *
 *    @OA\Response(
 *        response=200,
 *        description="ok",
 *        @OA\JsonContent(
 *            @OA\Property(property="data", type="array", @OA\Items(
 *                @OA\Property(property="id", type="integer", example=10),
 *                @OA\Property(property="follower_id", type="integer", example=1),
 *                @OA\Property(property="follower_name", type="string", example="Gracie Sauer Sr."),
 *            )),
 *        ),
 *    ),
 *
 *
 *  ),
 *
 * @OA\Get(
 *    path="/api/v1/followers/subscriptions/{user}",
 *    summary="Получить список подписчиков пользователя",
 *    tags={"Follower"},
 *    security={{ "bearerAuth": {} }},
 *
 *    @OA\Parameter(
 *        description="Id пользователя",
 *        in="path",
 *        name="user",
 *        required=true,
 *        example=1,
 *    ),
 *
 *    @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=10),
 *                 @OA\Property(property="subscription_id", type="integer", example=1),
 *                 @OA\Property(property="subscription_name", type="string", example="Gracie Sauer Sr."),
 *             )),
 *         ),
 *     ),
 *  ),
 *
 * @OA\Delete(
 *    path="/api/v1/followers/{follower}",
 *    summary="Отписка от пользователя",
 *    tags={"Follower"},
 *    security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="Id подписки",
 *         in="path",
 *         name="follower",
 *         required=true,
 *         example=1,
 *     ),
 *
 *     @OA\Response(
 *         response=201,
 *         description="ok",
 *         @OA\JsonContent(
 *                 @OA\Property(property="message", type="string", example="Вы успешно отписались от пользователя"),
 *         ),
 *     ),
 *  ),
 *
 **/

class FollowerController extends Controller {}
