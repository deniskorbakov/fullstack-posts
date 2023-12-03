<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Actions\Posts\PostUpdate;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class UpdateController
{
    public function __invoke(PostRequest $request, Post $post, PostUpdate $action): PostResource
    {
        return $action($request, $post);
    }
}
