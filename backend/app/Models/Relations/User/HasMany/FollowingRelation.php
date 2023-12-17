<?php

namespace App\Models\Relations\User\HasMany;

use App\Models\Follower;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait FollowingRelation
{
    public function following(): HasMany
    {
        return $this->hasMany(Follower::class, 'follower_id');
    }
}
