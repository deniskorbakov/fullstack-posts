<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Actions\Posts\PostStore;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;

class StoreController
{
    public function __invoke(PostRequest $request, PostStore $action): PostResource
    {
        return $action($request);
    }
}
