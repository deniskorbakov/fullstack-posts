<?php

namespace App\Models\Scopes\Post;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

trait Paginate
{
    public function scopePaginate(Builder $query, int|null $pages): LengthAwarePaginator
    {
        $page = ($pages ?? 1) * 10;

        $skip = $page - 10;

        return $query->orderBy('id', 'desc')->skip($skip)->paginate(10);
    }
}
