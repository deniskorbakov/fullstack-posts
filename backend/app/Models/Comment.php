<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $id
 */
class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'comments';

    protected $guarded = ['id'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function responses(): HasMany
    {
        return $this->hasMany(CommentResponse::class);
    }
}
