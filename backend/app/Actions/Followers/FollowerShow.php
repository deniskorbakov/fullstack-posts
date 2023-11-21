<?php

namespace App\Actions\Followers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class FollowerShow
{
    public function __invoke(User $user): Collection
    {
        return $user->followers;
    }
}
