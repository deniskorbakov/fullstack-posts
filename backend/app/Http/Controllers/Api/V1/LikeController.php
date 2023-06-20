<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Resources\LikeResource;
use App\Models\Like;
use App\Models\Post;
use App\Services\LikeService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LikeController extends Controller
{
    public function store(Post $post, LikeService $service) {
        $response = $service->store($post);

        return response($response->original, $response->status());
    }

    public function destroy(Post $post, Like $like) {
        $like->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
