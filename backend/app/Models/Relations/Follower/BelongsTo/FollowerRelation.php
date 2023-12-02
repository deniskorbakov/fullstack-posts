<?php

namespace App\Models\Relations\Follower\BelongsTo;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait FollowerRelation
{
    public function follower(): BelongsTo
    {
        return $this->belongsTo(User::class, 'follower_id');
    }
}
