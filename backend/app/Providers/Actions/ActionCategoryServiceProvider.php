<?php

namespace App\Providers\Actions;

use App\Actions\Categories\CategoryAll;
use App\Contracts\Category\CategoryAllContract;
use Illuminate\Support\ServiceProvider;

class ActionCategoryServiceProvider extends ServiceProvider
{
    public array $binding = [
        CategoryAllContract::class => CategoryAll::class,
    ];
}
