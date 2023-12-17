<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Actions\Posts\PostShow;
use App\Http\Resources\PostResource;
use App\Models\Post;

class ShowController
{
    public function __invoke(Post $post, PostShow $action): PostResource
    {
        return $action($post);
    }
}
