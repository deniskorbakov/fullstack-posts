<?php

namespace App\Http\Controllers\Api\V1\Category;

use App\Actions\Categories\CategoryAll;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController
{
    public function __invoke(CategoryAll $action): AnonymousResourceCollection
    {
        return $action();
    }
}
