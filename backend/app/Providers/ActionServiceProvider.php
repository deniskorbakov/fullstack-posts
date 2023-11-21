<?php

namespace App\Providers;

use App\Actions\Followers\FollowerDestroy;
use App\Actions\Followers\FollowerShow;
use App\Actions\Followers\FollowerShowSubscription;
use App\Actions\Followers\FollowerStore;
use App\Contracts\Followers\FollowerDestroyContract;
use App\Contracts\Followers\FollowerShowContract;
use App\Contracts\Followers\FollowerShowSubscriptionContract;
use App\Contracts\Followers\FollowerStoreContract;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $binding = [
        FollowerDestroyContract::class => FollowerDestroy::class,
        FollowerShowSubscriptionContract::class => FollowerShowSubscription::class,
        FollowerStoreContract::class => FollowerStore::class,
        FollowerShowContract::class => FollowerShow::class,
    ];
}
