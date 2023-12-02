<?php

namespace App\Http\Resources;

use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FollowerResource extends JsonResource
{   public function __construct(private Follower $follower)
    {
        parent::__construct($follower);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->follower->id,
            'follower_id' => $this->follower->follower_id,
            'follower_name' => $this->follower->follower()->value('name')

        ];
    }
}
