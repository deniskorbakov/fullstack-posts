<?php

namespace App\Http\Controllers\Api\Swagger;

use App\Http\Controllers\Api\V1\Controller;

/**
 * @OA\Info(
 *  title="Doc Api",
 *  version="1.0"
 * ),
 *
 * @OA\PathItem(
 *     path="/api/"
 * ),
 *
 * @OA\Components(
 *     @OA\SecurityScheme(
 *         securityScheme="bearerAuth",
 *         type="http",
 *         scheme="bearer",
 *     ),
 * ),
 */
class MainController extends Controller {}
