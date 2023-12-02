<?php

namespace App\Providers\Actions;

use App\Actions\Posts\PostDestroy;
use App\Actions\Posts\PostIndex;
use App\Actions\Posts\PostShow;
use App\Actions\Posts\PostStore;
use App\Actions\Posts\PostUpdate;
use App\Contracts\Posts\PostDestroyContract;
use App\Contracts\Posts\PostIndexContract;
use App\Contracts\Posts\PostShowContract;
use App\Contracts\Posts\PostStoreContract;
use App\Contracts\Posts\PostUpdateContract;
use Illuminate\Support\ServiceProvider;

class ActionPostServiceProvider extends ServiceProvider
{
    public array $binding = [
        PostDestroyContract::class => PostDestroy::class,
        PostIndexContract::class => PostIndex::class,
        PostShowContract::class => PostShow::class,
        PostStoreContract::class => PostStore::class,
        PostUpdateContract::class => PostUpdate::class,
    ];
}
