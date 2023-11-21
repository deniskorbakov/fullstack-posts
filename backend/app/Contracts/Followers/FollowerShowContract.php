<?php

namespace App\Contracts\Followers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface FollowerShowContract
{
    public function __invoke(User $user): Collection;
}
