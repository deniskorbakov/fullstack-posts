<?php

namespace App\Services;


use App\Models\Like;

class LikeService
{
    public function store($post) {
        $like = Like::where('user_id', auth()->user()->getAuthIdentifier())->where('post_id', $post->id)->first();

        if(!$like) {
            Like::create([
                'user_id' => auth()->user()->getAuthIdentifier(),
                'post_id' => $post->id,
            ]);

            return response(['message' => 'вы поставили лайк'], 200);
        }
        else {
            return response(['message' => 'вы не можете поставить больше двух лайков на пост'], 403);
        }
    }
}
