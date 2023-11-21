<?php

namespace App\Http\Resources;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
{
    public function __construct(private Like $like)
    {
        parent::__construct($like);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->like->id,
            'userName' => $this->like->users()->value('name'),
        ];
    }
}
