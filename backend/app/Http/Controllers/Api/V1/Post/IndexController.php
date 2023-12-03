<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Actions\Posts\PostIndex;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController
{
    public function __invoke(Request $request, PostIndex $action): AnonymousResourceCollection
    {
        return $action($request);
    }
}
