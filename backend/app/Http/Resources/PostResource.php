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
            'title' => $this->post->title,
            'body' => $this->post->body,
            'userName' => $this->post->user()->value('name'),
            'categories' => CategoryResource::collection($this->post->categories),
            'likes' => LikeResource::collection($this->post->likes()->get()),
            'comments' => CommentResource::collection($this->post->comments()->get()),
        ];
    }
}
