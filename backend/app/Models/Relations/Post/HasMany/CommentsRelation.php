<?php

namespace App\Models\Relations\Post\HasMany;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait CommentsRelation
{
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
