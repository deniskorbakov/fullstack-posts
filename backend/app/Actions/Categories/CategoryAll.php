<?php

namespace App\Actions\Categories;

use App\Contracts\Category\CategoryAllContract;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryAll implements CategoryAllContract
{
    public function __invoke(): AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::all());
    }
}
