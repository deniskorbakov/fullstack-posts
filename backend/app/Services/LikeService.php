<?php

namespace App\Services;

use App\Http\Resources\LikeResource;
use App\Models\Category;
use App\Models\Like;
use App\Models\Post;

class LikeService
{
    public function store($post) {
        $like = Like::create([
            'user_id' => auth()->user()->getAuthIdentifier(),
            'post_id' => $post->id,
        ]);

        return $like;

    }
}
