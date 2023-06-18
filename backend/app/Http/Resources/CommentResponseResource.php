<?php

namespace App\Http\Resources;

use App\Models\CommentResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResponseResource extends JsonResource
{
    public function __construct(private CommentResponse $response)
    {
        parent::__construct($this->response);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->response->id,
            'text' => $this->response->text,
            'userName' => $this->response->users()->value('name'),
        ];
    }
}
