<?php

namespace App\Models;

use App\Models\Relations\Follower\BelongsTo\FollowerRelation;
use App\Models\Relations\Follower\BelongsTo\UserRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
