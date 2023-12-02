<?php

namespace App\Models\Relations\Post\HasMany;

use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait LikesRelation
{
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}
