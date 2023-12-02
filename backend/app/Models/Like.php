<?php

namespace App\Models;

use App\Models\Relations\Like\BelongsTo\UserRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use HasFactory, SoftDeletes;

    // Belong To Relation
    use UserRelation;

    protected $fillable = [
        'user_id',
        'post_id',
    ];
}
