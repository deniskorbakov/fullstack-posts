<?php

namespace App\Http\Resources;


use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function __construct(private Post $post)
    {
        parent::__construct($post);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->post->id,
            'body' => $this->post->body,
            'description' => $this->post->description,
            'userName' => User::all()->where('id', $this->post->user_id)->value('name'),
            'categories' => CategoryResource::collection($this->post->categories),
            'likes' => LikeResource::collection(Like::all()->where('post_id', $this->post->id)),
            'likesCount' => Like::all()->where('post_id', $this->id)->count(),
            'comments' => CommentResource::collection(Comment::all()->where('post_id', $this->post->id)),
        ];
    }
}
