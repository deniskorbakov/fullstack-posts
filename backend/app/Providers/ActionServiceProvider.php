<?php

namespace App\Providers;

use App\Actions\Followers\FollowerDestroy;
use App\Contracts\Followers\FollowerDestroyContract;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $binding = [
        FollowerDestroyContract::class => FollowerDestroy::class,
    ];
}
