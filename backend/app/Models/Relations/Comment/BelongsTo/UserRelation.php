<?php

namespace App\Models\Relations\Comment\BelongsTo;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait UserRelation
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
