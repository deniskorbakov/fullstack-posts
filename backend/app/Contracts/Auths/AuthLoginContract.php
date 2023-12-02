<?php

namespace App\Contracts\Auths;

use App\Http\Requests\AuthLoginRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

interface AuthLoginContract
{
    public function __invoke(array|AuthLoginRequest $request): ApplicationAlias|Response|Application|ResponseFactory;
}
