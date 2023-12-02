<?php

namespace App\Models;

use App\Models\Relations\Category\BelongsToMany\Posts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Belongs To Many Relations
    use Posts;

    protected $fillable = [
        'name',
    ];
}

