<?php

namespace App\Models;

use App\Models\Relations\Follower\BelongsTo\FollowerRelation;
use App\Models\Relations\Follower\BelongsTo\UserRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use DateTime;

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
 */
class Follower extends Model
{
    use HasFactory;

    //Belong To Relation
    use FollowerRelation, UserRelation;

    protected $fillable = [
        'user_id',
        'follower_id',
    ];
}
