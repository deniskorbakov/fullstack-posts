<?php

namespace App\Models\Relations\Comment\HasMany;

use App\Models\CommentResponse;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait ResponsesRelation
{
    public function responses(): HasMany
    {
        return $this->hasMany(CommentResponse::class);
    }
}
