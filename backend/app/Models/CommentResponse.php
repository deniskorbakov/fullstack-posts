<?php

namespace App\Models;

use App\Models\Relations\CommentResponse\BelongsTo\UserRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentResponse extends Model
{
    use HasFactory, SoftDeletes;

    //Belongs To Relation
    use UserRelation;

    protected $fillable = [
        'comment_id',
        'user_id',
        'text',
    ];
}
