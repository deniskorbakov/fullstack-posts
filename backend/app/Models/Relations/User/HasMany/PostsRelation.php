<?php

namespace App\Models\Relations\User\HasMany;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait PostsRelation
{
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
