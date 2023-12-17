<?php

namespace App\Models;

use App\Models\Relations\CommentResponse\BelongsTo\UserRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * @property int $id
 * @property int $comment_Id
 * @property int $user_id
 * @property string $text
 * @property DateTime|null $deleted_at
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 *
 * @property Collection<User> $user
 */
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
