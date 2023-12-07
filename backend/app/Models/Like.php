<?php

namespace App\Models;

use App\Models\Scopes\Like\CurrentLike;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Relations\Like\BelongsTo\UserRelation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
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
 *
 * @method static Builder currentLike(int $postId)
 */
class Like extends Model
{
    use HasFactory, SoftDeletes;

    // Belong To Relation
    use UserRelation;

    // Scope
    use CurrentLike;

    protected $fillable = [
        'user_id',
        'post_id',
    ];
}
