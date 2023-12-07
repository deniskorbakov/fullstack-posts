<?php

namespace App\Models\Scopes\Follower;

use Illuminate\Database\Eloquent\Builder;

trait CurrentFollower
{
    public function scopeCurrentFollower(Builder $query, int $followerId): void
    {
        $query->where('follower_id', $followerId)->where('user_id', auth()->id());
    }
}
