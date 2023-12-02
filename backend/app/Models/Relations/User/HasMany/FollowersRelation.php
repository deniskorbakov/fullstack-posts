<?php

namespace App\Models\Relations\User\HasMany;

use App\Models\Follower;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait FollowersRelation
{
    public function followers(): HasMany
    {
        return $this->hasMany(Follower::class, 'user_id');
    }
}
