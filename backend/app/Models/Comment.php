<?php

namespace App\Models;

use App\Models\Relations\Comment\BelongsTo\UserRelation;
use App\Models\Relations\Comment\HasMany\ResponsesRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    // Belongs To Relation
    use UserRelation;

    // Has Many Relations
    use ResponsesRelation;

    protected $fillable = [
        'user_id',
        'post_id',
        'text',
    ];
}
