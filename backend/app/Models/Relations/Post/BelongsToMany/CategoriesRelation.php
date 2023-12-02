<?php

namespace App\Models\Relations\Post\BelongsToMany;

use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait CategoriesRelation
{
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_categories', 'post_id', 'category_id');
    }
}
