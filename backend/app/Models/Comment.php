<?php

namespace App\Models;

use App\Models\Relations\Comment\HasMany\ResponsesRelation;
use App\Models\Relations\Comment\BelongsTo\UserRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * @property int $id
 * @property int $user_id
 * @property int $post_id
 * @property string $text
 * @property DateTime|null $deleted_at
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 *
 * @property Collection<User> $user
 * @property Collection<CommentResponse> $responses
 */
class Comment extends Model
{
    use HasFactory, SoftDeletes;

    // Belongs To Relation
    use UserRelation;

    // Has Many Relations
    use ResponsesRelation;

    protected $fillable = [
        'user_id',
        'post_id',
        'text',
    ];
}
