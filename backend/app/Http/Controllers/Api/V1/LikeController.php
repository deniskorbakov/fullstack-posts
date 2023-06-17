<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Resources\LikeResource;
use App\Models\Like;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LikeController extends Controller
{
    public function store(Post $post) {

        if(Like::all()->where('user_id', auth()->user()->getAuthIdentifier())->where('post_id', $post->id)->count() > 0) {
            return response(['message' => 'do you not add more than two'], 403);
        }
        else {
            $like = Like::create([
                'user_id' => auth()->user()->getAuthIdentifier(),
                'post_id' => $post->id,
            ]);

            return new LikeResource($like);
        }
    }

    public function destroy(Post $post, Like $like) {
            $like->delete();

            return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
