<?php

namespace App\Models;

use App\Models\Relations\Post\BelongsTo\UserRelation;
use App\Models\Relations\Post\BelongsToMany\CategoriesRelation;
use App\Models\Relations\Post\HasMany\CommentsRelation;
use App\Models\Relations\Post\HasMany\LikesRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @method static create(array $array)
 */
class Post extends Model
{
    use HasFactory, SoftDeletes;

    // Belong To Many Relation
    use CategoriesRelation;

    // Belong To Relation
    use UserRelation;

    // Has Many Relation
    use LikesRelation, CommentsRelation;

    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];
}
