<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Resources\LikeResource;
use App\Models\Like;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LikeController extends Controller
{
    public function stor(Post $post) {

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
        if (auth()->user()->getAuthIdentifier() == $like->user_id && $post->id == $like->post_id) {
            $like->delete();

            return response(null, ResponseAlias::HTTP_NO_CONTENT);
        }
        else {
            return response([
                'message' => 'you cannot delete this like',
            ], 403);
        }
    }
}
