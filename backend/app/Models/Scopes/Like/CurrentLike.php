<?php

namespace App\Models\Scopes\Like;

use Illuminate\Database\Eloquent\Builder;

trait CurrentLike
{
    public function scopeCurrentLike(Builder $query, int $postId): void
    {
        $query->where('user_id', auth()->id())->where('post_id', $postId);
    }
}
