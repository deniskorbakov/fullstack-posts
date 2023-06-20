<?php

namespace App\Http\Controllers\Api\V1\Swagger;

use App\Http\Controllers\Api\V1\Controller;

/**
 *
 * @OA\Get(
 *    path="/api/v1/categories",
 *    summary="список записей",
 *    tags={"Category"},
 *
 *
 *    @OA\Response(
 *        response=200,
 *        description="ok",
 *        @OA\JsonContent(
 *            @OA\Property(property="data", type="array",@OA\Items(
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="name", type="string", example="name category"),
 *            )),
 *        ),
 *    ),
 * ),
 *
 **/

class CategoryController extends Controller
{


}
