<?php

namespace App\Http\Resources;

use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{   public function __construct(private Follower $subscription)
    {
        parent::__construct($subscription);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->subscription->id,
            'subscription_id' => $this->subscription->user_id,
            'subscription_name' => $this->subscription->user()->value('name')

        ];
    }
}
