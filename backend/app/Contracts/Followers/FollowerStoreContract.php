<?php

namespace App\Contracts\Followers;

use App\Http\Requests\FollowerRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

interface FollowerStoreContract
{
    public function __invoke(array|FollowerRequest $request): ApplicationAlias|Response|Application|ResponseFactory;
}
