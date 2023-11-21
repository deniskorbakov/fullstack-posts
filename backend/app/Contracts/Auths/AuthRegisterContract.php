<?php

namespace App\Contracts\Auths;

use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

interface AuthRegisterContract
{
    public function __invoke(array|AuthRegisterRequest $request): ApplicationAlias|Response|Application|ResponseFactory;
}
