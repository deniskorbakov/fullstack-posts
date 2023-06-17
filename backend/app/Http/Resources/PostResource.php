<?php

namespace App\Http\Resources;


use App\Models\Comment;
use App\Models\CommentResponse;
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
            'userName' => User::where('id', $this->post->user_id)->value('name'),
            'categories' => CategoryResource::collection($this->post->categories),
            'likes' => LikeResource::collection(Like::where('post_id', $this->post->id)->get()),
            'likesCount' => Like::where('post_id', $this->post->id)->count(),
            'comments' => CommentResource::collection(Comment::where('post_id', $this->post->id)->get()),
        ];
    }
}
