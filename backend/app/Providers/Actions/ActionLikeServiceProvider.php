<?php

namespace App\Providers\Actions;

use App\Actions\Likes\LikeDestroy;
use App\Actions\Likes\LikeStore;
use App\Contracts\Likes\LikeDestroyContract;
use App\Contracts\Likes\LikeStoreContract;
use Illuminate\Support\ServiceProvider;

class ActionLikeServiceProvider extends ServiceProvider
{
    public array $binding = [
        LikeStoreContract::class => LikeStore::class,
        LikeDestroyContract::class => LikeDestroy::class,
    ];
}
