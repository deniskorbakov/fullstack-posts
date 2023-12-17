<?php

namespace App\Actions\Likes;

use App\Contracts\Likes\LikeStoreContract;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class LikeStore implements LikeStoreContract
{
    public function __invoke(Post $post): JsonResponse
    {
        $like = Like::currentLike($post->id)->first();

        if(!$like) {
            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
            ]);

            return response()->json(['message' => 'вы поставили лайк']);
        } else {
            return response()->json(['message' => 'вы не можете поставить больше двух лайков на пост'], 403);
        }
    }
}
