<?php

namespace App\Actions\Followers;

use App\Contracts\Followers\FollowerShowContract;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class FollowerShow implements FollowerShowContract
{
    public function __invoke(User $user): Collection
    {
        return $user->followers;
    }
}
