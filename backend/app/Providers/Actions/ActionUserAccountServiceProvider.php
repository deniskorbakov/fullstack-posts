<?php

namespace App\Providers\Actions;

use App\Actions\UsersAccounts\UserAccountIndex;
use App\Contracts\UsersAccounts\UserAccountIndexContract;
use Illuminate\Support\ServiceProvider;

class ActionUserAccountServiceProvider extends ServiceProvider
{
    public array $binding = [
        UserAccountIndexContract::class => UserAccountIndex::class,
    ];
}
