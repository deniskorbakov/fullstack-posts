<?php

namespace App\Models;

use App\Models\Relations\Follower\BelongsTo\FollowerRelation;
use App\Models\Relations\Follower\BelongsTo\UserRelation;
use App\Models\Scopes\Follower\CurrentFollower;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use Illuminate\Database\Query\Builder;

/**
 * @property int $id
 * @property int $user_id
 * @property int $follower_id
 * @property DateTime|null $deleted_at
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 *
 * @property Collection<User> $follower
 * @property Collection<User> $user
 *
 * @method static Builder currentFollower(int $followerId)
 */
class Follower extends Model
{
    use HasFactory;

    // Belong To Relation
    use FollowerRelation, UserRelation;

    // Scope
    use CurrentFollower;

    protected $fillable = [
        'user_id',
        'follower_id',
    ];
}
