<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Categories\CategoryAll;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    public function all(CategoryAll $action): AnonymousResourceCollection
    {
        return $action();
    }
}
