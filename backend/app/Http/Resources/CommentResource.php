<?php

namespace App\Http\Resources;

use App\Models\Comment;
use App\Models\CommentResponse;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function __construct(private Comment $comment)
    {
        parent::__construct($this->comment);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->comment->id,
            'userName' => $this->comment->user()->value('name'),
            'comment' => $this->comment->text,
            'responses' => CommentResponseResource::collection($this->comment->responses()->get()),
        ];
    }
}
