<?php

namespace App\Actions\Posts;

use App\Contracts\Posts\PostIndexContract;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostIndex implements PostIndexContract
{
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        return PostResource::collection(Post::paginate($request->page));
    }
}
