<?php

namespace App\Contracts\Category;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface CategoryAllContract
{
    public function __invoke(): AnonymousResourceCollection;
}
