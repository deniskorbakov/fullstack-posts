<?php

namespace App\Contracts\Posts;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;

interface PostStoreContract
{
    public function __invoke(PostRequest $request): PostResource;
}
