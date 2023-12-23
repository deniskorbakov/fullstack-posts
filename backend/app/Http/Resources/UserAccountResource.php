<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAccountResource extends JsonResource
{
    public function __construct(private User $user)
    {
        parent::__construct($user);
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'name' => $this->user->name,
            'email' => $this->user->email,
            'posts' => $this->user->posts->count(),
            'createdAccount' => date($this->user->created_at),
            'loginInformation' => LoginInfoResource::collection($this->user->loginInfos()->get()),
        ];
    }
}
