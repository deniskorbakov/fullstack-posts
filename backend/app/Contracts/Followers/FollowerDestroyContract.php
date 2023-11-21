<?php

namespace App\Contracts\Followers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Response;

interface FollowerDestroyContract
{
    public function __invoke(User $follower): ApplicationAlias|Response|Application|ResponseFactory;
}
