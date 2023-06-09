<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'description' => $this->description,
            'userName' => User::all()->where('id', $this->user_id)->value('name'),
            'categories' => PostCategoryResource::collection(PostCategory::all()->where('post_id', $this->id)),
            'likes' => LikeResource::collection(Like::all()->where('post_id', $this->id)),
            'likesCount' => Like::all()->where('post_id', $this->id)->count(),
            'comments' => CommentResource::collection(Comment::all()->where('post_id', $this->id)),


        ];
    }
}
