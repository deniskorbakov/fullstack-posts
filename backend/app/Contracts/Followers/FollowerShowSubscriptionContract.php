<?php

namespace App\Contracts\Followers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface FollowerShowSubscriptionContract
{
    public function __invoke(User $user): AnonymousResourceCollection;
}
