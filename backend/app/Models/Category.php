<?php

namespace App\Models;

use App\Models\Relations\Category\BelongsToMany\Posts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * @property int $id
 * @property string $name
 * @property DateTime|null $deleted_at
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 *
 * @property Collection<Post> $posts
 */
class Category extends Model
{
    use HasFactory;

    // Belongs To Many Relations
    use Posts;

    protected $fillable = [
        'name',
    ];
}

