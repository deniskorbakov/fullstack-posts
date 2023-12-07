<?php

namespace App\Models;

use App\Models\Relations\Post\BelongsToMany\CategoriesRelation;
use App\Models\Relations\Post\HasMany\CommentsRelation;
use App\Models\Scopes\Post\Paginate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Relations\Post\BelongsTo\UserRelation;
use App\Models\Relations\Post\HasMany\LikesRelation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $body
 *
 * @property DateTime|null $deleted_at
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 *
 * @property Collection<Category> $categories
 * @property Collection<User> $user
 * @property Collection<Like> $likes
 * @property Collection<Comment> $comments
 *
 * @method static Paginate(int|null $pages)
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

    //Scope
    use Paginate;

    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];
}
