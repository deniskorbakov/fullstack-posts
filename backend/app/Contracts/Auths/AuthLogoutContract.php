<?php

namespace App\Contracts\Auths;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

interface AuthLogoutContract
{
    public function __invoke($user): ApplicationAlias|Response|Application|ResponseFactory;
}
