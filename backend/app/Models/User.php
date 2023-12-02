<?php

namespace App\Models;

use App\Models\Relations\User\HasMany\FollowersRelation;
use App\Models\Relations\User\HasMany\FollowingRelation;
use App\Models\Relations\User\HasMany\PostsRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
