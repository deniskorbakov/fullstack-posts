<?php

namespace App\Models;

use App\Models\Relations\User\HasMany\FollowersRelation;
use App\Models\Relations\User\HasMany\FollowingRelation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Relations\User\HasMany\PostsRelation;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DateTime;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 *
 * @property Collection<Follower> $followers
 * @property Collection<Follower> $following
 * @property Collection<Post> $posts
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Has Many Relation
    use PostsRelation, FollowingRelation, FollowersRelation;

    protected $fillable = [
        'name',
        'email',
    ];

    protected $hidden = [
        'password',
    ];

}
