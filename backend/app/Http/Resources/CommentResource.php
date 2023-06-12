<?php

namespace App\Http\Resources;

use App\Models\CommentResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'userName' => User::all()->where('id', $this->user_id)->value('name'),
            'comment' => $this->text,
            'responses' => CommentResponseResource::collection(CommentResponse::all()->where('comment_id', $this->id)),
        ];
    }
}
