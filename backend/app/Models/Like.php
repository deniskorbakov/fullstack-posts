<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Relations\Like\BelongsTo\UserRelation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * @property int $id
 * @property int $user_id
 * @property int $post_id
 *
 * @property DateTime|null $deleted_at
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 *
 * @property Collection<User> $user
 */
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
