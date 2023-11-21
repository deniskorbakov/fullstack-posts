<?php

namespace App\Actions\Followers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class FollowerShowSubscription
{
    public function __invoke(User $user): Collection
    {
        return $user->following;
    }
}
