<?php

namespace App\Providers\Actions;

use App\Actions\Auths\AuthLogin;
use App\Actions\Auths\AuthLogout;
use App\Actions\Auths\AuthRegister;
use App\Contracts\Auths\AuthLoginContract;
use App\Contracts\Auths\AuthLogoutContract;
use App\Contracts\Auths\AuthRegisterContract;
use Illuminate\Support\ServiceProvider;

class ActionAuthServiceProvider extends ServiceProvider
{
    public array $binding = [
        AuthLoginContract::class => AuthLogin::class,
        AuthRegisterContract::class => AuthRegister::class,
        AuthLogoutContract::class => AuthLogout::class,
    ];
}
