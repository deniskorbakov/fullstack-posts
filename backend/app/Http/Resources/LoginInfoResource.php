<?php

namespace App\Http\Resources;

use App\Models\LoginInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginInfoResource extends JsonResource
{
    public function __construct(private LoginInfo $info)
    {
        parent::__construct($info);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->info->id,
            'user_id' => $this->info->user_id,
            'ip' => $this->info->ip,
            'platform' => $this->info->platform,
            'device' => $this->info->device,
            'browser' => $this->info->browser,
            'country' => $this->info->country,
            'city_name' => $this->info->city_name,
            'robot' => $this->info->robot,
            'created_at' => $this->info->created_at,
        ];
    }
}
