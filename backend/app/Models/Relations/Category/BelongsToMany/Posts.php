<?php

namespace App\Models\Relations\Category\BelongsToMany;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Posts
{
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_categories', 'category_id', 'post_id');
    }
}
